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
echo "All set! ";

$hashtags = array();
$alltweets = "";
foreach ($content as $tw) {
  $alltweets .= $tw->text;
  $tags = $tw->entities->hashtags;
  foreach ($tags as $tag) {
    $hashtags[$tag] = is_null($hashtags[$tag]) ? 1 : $hashtags[$tag]+1;
  }
}

var_dump($hashtags);

/*
 *require_once 'transmute.php';
 *$trends = json_decode(getKeywords($alltweets))->keywords;
 *foreach ($trends as $trend) {
 *  print_r($trend->text);
 *  echo '&nbsp;';
 *  print_r($trend->relevance);
 *  echo '<br />';
 *}
 */

//foreach ($trends as $trend) {
  //print_r($trend->keyword);
//}

/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

/* Include HTML to display on the page */
//$potentials = makeTrends($content, $ignore, $punc);
//$content = getTrends($potentials);
//var_dump(json_encode($content));
//include('html.inc');

