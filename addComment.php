<?php

 require_once('recaptcha-php-1.11/recaptchalib.php');
 $privatekey = "6LflhfwSAAAAAHIimDpGBPE2GICytqHcdj5yjCou";
 $resp = recaptcha_check_answer ($privatekey,
                                 $_SERVER["REMOTE_ADDR"],
                                 $_POST["recaptcha_challenge_field"],
                                 $_POST["recaptcha_response_field"]);

 if (!$resp->is_valid) {
   // What happens when the CAPTCHA was entered incorrectly
   header("Location: /foody/recipes/".$parentPost.".html");
   exit;

 } else {

	$name = $_POST["name"];
	$parentPost = $_POST["parentPost"];
	$comment = $_POST["comment"];
	$parentPost = str_replace(".html", "", $parentPost);

	$commentPath = "comments/".$parentPost.".xml";
	if(!file_exists($commentPath)){
    	$f = fopen($commentPath, "w");
    	$startContent = "<?xml version='1.0' encoding='UTF-8'?>\n";
    	$startContent .= "<comments>\n</comments>\n";
    	fwrite($f, $startContent);
    	fclose($f);
    	chmod($commentPath, 0777);
	}

	$myfile = fopen($commentPath, "r") or die("Unable to open file!");
	$filecontent = fread($myfile,filesize($commentPath));
	fclose($myfile);

	$filecontent = str_replace("</comments>\n", "", $filecontent);
	$filecontent .= "<post>\n";
	$filecontent .= "<name>".$name."</name>\n";
	$filecontent .= "<comment>".$comment."</comment>\n";
	$filecontent .= "<date>".date("Y-m-d")."</date>\n";
	$filecontent .= "</post>\n</comments>\n";

	$myfile = fopen($commentPath, "w") or die("Unable to open file2");
	fwrite($myfile, $filecontent);
	fclose($myfile);
	header("Location: /foody/recipes/".$parentPost.".html");
	#header("Location: /foody/testsubmit.html");
	exit;
	}
?>

