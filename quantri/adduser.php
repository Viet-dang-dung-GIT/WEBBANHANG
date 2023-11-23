<?php
    require("../db/connect.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `ecommerceshop`.`users` (`name`, `email`, `password`, `phone`, `address`, `status`) VALUES ('$name', '$email', '$password','$phone','$address','Active')";

    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location: listuser.php");                               
?>
