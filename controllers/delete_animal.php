<?php

include_once __DIR__ . "/../database/database.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["IDanimal"];

    $stmt = $db->prepare("SELECT IMAGE FROM animals WHERE IDanimal = ?");
    $stmt->execute([$id]);

    $image = $stmt->fetchColumn();

    unlink(__DIR__ . "/../assets/$image");

    $stmt = $db->prepare("DELETE FROM animals WHERE IDanimal = ?");
    $status = $stmt->execute([$id]);

    if($status){
        header("Location: /index.php");
        exit();
    }

    echo "Error";
    die();
}

header("Location: /index.php");
exit();