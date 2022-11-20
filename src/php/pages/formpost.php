<?php 

if (!isset($_SESSION)) {
    session_start(["name" => "Session"]);
}
require_once("base.php");

if (!$_SERVER["REQUEST_METHOD"] === "POST" or !$_SERVER["REQUEST_METHOD"] === "GET") { header("location: ". $_SERVER["HTTP_REFERER"]); }

$i = 1;

$targetDir = "files/".$_SESSION["user"]."_".$_SESSION["pseudoid"]."/";
$fileName = basename($_FILES["file"]["name"]);
$targetPath = $targetDir . $fileName;
$fileName_ = pathinfo($targetPath, PATHINFO_FILENAME);
$fileType = pathinfo($targetPath, PATHINFO_EXTENSION);
while (true) {
    if (file_exists($targetPath)) {
        $targetPath = $targetDir . $fileName_ . $i . "." . $fileType;
        $fileName = $fileName_ . $i . "." . $fileType;
        $i++;
    } else {
        break;
    }
}

$data = array($_POST["nomePL"], $_POST["regiao"], $_POST["shortDesc"], $_SESSION["user"]."_".$_SESSION["pseudoid"], $_POST["fullDesc"], $_POST["nomeCientifico"]);


[$class, $result] = postFile([$targetDir, $fileName, $targetPath, $fileType], $data);


if ($result) {
    $notExists = "POSTNOTEXISTS";
    $set = (bool) setcookie("postExists", $notExists, time()+1, "/");
    if ($set) header("location: ". $_SERVER["HTTP_REFERER"]);
} else if (!$result) {
    $exists_ = "POSTEXISTS";
    $set = (bool) setcookie("postExists", $exists_, time()+1, "/");
    if ($set) {
        header("location: ". $_SERVER["HTTP_REFERER"]);
    }
}
?>