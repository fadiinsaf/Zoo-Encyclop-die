<?php 
include_once __DIR__ . "/../database/database.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["IDHAB"];

    $stmt = $db->prepare("DELETE FROM habitats WHERE IDHAB = ?");
    $status = $stmt->execute([$id]);

    if($status){
        header("Location: /index.php");
        exit();
    }

    echo "Error";
    die();
}

header("Locaation: /index.php");
exit();