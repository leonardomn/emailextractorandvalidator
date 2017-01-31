<?php

/* This is a file email extractor to read a file and get valid emails
Created by leonardo at srvdesk.com.br 
*/

$string = file_get_contents('extract'); // Gets the File with emails 

function extractEmails($string) {
	$pattern = '/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i'; //Apply pattern to remove and validate email format
		preg_match_all($pattern, $string, $matches);
	return isset($matches[0]) ? $matches[0] : array();
}

$emails = extractEmails($string); //Save on string
$emails = array_unique($emails);

$result = implode("\n",$emails);
$result = "".$result."";

file_put_contents('newfile.txt',$result); //Save on file

?>