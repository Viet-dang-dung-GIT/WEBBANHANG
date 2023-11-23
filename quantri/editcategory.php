<?php
require("../db/connect.php");
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $delid = $_GET["id"];
    $sql = "SELECT * from ecommerceshop.categories where id=$delid";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $category = $statement->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST["btnUpdate"])) {
        $name = $_POST["name"];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        $sql =  "UPDATE ecommerceshop.categories set name='$name', slug='$slug' where id='$delid'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        header("location: listcats.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật loại</h1>
                        </div>
                        <form class="user" method="post" action="#"> <!-- Corrected here -->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" value="<?php echo $category['name'] ?>" placeholder="Nhập tên loại">
                                </div>
                            </div>
                            <div class="form-group">
                                <hr>
                                <div class="text-center">
                                    <button class="btn btn-primary" name="btnUpdate">Cập nhât</button>
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
