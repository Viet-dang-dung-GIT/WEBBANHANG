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
                            <h1 class="h4 text-gray-900 mb-4">Thêm sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="addproduct.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 mb-3">
                                        <label for="form-label">Hãng sữa</label>
                                        <select name="category" id="" class="form-control">
                                            <option value="">Chọn</option>
                                            <?php
                                            require("../db/connect.php");
                                            $sql = "SELECT * FROM categories order by name";

                                            $statement = $connection->prepare($sql);
                                            $statement->execute();
                                            $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($products as $product) {
                                                $id = $product["id"];
                                                $name = $product["name"];
                                                echo "<option value='$id'>$name</option>";
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
                                            require("../db/connect.php");
                                            $sql = "SELECT * FROM brands order by name";

                                            $statement = $connection->prepare($sql);
                                            $statement->execute();
                                            $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($products as $product) {
                                                $id = $product["id"];
                                                $name = $product["name"];
                                                echo "<option value='$id'>$name</option>";
                                            };
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group mt-3">
                                        <div class="col-sm-12 ">
                                            <input type="number" class="form-control form-control-user" id="weight" name="weight" placeholder="Nhập trong lượng sản phẩm">
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control form-control-user" id="price" name="price" placeholder="Nhập giá sản phẩm">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea type="text" class="form-control " id="description" name="description" placeholder="Thành phần dinh dưỡng"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea type="text" class="form-control " id="benefit" name="benefit" placeholder="Lợi ích sản phẩm"></textarea>
                                        </div>
                                    </div>     
                                    
                                    <div class="form-group">
                                        
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control " id="images" name="images[]" multiple></input>
                                        </div>
                                    </div>
                                          
                                    <hr>
                                    <div class="text-center">  
                                        <button class="btn btn-primary">Tạo mới</button>
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