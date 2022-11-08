<?php 

require_once("base.php");

if (!$_REQUEST["REQUEST_METHOD"] === "POST" or !$_REQUEST["REQUEST_METHOD"] === "GET") { return; }

$targetDir = "files/";
$fileName = basename($_FILES["file"]["name"]);
$targetPath = $targetDir . $fileName;
$fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

postFile([$targetDir, $fileName, $targetPath, $fileType]);







?>