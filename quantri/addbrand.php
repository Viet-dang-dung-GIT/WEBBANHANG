<?php
    require("../db/connect.php");
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    $sql = "INSERT INTO `ecommerceshop`.`brands` (`name`, `slug`, `status`) VALUES ('$name', '$slug', 'Active')";

    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location: listbrands.php")                               
?>
