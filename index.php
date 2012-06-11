<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
require_once('trendbuilder.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);


/* First pass through timeline */
$timelineOne = $connection->get('statuses/home_timeline', array('count' => 200, 'include_entities' => true));
$maxID = $timelineOne[0]->id;
$allTweets = "";
$hashtags = array();
$maxID = generateData($timelineOne, $hashtags, $allTweets);


/* Second pass through timeline */
$timelineTwo = $connection->get('statuses/home_timeline', array('count' => 200, 'include_entities' => true, 'max_id' => $maxID));
$maxID = generateData($timelineTwo, $hashtags, $allTweets);
$timeline = array_merge($timelineOne, $timelineTwo);
$trends = buildTrends($timeline, $hashtags, $allTweets);


//print_r(json_encode($trends));

//include('html.inc');
