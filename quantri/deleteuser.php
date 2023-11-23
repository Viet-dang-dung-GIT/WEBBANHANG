<?php
    require("../db/connect.php");
    $id = $_GET["id"];

    $sql = "DELETE from ecommerceshop.users where id=$id";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location: listuser.php");
?>