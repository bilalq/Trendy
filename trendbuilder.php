<?php
require_once 'transmute.php';


/* Builds array of trends that hold their respective tweets */
function buildTrends($data) {
  $hashtagTrends = null;
  $keywordTrends = null;
  getTrendTopics($data, $hashtagTrends, $keywordTrends);

  foreach ($data as $tweetObj) {
    $tweetText = $tweetObj->text;

    //Assign tweets to keywords
    foreach ($keywordTrends as $key => $keyData) {
      if(stripos($tweetText, $key) !== false) {
        $entry = buildTweet($tweetObj);
        array_push($keywordTrends[$key]['tweets'], $entry);
        $keywordTrends[$key]['count']++;
      }
    }

    //Assign tweets to hashtags
    foreach ($hashtagTrends as $tag => $tagData) {
      if (stripos($tweetText, $tag) !== false) {
        $entry = buildTweet($tweetObj);
        array_push($hashtagTrends[$tag]['tweets'], $entry);
      } 
    }
  }

  $trends = array_merge($hashtagTrends, $keywordTrends);
  return $trends;
}


/* Finds 5 most frequent hashtags and keywords */
function getTrendTopics($data, &$hashTrends, &$keyTrends) {
  /* Finds the most 5 most frequest hashtags and their occurence count.
   * Also gathers the text of all tweets to pass on to Alchemy. */
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

  $hashTrends = $topTags;
  $keyTrends = getTrendingKeywords($alltweets);
  return;
}


/* Make an API call to alchemy to get keywords */
function getTrendingKeywords($tweetBlock) {
  $alchemyResponse = json_decode(getKeywords($tweetBlock))->keywords;
  $keywords = array();
  foreach ($alchemyResponse as $key) {
    $key = $key->text;
    $keywords[$key] = array(
      'count' => 0,
      'tweets' => array()
    );
  }
  return $keywords;
}


/* Takes raw tweet data and formats it into what we want */
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
  $tweet['id'] = $tweetData->id_str;
  return $tweet;
}
