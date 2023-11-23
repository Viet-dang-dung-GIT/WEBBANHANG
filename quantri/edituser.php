<?php
require("../db/connect.php");
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * from ecommerceshop.users where id=$id";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST["btnUpdate"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $sql =  "UPDATE ecommerceshop.users set name='$name', email= '$email', phone = '$phone', address = '$address' where id='$id'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        header("location: listuser.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Cập nhật người dùng</h1>
                        </div>
                        <form class="user" method="post" action="#"> <!-- Corrected here -->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" value="<?php echo $user['name'] ?>" placeholder="Nhập tên người dùng">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Nhập email người dùng">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="phone" name="phone" value="<?php echo $user['phone'] ?>" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="address" name="address" value="<?php echo $user['address'] ?>" placeholder="Nhập địa chỉ">
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
