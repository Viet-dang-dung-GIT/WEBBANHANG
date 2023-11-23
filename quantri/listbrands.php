<?php
require("./includes/header.php");
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
                        <th>Thương hiệu</th>
                        <th>Đường dẫn</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                    $id;
                    require("../db/connect.php");
                    $sql = "SELECT * from brands order by id";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $brands = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($brands as $brand) {
                        $id = $brand["id"];
                        $name = $brand["name"];
                        $slug = $brand["slug"];
                        $status = $brand["status"];

                        echo "<tr>
                            <td>$name</td>
                            <td>$slug</td>
                            <td>$status</td>
                            <td>
                                <a href='../quantri/editbrand.php?id=$id'><i class='fa-solid fa-pen-to-square'></i></a> 
                                <a href='../quantri/deletebrand.php?id=$id'><i class='fa-regular fa-trash-can'></i></a> 
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
require("./includes/footer.php");
?>