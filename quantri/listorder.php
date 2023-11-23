<?php
require("./includes/header.php");
?>

<?php
function anhdaidien($arrstr, $height)
{
    // $arrstr là chuỗicó dạng anh1;anh2;anh3;
    //tách ra thành mảng thôi
    $arr = explode(";", $arrstr);
    return "<img src='$arr[0]' height='$height'/>";
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Trang liệt kê đơn đặt hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên người dùng</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Địa chỉ</th>
                        <!-- <th>Hành động</th> -->
                    </tr>
                </thead>

                <tbody id='data-content'>

                    <?php
                    require("../db/connect.php");
                    $sql = "SELECT u.name as username, p.name, p.images, od.price as price, od.qty as qty, u.address from ecommerceshop.products as p INNER JOIN ecommerceshop.order_product as op on op.product_id = p.id
                    INNER JOIN ecommerceshop.order_details as od ON od.id = op.order_id INNER JOIN ecommerceshop.users as u on u.id = od.user_id order by p.name;";

                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $orders = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($orders as $order) {
                        $username = $order["username"];
                        $name = $order["name"];
                        $price = $order["price"];
                        $qty = $order["qty"];
                        $address = $order["address"];

                        echo "<tr>
                                    <td>$username</td>
                                    <td>$name</td>
                                    <td>$price</td>
                                    <td>$qty</td>
                                    <td>$address</td>
                            </tr>";
                    }
                    ?>

                </tbody>
            </table>
                     
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php
require("./includes/footer.php");
?>