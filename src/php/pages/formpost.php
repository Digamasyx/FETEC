<?php 

session_start(["name" => "Session"]);

require_once("base.php");

if (!$_SERVER["REQUEST_METHOD"] === "POST" or !$_SERVER["REQUEST_METHOD"] === "GET") { return; }

$i = 1;

$targetDir = "files/".$_SESSION["user"]."/";
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

$data = array($_POST["nomePL"], $_POST["regiao"], $_POST["shortDesc"], $_SESSION["user"]);


[$class, $result] = postFile([$targetDir, $fileName, $targetPath, $fileType], $data);


if ($result) {
    header("location: ". $_SERVER["HTTP_REFERER"]);
}
?>