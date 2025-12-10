<?php 
include_once __DIR__ . "/../database/database.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $NOMHAB = $_POST["NOMHAB"];
    $Description_hab = $_POST["Description_hab"];

    $stmt = $db->prepare("INSERT INTO habitats(NOMHAB,Description_hab) VALUES (?,?)");
    $status = $stmt->execute([$NOMHAB, $Description_hab]);

    if($status){
        header("Location: /index.php");
        exit();
    }

    echo "Error";
    die();
}

header("Location: /index.php");
exit();