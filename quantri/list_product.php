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
        <h6 class="m-0 font-weight-bold text-primary">Trang liệt kê sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh đại diện</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody id='data-content'>

                    <?php
                    require("../db/connect.php");
                    $sql = "SELECT p.id, p.name, p.images, c.name as category, b.name as brand, p.status from ecommerceshop.products as p INNER JOIN ecommerceshop.categories as c on c.id = p.category_id
                                            INNER JOIN ecommerceshop.brands as b ON b.id = p.brand_id order by p.name;";

                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($products as $product) {
                        $id = $product["id"];
                        $name = $product["name"];
                        $images = $product["images"];
                        $category = $product["category"];
                        $brand = $product["brand"];
                        $status = $product["status"];

                        echo "<tr>
                                    <td>$name</td>
                                    <td>" . anhdaidien($images, '100px') . "</td>
                                    <td>$category</td>
                                    <td>$brand</td>
                                    <td>$status</td>
                                    <td>
                                        <a href='../quantri/editproduct.php?id=$id'><i class='fa-solid fa-pen-to-square'></i></a> 
                                        <a href='../quantri/deleteproduct.php?id=$id'><i class='fa-regular fa-trash-can'></i></a>                    
                                    </td>
                            </tr>";
                    }
                    ?>

                </tbody>
            </table>
            
            <!-- <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh đại diện</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id='data-content'>
                    
                </tbody>
            </table> -->
                    
            <!-- pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    
                </ul>
            </nav>

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