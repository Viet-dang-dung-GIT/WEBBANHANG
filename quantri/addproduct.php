<?php
    require("../db/connect.php");
    $name = $_POST['name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $benefit = $_POST['benefit'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    //xu ly hinh anh
    $countfiles = count($_FILES['images']['name']);

    $imgs = '';
    for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['images']['name'][$i];

        ## Location
        $location = "uploads/".uniqid().$filename;
                    //pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] ) : mixed
        $extension = pathinfo($location,PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        ## File upload allowed extensions
        $valid_extensions = array("jpg","jpeg","png");

        $response = 0;
        ## Check file extension
        if(in_array(strtolower($extension), $valid_extensions)) {

            // them vao CSDL - them thah cong moi upload anh len
            ## Upload file
                                //$_FILES['file']['tmp_name']: $_FILES['file']['tmp_name'] - The temporary filename of the file in which the uploaded file was stored on the server.
            if(move_uploaded_file($_FILES['images']['tmp_name'][$i],$location)){

                $imgs .= $location . ";";
            }
        }

    }
    $imgs = substr($imgs, 0, -1);
    // print_r($imgs);

    $sql = "INSERT INTO `ecommerceshop`.`products` (`name`, `slug`, `description`, `benefit`, `stock`, `price`, `weigth`, `disscounted_price`, `images`, `status`, `category_id`, `brand_id`) VALUES ('$name', '$slug', '$description', '$benefit', '12', '$price', '$weight', '0', '$imgs', 'Active', '$category', '$brand')";

    $statement = $connection->prepare($sql);
    $statement->execute();

    header("location: list_product.php");
?>