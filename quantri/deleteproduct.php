<?php
    require("../db/connect.php");
    $delid = $_GET["id"];

    //Tìm tất cả ảnh của sản phẩm và xóa

    $sql1 = "SELECT images from ecommerceshop.products where id=$delid";
    $stm = $connection->prepare($sql1);
    $stm->execute();
    $images = $stm->fetch(PDO::FETCH_ASSOC);

    // chuỗi các ảnh

    $images_arr = explode(';', $images['images']);

    //xóa các ảnh
    foreach ($images_arr as $img) {
        unlink($img);
    }

    $sql = "DELETE from products where id=$delid";
    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location: list_product.php");
