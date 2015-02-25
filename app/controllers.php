<?php
include "./settings.php";
include "simple_html_dom.php";

// optionally include some usefull functions
include "helpers.php";

function _getHashMap($title, $text) {

	$title = trim($title); 
	$text = trim($text); 

	// get proper nouns from text body
	$text_tokens = explode(" ", $text);
	$proper_nouns = []; 
	for ($i=1; $i < sizeof($text_tokens); $i++) { 
		if ($text_tokens[$i] != "" && $text_tokens[$i-1] != "") {
			if (ctype_upper($text_tokens[$i]{0}) && $text_tokens[$i-1]{strlen($text_tokens[$i-1]) - 1} != ".") {
				$token = preg_replace("/[^A-Za-z0-9 ]/", '', $text_tokens[$i]);
				if (($token{strlen($token) - 1}) == "s") {
					$token = substr($token, 0, strlen($token) - 1);
				}
				array_push($proper_nouns, trim(strtolower($token))); 
			}
		}
	}

	// echo "PROPER NOUNS \n";
	// var_dump($proper_nouns); 

	// remove punctuation from title tokens
	$title_tokens = explode(" ", $title);
	
	for ($i=0; $i < sizeof($title_tokens); $i++) { 
		$title_tokens[$i] = trim(strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $title_tokens[$i])));
		if (($title_tokens[$i]{strlen($title_tokens[$i]) - 1}) == "s") {
			$title_tokens[$i] = substr($title_tokens[$i], 0, strlen($title_tokens[$i]) - 1);
		}
	}

	// echo "\n\nTITLE TOKENS \n";
	// var_dump($title_tokens); 


	// count occurences of each proper noun that is in the title in the text
	$hash_map = []; 
	foreach ($proper_nouns as $proper_noun) {
		foreach ($title_tokens as $title_token) {
			if ($proper_noun == $title_token) {
				if (isset($hash_map[$proper_noun])) {
					$hash_map[$proper_noun] += 1; 
				} else {
					$hash_map[$proper_noun] = 0; 
				}
			}
		}
	}

	// sort the hash_map
	arsort($hash_map); 
	return $hash_map; 
}

function _sumUpArticle($text, $hash_map) {

	$sentences = explode(". ", $text); 
	$sentences_to_use = []; 

	$all_keys = array_keys($hash_map);
	$keys = [];
	if (sizeof($all_keys) > 2) {
		$keys[0] = $all_keys[0]; 
		$keys[1] = $all_keys[1]; 
	} else {
		$keys = $all_keys; 
	}

	foreach ($sentences as $sentence) {
		foreach ($keys as $key) {
			if (strpos(strtolower($sentence), strtolower($key))) {
				array_push($sentences_to_use, $sentence); 
				break; 
			}
		}
	}

	return implode(" <br><br>", $sentences_to_use); 
}

// Must include this function. You can change its name in settings.php
function home() {
	// CODE HERE

	if (isset($_POST["url"]) && $_POST["url"] != "") {
		$link = $_POST["url"]; 
		$html = file_get_html($link);

		$title = ""; 
		$text = ""; 

		foreach($html->find('h1[class=alpha tweet-title]') as $element) 
		       $title = $element->plaintext;

		foreach($html->find('div[class=article-entry text]') as $div) {
	       foreach($div->find('p') as $p) {
	             $text .= $p->plaintext . " "; 
	       }
	    }



	    $hash_map = _getHashMap($title, $text);

	    $summary = _sumUpArticle($text, $hash_map); 

		$text_tokens = explode(" ", $text);
		$summary_tokens = explode(" ", $summary);

		$data = []; 

		$data["summary"] = $summary;
		$data["topics"] = array_keys($hash_map); 
		$data["title"] = $title;
		$data["old_count"] = sizeof($text_tokens); 
		$data["new_count"] = sizeof($summary_tokens); 

		include("views/article.php");
	} else {
		include("views/home.php");
	}

    

}

// Must include this function. You can change its name in settings.php
function notfound() {
	// CODE HERE

	include("views/notfound.php"); 
}

/*  
	FUNCTIONS
	Note:	functions that begin with '_' are not expected to return pages, 
			and are reserved for user defined functions. 
	Ex: 	"_logUserIn()" or "_getPostsForUser($username)" 
*/  

// Useful for system wide announcments / debugging
function _everypage() {

}

?>