<?php
require("./includes/header.php");
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Trang liệt kê danh mục sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Loại</th>
                        <th>Đường dẫn</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    require("../db/connect.php");
                    $sql = "SELECT * from categories order by name";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categories as $category) {
                        $id = $category["id"];
                        $name = $category["name"];
                        $slug = $category["slug"];
                        $status = $category["status"];
                        echo "<tr>
                                    <td>$name</td>
                                    <td>$slug</td>
                                    <td>$status</td>        
                                    <td>
                                    <button><a href='../quantri/editcategory.php?id=$id'><i class='fa-solid fa-pen-to-square'></i></a></button>
                                    <button><a href='../quantri/deletecategory.php?id=$id'><i class='fa-regular fa-trash-can'></i></a></button>
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