<?php
    require("./includes/header.php");
    require("../db/connect.php");

    $cart = $_SESSION['cart'] ?? [];
    if(isset($_POST['btnDatHang'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $createAt = $_POST['createdAt'];
        $method = $_POST['method'];
        $user_id = $_SESSION['id'];
        
        $sql = "UPDATE ecommerceshop.users SET name ='$name' , address = '$address', phone = '$phone', email = '$email', created_at = '$createAt' WHERE id = $user_id;";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $total = 0;
        $updateAt = date('Y-m-d');
        foreach ($cart as $items) {
            $product_id = $items['id'];
            $price = $items['price'];
            $qty = $items['qty'];
            $total += $items['price'] * $items['qty'];
            $sql_oder = "INSERT INTO ecommerceshop.order_details(`user_id`, `price`, `qty`, `total`, `created_at`, `updated_at`, `mt_payment`) VALUE('$user_id', '$price', '$qty', '$total', '$createAt', '$updateAt', '$method');";
            $stm = $connection->prepare($sql_oder);
            $stm->execute();

            // lấy id vừa được chèn vào bảng
            $last_id = $connection->lastInsertId();
            $stm_detail = $connection->prepare("INSERT INTO ecommerceshop.order_product(`product_id`, `order_id`) VALUE('$product_id', '$last_id');");
            $stm_detail-> execute();
        }
        $_SESSION['cart'] = [];
        header("location: ./thank.php");
    }

?>

<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <form class="needs-validation" name="frmthanhtoan" method="post" action="#">
            <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

            <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                <h2>Thanh toán</h2>
                <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Giỏ hàng</span>
                        <span class="badge badge-secondary badge-pill"><?php echo count($cart)?></span>
                    </h4>
                    <ul class="list-group mb-3">

                        <?php 
                            $total = 0;
                            $sumPrice = 0;
                            foreach($cart as $item) {
                                $total = $item['price'] * $item['qty'];
                                $sumPrice += $total;
                                echo "
                                <li class='list-group-item d-flex justify-content-between lh-condensed'>
                                <div>
                                    <h6 class='my-0'>{$item['name']}</h6>
                                    <small class='text-muted'>{$item['price']} x {$item['qty']}</small>
                                </div>
                                <span class='text-muted'>$total</span>
                            </li>
                                ";
                            }
                        ?>
                        
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng thành tiền</span>
                            <strong><?php echo $sumPrice?></strong>
                        </li>
                    </ul>


                </div>

                <form action=<?php echo $_SERVER['PHP_SELF']?> method="post">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="name" id="kh_ten" placeholder="Helpfulman" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_diachi">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="kh_diachi" placeholder="Đà Nẵng" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="kh_dienthoai" placeholder="0386965430" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="email" id="kh_email" placeholder="helpfulman2003@gmail.com" value="">
                            </div>
                            <div class="col-md-12">
                                    <label for="kh_date">Ngày đặt</label>
                                    <input type="date" class="form-control" name="createdAt" id="kh_date"
                                        placeholder="20/11/2023" value="">
                            </div>
                        </div>

                        <h4 class="mb-3">Hình thức thanh toán</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-1" name="method" type="radio" class="custom-control-input" required="" value="Tiền mặt">
                                <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="method" type="radio" class="custom-control-input" required="" value="Chuyển khoản">
                                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                            hàng</button>
                    </div>
                </form>
            </div>
        </form>

    </div>
    <!-- End block content -->
</main>

<!-- footer -->
<?
require("./includes/footer.php");
?>