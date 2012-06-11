<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
//$content = $connection->get('account/verify_credentials');
$content = $connection->get('statuses/home_timeline', array('count' => 200, 'include_entities' => true));

/* Finds the most 5 most frequest hashtags and their occurence count.
 * Also gathers the text of all tweets to pass on to Alchemy. */
$hashtags = array();
$alltweets = "";
foreach ($content as $tw) {
  $alltweets .= $tw->text;
  $tags = $tw->entities->hashtags;
  foreach ($tags as $tag) {
    $tag = $tag->text;
    $hashtags[$tag] = is_null($hashtags[$tag]) ? 1 : $hashtags[$tag]+1;
  }
}
arsort($hashtags);
$hashtags = array_slice($hashtags, 0, 5);
$topTags = array();
foreach ($hashtags as $tag => $tagCount) {
  $tag = '#'.$tag;
  $topTags[$tag] = array(
    'count' => $tagCount, 
    'tweets' => array()
  );
}

/* Get keywords in tweets from Alchemy */
require_once 'transmute.php';
$alchemyResponse = json_decode(getKeywords($alltweets))->keywords;
$keywords = array();
foreach ($alchemyResponse as $key) {
  $keywords[$key->text] = array(
    'count' => 0,
    'tweets' => array()
  );
}

$foolcount = 0;
/* Build list of trends */
foreach ($content as $tweetObj) {
  $tweetText = $tweetObj->text;

  //Assign tweets to keywords
  foreach ($keywords as $key => $keyData) {
    if(stripos($tweetText, $key) !== false) {
      $entry = buildTweet($tweetObj);
      array_push($keywords[$key]['tweets'], $entry);
      $keywords[$key]['count']++;
    }
  }

  //Assign tweets to hashtags
  foreach ($topTags as $tag => $tagData) {
    if (stripos($tweetText, $tag) !== false) {
      $entry = buildTweet($tweetObj);
      array_push($topTags[$tag]['tweets'], $entry);
    } 
  }
}

$trends = array_merge($topTags, $keywords);

function buildTweet ($tweetData) {
  $tweet = array();
  $retweeted = $tweetData->retweeted_status;

  if (is_null($retweeted)) {
    $tweet['name'] = $tweetData->user->name;
    $tweet['username'] = $tweetData->user->screen_name;
    $tweet['photo'] = $tweetData->user->profile_image_url_https;
    $tweet['text'] = $tweetData->text;
  }
  else {
    $tweet['name'] = $retweeted->user->name;
    $tweet['username'] = $retweeted->user->screen_name;
    $tweet['photo'] = $retweeted->user->profile_image_url_https;
    $tweet['text'] = $retweeted->text;
    $tweet['retweet_by'] = array(
      'name' => $tweetData->user->name,
      'username' => $tweetData->user->screen_name
    );
  }
  $tweet['timestamp'] = $tweetData->created_at;
  $tweet['id'] = $tweetData->id;
  return $tweet;
}

print_r(json_encode($trends));

//include('html.inc');
