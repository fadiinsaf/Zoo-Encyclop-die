<?php

include_once __DIR__ . "/../database/database.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_POST["IDanimal"];

    $stmt = $db->prepare("SELECT IMAGE FROM animals WHERE IDanimal = ?");
    $stmt->execute([$id]);

    $image = $stmt->fetchColumn();

    unlink(__DIR__ . "/../assets/$image");

    $nom = $_POST["NOM"];
    $Type_alimentaire = $_POST["Type_alimentaire"];
    $IDHAB = $_POST["IDHAB"];
    $IMAGE = $_FILES["IMAGE"];
    $current_time = new DateTime();
    $image_name =  $current_time->getTimestamp() . "_" . $IMAGE["name"];
    move_uploaded_file($IMAGE["tmp_name"], __DIR__ . "/../assets/$image_name");

    $stmt = $db->prepare("UPDATE animals SET NOM = ?, Type_alimentaire = ?, IDHAB = ?, IMAGE = ? WHERE IDanimal = ?");
    $status = $stmt->execute([$nom, $Type_alimentaire, $IDHAB, $image_name, $id]);

    if($status){
        header("Location: /index.php");
        exit();
    }

    echo "Error";
    die();
}

header("Location: /index.php");
exit();