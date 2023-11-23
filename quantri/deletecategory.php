<?php
    require("../db/connect.php");

    if(isset($_GET["id"]) && !empty($_GET["id"])) {
        $delid = $_GET["id"];

        $sql = "DELETE from categories where id = $delid";
        $statement = $connection->prepare($sql);
        $statement->execute();

        header("location: listcats.php");
    } else {
        echo "ID parameter is missing or empty.";
    }
