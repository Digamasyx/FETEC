<?php 

session_start(["name" => "Session"]);

require_once("base.php");

if (!$_SERVER["REQUEST_METHOD"] === "POST" or !$_SERVER["REQUEST_METHOD"] === "GET") { return; }

$targetDir = "files/".$_SESSION["user"]."/";
$fileName = basename($_FILES["file"]["name"]);
$targetPath = $targetDir . $fileName;
$fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

$data = array($_POST["nomePL"], $_POST["regiao"]);


postFile([$targetDir, $fileName, $targetPath, $fileType], $data);







?>