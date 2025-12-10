<?php 
include_once __DIR__ . "/../database/database.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["IDHAB"];
    $NOMHAB = $_POST["NOMHAB"];
    $Description_hab = $_POST["Description_hab"];
    
    $stmt = $db->prepare("UPDATE habitats SET NOMHAB = ?, Description_hab = ? WHERE IDHAB = ?");
    $status = $stmt->execute([$NOMHAB , $Description_hab, $id]);

    if($status){
        header("Location: /index.php");
        exit();
    }

    echo "Error";
    die();
}

header("Location: /index.php");
exit();

?>