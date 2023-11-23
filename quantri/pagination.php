<?php
    require("../db/connect.php");
    $page = $_GET['page'] ?? 1;
    $limit = $_GET['limit'] ?? 2;
    $start = ($page - 1) * $limit;

    $sql = "SELECT p.id, p.name, p.images, c.name as category, b.name as brand, p.status from ecommerceshop.products as p INNER JOIN ecommerceshop.categories as c on c.id = p.category_id
                            INNER JOIN ecommerceshop.brands as b ON b.id = p.brand_id order by p.name ASC LIMIT $start, $limit";

    $statement = $connection->prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    $totalProducts = $connection->query("SELECT COUNT(*) FROM ecommerceshop.products")->fetchColumn();
    $totalPage = ceil($totalProducts / $limit);
    $result = new stdClass;
    $result->products = $products;
    $result->totalPage = $totalPage;
    $json = json_encode($result);
    echo $json;

?>