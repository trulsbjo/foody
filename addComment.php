<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

echo "###### BEFORE ######<br />";
$myfile = fopen($commentPath, "r") or die("Unable to open file!");
echo fread($myfile,filesize($commentPath));
fclose($myfile);


ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
$name = $_POST["name"];
$parentPost = $_POST["parentPost"];
$comment = $_POST["comment"];
$parentPost = str_replace(".html", "", $parentPost);

$commentPath = "comments/".$parentPost.".xml";
if(!file_exists($commentPath)){
    $f = fopen($commentPath, "w");
    $startContent = "<?xml version=\"1.0\" encoding=\"UFT-8\"?>\n";
    $startContent .= "<comments>\n</comments>\n";
    fwrite($f, $startContent);
    fclose($f);
    chmod($commentPath, 0777);
}
$myfile = fopen($commentPath, "r") or die("Unable to open file!");
$filecontent = fread($myfile,filesize($commentPath));
fclose($myfile);

$filecontent = str_replace("</comments>", "", $filecontent);
$filecontent .= "<post>\n";
$filecontent .= "<name>".$name."</name>\n";
$filecontent .= "<comment>".$comment."</comment>\n";
$filecontent .= "<date>".date("Y-m-d")."</date>\n";
$filecontent .= "</post>\n</comments>\n"

$myfile = fopen($commentPath, "w") or die("Unable to open file");
fwrite($myfile, $filecontent);
fclose($myfile);

echo "##### AFTER #####<br />";
$myfile = fopen($commentPath, "r") or die("Unable to open file!");
echo fread($myfile,filesize($commentPath));
fclose($myfile);
?>

