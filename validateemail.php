<?php

/* This is a file email extractor to read a file and get valid emails
Created by leonardo at srvdesk.com.br 
*/

function getDomainFromEmail($email) //Function to get domain names
{
    // Get the data after the @ sign
    $domain = substr(strrchr($email, "@"), 1);
 
    return $domain;
}


function validateemail($email) //Function to check if domain exists
{

	$valid = filter_var(gethostbyname($email), FILTER_VALIDATE_IP); //Use function FILTER_VALIDATE_IP from HOSTNAME

	return $valid;

}


$file = "file.txt"; //Read file to check domain is valid

$page = join("",file($file));

$kw = explode("\n", $page);

for($i=0;$i<count($kw);$i++){

	$cleanat = getDomainFromEmail($kw[$i]);

	if($valid = validateemail($cleanat)) {
		file_put_contents('fileok.txt',trim($kw[$i]).PHP_EOL, FILE_APPEND); //Save valid emails and domains in this file
		echo $kw[$i] . "<br>";
	} else {
		file_put_contents('filenonok.txt',trim($kw[$i]).PHP_EOL, FILE_APPEND); //Save invalid emails and domains in this file
	}
}

?>