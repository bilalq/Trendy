<?php
try {
  $m = new Mongo();
  $db = $m->selectDB('trends');
  $collection = $db->selectCollection('users');  
}
catch ( MongoConnectionException $e ) {
  echo '<p>Couldn\'t connect to mongodb.</p>';
  exit();
}
