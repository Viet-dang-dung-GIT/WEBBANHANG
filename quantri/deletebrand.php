<?php
    require("../db/connect.php");
    $delid = $_GET["id"];

    $sql = "DELETE from brands where id=$delid";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location: listbrands.php");
?>