<?php
    require("./includes/header.php")
?>

<div style="margin-top: 100px;">
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%"> </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $total = 0;
                foreach ($cart as $item) {
                    $sum = $item['price'] * $item['qty'];
                    $total += $sum;
                    $images = explode(";", $item['images']);
                    echo "<tr>
                    <td data-th='Product'>
                        <div class='row'>
                            <div class='col-sm-2 hidden-xs'><img src=../quantri/{$images[0]} class='img-responsive' width='100'>
                            </div>
                            <div class='col-sm-10'>
                                <h4 class='nomargin'>{$item['name']}</h4>
                                <p>{$item['benefit']}</p>
                            </div>
                        </div>
                    </td>
                    <td data-th='Price'>{$item['price']} đ</td>
                    <td data-th='Quantity'><input class='form-control text-center' value={$item['qty']} type='number' name='qty'>
                    </td>
                    <td data-th='Subtotal' class='text-center'>$sum</td>
                    <td class='actions' data-th=''>
                        <button class='btn btn-danger btn-sm'><a style='color: inherit; text-decoration: none;' href='./deletecart.php?id={$item['id']}'>Xóa</a></i>
                        </button>
                    </td>
                </tr>";    
                }
            ?>

            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Tổng 200.000 đ</strong>
                    </td>
                </tr>
                <tr>
                    <td><a href="./index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong><?php echo $total?></strong>
                    </td>
                    <td><a href="./checkout.php" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script src="js/jquery-1.11.1.min.js"></script>
</body>

</html>