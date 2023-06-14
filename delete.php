<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";


    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM mystudent WHERE id=$id";
    $connection->query($sql);
}
header("location: /management/index.php");
exit;
