<?php
  require_once('twitteroauth/twitteroauth.php');
  require_once('config.php');
  require_once('mongo.php');

  $cursor = $collection->find();
  $ba = 0;
  foreach ($cursor as $user) {
    if ($ba == 1) {
      $oauth_token = $user['access_token']['oauth_token'];
      $oauth_secret = $user['access_token']['oauth_token_secret'];
      $oauth = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_secret);

      $content = $oauth->get('statuses/home_timeline');
      var_dump($oauth_token);
      echo '<br />';
      var_dump($oauth_secret);
      echo '<br />';
      var_dump($content);
    }
    $ba += 1;
  }
?>
