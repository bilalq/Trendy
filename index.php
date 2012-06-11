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
$maxID = $content[0]->id;

$hashtags = array();
$alltweets = "";
foreach ($data as $tw) {
  $alltweets .= $tw->text;
  $tags = $tw->entities->hashtags;
  foreach ($tags as $tag) {
    $tag = $tag->text;
    $hashtags[$tag] = is_null($hashtags[$tag]) ? 1 : $hashtags[$tag]+1;
  }
}
$topTags = array();
foreach ($hashtags as $tag => $tagCount) {
  $tag = '#'.$tag;
  $topTags[$tag] = array(
    'count' => $tagCount, 
    'tweets' => array()
  );
}

arsort($hashtags);
$hashtags = array_slice($hashtags, 0, 5);
$hashTrends = $topTags;
$keyTrends = getTrendingKeywords($alltweets);


require_once('trendbuilder.php');
$trends = buildTrends($content);

print_r(json_encode($trends));

//include('html.inc');
