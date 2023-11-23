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
                            <h1 class="h4 text-gray-900 mb-4">Thêm người dùng</h1>
                        </div>
                        <form class="user" method="post" action="adduser.php" >
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nhập tên người dùng">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Nhập tên email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Nhập mật khẩu">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Nhập tên số điện thoại">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Nhập tên số địa chỉ">
                                </div>
                            </div>
                            <div class="form-group">      
                                    <hr>
                                    <div class="text-center">  
                                        <button class="btn btn-primary">Tạo mới</button>
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