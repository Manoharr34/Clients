<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "clients";

// Connecction to database

$connection = new mysqli($servername, $username, $password, $database);

if(isset($_GET["id"])){
    $id = $_GET["id"];

    // delete data of the id from the database

    $sql = "delete from clients where id = $id";
    $connection->query($sql);
}

header("location: /clients/index.php");
exit;

?>