<?php

require_once 'config.php';
include_once "AlchemyAPI.php";

function getKeywords($tweets)
{
  // Create an AlchemyAPI object.
  $alchemyObj = new AlchemyAPI();

  // Load the API key from disk.
  $alchemyObj->loadAPIKey("api_key.txt");
  $keywordParams = new AlchemyAPI_KeywordParams();
  $keywordParams->setMaxRetrieve(5);

  // Extract topic keywords from a text string.
  $result = $alchemyObj->TextGetRankedKeywords($tweets, AlchemyAPI::JSON_OUTPUT_MODE, $keywordParams);
  return $result;
}

?>
