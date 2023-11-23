<?php
require("./includes/header.php");
?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Trang liệt kê người dùng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                    $id;
                    require("../db/connect.php");
                    $sql = "SELECT * from ecommerceshop.users order by id";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($users as $user) {
                        $id = $user["id"];
                        $name = $user["name"];
                        $email = $user["email"];
                        $phone = $user["phone"];
                        $address = $user["address"];

                        echo "<tr>
                            <td>$name</td>
                            <td>$email</td>
                            <td>$phone</td>
                            <td>$address</td>
                            <td>
                                <a href='../quantri/edituser.php?id=$id'><i class='fa-solid fa-pen-to-square'></i></a> 
                                <a href='../quantri/deleteuser.php?id=$id'><i class='fa-regular fa-trash-can'></i></a> 
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