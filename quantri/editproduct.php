<?php
require("../db/connect.php");
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $delid = $_GET["id"];
    $sql = "SELECT  p.id, p.name, p.images, p.weigth, p.price, p.description, p.benefit, c.name as category, b.name as brand, p.status from ecommerceshop.products as p INNER JOIN ecommerceshop.categories as c on c.id = p.category_id
    INNER JOIN ecommerceshop.brands as b ON b.id = p.brand_id where p.id=$delid ;";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    $category = $product["category"];
    $brand = $product["brand"];
    $weight =  $product["weigth"];
    $price =  $product["price"];
    $description =  $product["description"];
    $benefit =  $product["benefit"];
    $images = $product["images"];

    if (isset($_POST["btnUpdate"])) {
        $name = $_POST['name'];
        $category = $_POST['category'];// chứa cái gì trong $category id của categories
        $brand = $_POST['brand'];// chứa cái gì trong $brand id của brand
        $weight = $_POST['weight'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $benefit = $_POST['benefit'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

        //xu ly hinh anh
        $countfiles = count($_FILES['images']['name']);

        if (!empty($_FILES['images']['name'][0])) {
            // có chọn hình ảnh mới thì xóa ảnh cũ
            // uploads/655a1a4d46adfAptakid2.jpg;uploads/655a1a4d471d1Aptakid1.jpg;uploads/655a1a4d480f8Aptakid.jpg
            $images_arr = explode(';', $images);

            //xóa các ảnh
            foreach ($images_arr as $img) {
                unlink($img);
            }
            // thêm ảnh mới 

            $imgs = '';
            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES['images']['name'][$i];

                ## Location
                $location = "uploads/" . uniqid() . $filename;
                //pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] ) : mixed
                $extension = pathinfo($location, PATHINFO_EXTENSION);
                $extension = strtolower($extension);

                ## File upload allowed extensions
                $valid_extensions = array("jpg", "jpeg", "png");

                ## Check file extension
                if (in_array(strtolower($extension), $valid_extensions)) {

                    // them vao CSDL - them thah cong moi upload anh len
                    ## Upload file
                    if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $location)) {
                        $imgs .= $location . ";";
                    }
                }
            }
            $imgs = substr($imgs, 0, -1);
            $sql = "UPDATE `ecommerceshop`.`products` set `name` = '$name', `slug` = '$slug',`description` = '$description',`benefit` = '$benefit',`price` = $price,`images` = '$imgs',`weigth` = $weight,`category_id` = '$category',`brand_id` = '$brand' where id=$delid";

            $statement = $connection->prepare($sql);
            $statement->execute();
        } else {
            $sql = "UPDATE `ecommerceshop`.`products` set `name` = '$name', `slug` = '$slug',`description` = '$description',`benefit` = '$benefit',`price` = $price,`weigth` = $weight,`category_id` = '$category',`brand_id` = '$brand' where id=$delid";
        }
        header("location: list_product.php");
    }
} else {
    echo "Invalid id provided";
}
?>



<?php
require("./includes/header.php");
?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" value="<?php echo $product["name"] ?>" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mb-3">
                                    <label for="form-label">Hãng sữa</label>
                                    <select name="category" id="" class="form-control">
                                        <option value="">Chọn</option>
                                        <?php
                                        // require("../db/connect.php");
                                        $sql = "SELECT * FROM categories order by name";

                                        $statement = $connection->prepare($sql);
                                        $statement->execute();
                                        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($products as $product) {
                                            $id = $product["id"];
                                            $name = $product["name"];
                                            if ($name == $category) {
                                                echo "<option value='$id' selected>$name</option>";
                                            } else {
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        };
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="form-label">Thương hiệu</label>
                                    <select name="brand" id="" class="form-control">
                                        <option value="">Chọn</option>
                                        <?php
                                        // require("../db/connect.php");
                                        $sql = "SELECT * FROM brands order by name";

                                        $statement = $connection->prepare($sql);
                                        $statement->execute();
                                        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($products as $product) {
                                            $id = $product["id"];
                                            $name = $product["name"];
                                            if ($name == $brand) {
                                                echo "<option value='$id' selected>$name</option>";
                                            } else {
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        };
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <div class="col-sm-12 ">
                                        <input type="number" class="form-control form-control-user" id="weight" name="weight" value="<?php echo $weight ?>" placeholder="Nhập trong lượng sản phẩm">
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control form-control-user" id="price" name="price" value="<?php echo $price ?>" placeholder="Nhập giá sản phẩm">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control " id="description" name="description" placeholder="Thành phần dinh dưỡng"><?php echo $description ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control " id="benefit" name="benefit" placeholder="Lợi ích sản phẩm"><?php echo $benefit ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-sm-12">
                                        <input type="file" class="form-control " id="images" name="images[]" multiple></input>
                                    </div>
                                    <div class="col-sm-12">Các ảnh hiện tại:
                                        <?php
                                        $arr = explode(";", $images);
                                        foreach ($arr as $img)
                                            echo "<img src='$img' height='100px' width='100px' class='objectFit: 'cover''/>";
                                        ?>
                                    </div>


                                </div>

                                <hr>
                                <div class="text-center">
                                    <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                                </div>
                                <div class="text-center">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <?php
        require("./includes/footer.php");
        ?>