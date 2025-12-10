<?php 
$db_name = "zoo_dt";
$host = "127.0.0.1";
$user = "fadi";
$pass = "fadiinsaf";

try{
    $db = new PDO ("mysql:host=$host;dbname=$db_name;charset=utf8;", $user, $pass);
}
catch(Exception $e){
    echo "".$e->getMessage()."";
}