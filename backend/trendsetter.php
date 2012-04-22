<?php
  require_once('mongo.php');

  $query = "https://api.twitter.com/1/statuses/home_timeline.json?include_entities=true?count=200";
  
