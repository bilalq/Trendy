<?php
  $wordsList = array();
  $punc = array("?","!",",",";",".","\$","%","(",")","-", "'s","'",'"',":",";","&","|");
  $ignore = array("a","about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", 
    "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the","O","youre","", " ", "help" ,"u", "say","best","oh","check","come","doing","want","state","need","people","w/","way","day","going","think","dont","week","did","ive","got","2","1","6","3","4","5","6","7","8","9","0","time","new","night","know","right","make","really","far","near","rt", ">", "<", "=", "great", "good", "like", "love","i","im","i'm", "today", "just", ">");

  function makeTrends($tweets, $ign) {
    foreach ($tweets as $tweet) {
      $words = explode(" ",strtolower($tweet->text));
      foreach ($words as $word) {
        $word = str_replace($punc, "", $word);
        if (! (ignored($word, $ign))) {
          if (array_key_exists($word, $wordsList)) {
            array_push($wordsList[$word], $tweet); 
          }
          else {
            $wordsList[$word] = array($tweet);
          }
        }
      }
    }
    return $list;
  }

  function ignored($target, $list) {
    return in_array($target, $list);
  }

  function getTrends($trendList) {
    $trends = array();
    $smallest;
    $min = 999999;
    foreach ($trendList as $key=>$word) {
      if (sizeof($trends) < 5) {
        $trends[$key] = $word;
      }
      else if (sizeof($trends) == 5) {
        foreach ($trends as $candidate) {
          $count = sizeof($candidate);
          if ($count < $min) {
            $min = $count;
            $smallest = $key;
          }
        }
      }
      else {
        $count = sizeof($word);
        if ($count > $min) {
          unset($trends[$smallest]);
          $trends[$key] = $word;
          $min = $count;
          $smallest = getSmallest($trends);
        }
      }
    }
  }

  function getSmallest($trends) {
    $min = 99999;
    $smallest;
    foreach ($trends as $key=>$value) {
      $count = sizeof($value);
      if ($count < $min) {
        $min = $count;
        $smallest = $key;
      }
    }
    return smallest;
  }
