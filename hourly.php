<?php
  require_once('mongo.php');

  $cursor = $collection->find();
  var_dump($cursor);
?>
