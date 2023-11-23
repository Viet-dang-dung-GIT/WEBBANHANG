<?php 
    session_start();
    $cart = [];
    if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/app.css" type="text/css">
    <style type="text/css">
        #icon-container {
            margin: 0 auto;
            width: 50%;
            height: 50%;
          
        }
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            vertical-align: middle !important;
        }


        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }

            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }

            .actions .btn-info {
                float: left;
            }

            .actions .btn-danger {
                float: right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }

            table#cart tfoot td {
                display: block;
            }

            table#cart tfoot td .btn {
                display: block;
            }
        }
    </style>
    
</head>
<body>
    <section name="header" id="header">
        <a href="../../ecommerce/"><img src="assets/img/logo.png" alt="" class="logo"></a>

        <div>
            <ul id="navbar">
                <!-- <li><a class="active" href="#hero">Home</a></li> -->
                <li><a href="#shop.html">Shop</a></li>
                <li><a href="#blog.html">Blog</a></li>
                <li><a href="#about.html">About</a></li>
                <li><a href="#.html">Contact</a></li>
                <li>
                    <a href="../../ecommerce/cart.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="cart__notice"><?php echo count($cart)?></span>
                    </a>
                </li>

                <li class="navbar-log-out">

                <?php 
                    if(isset($_SESSION['name'])){ 
                        echo "
                        <div id='dropdownMenuButton1' style='display:flex; align-items: center;' data-bs-toggle='dropdown' aria-expanded='false' class='dropdown'>
                        <lord-icon
                        src='https://cdn.lordicon.com/mebvgwrs.json'
                        trigger='hover'
                        style='width:50px;height:50px'>
                        </lord-icon>
                        <script src='https://cdn.lordicon.com/lordicon-1.2.0.js'></script>
                        <a href='#' style='color: inherit; text-decoration: none;'>".$_SESSION["name"].
                        "</a>
                        </div>
                        <div class='log-out'><a href='../../login/logout.php'>Đăng Xuất</a></div>
                        ";
                    }else {
                        echo "<a href='../login/index.php' style='color: inherit; text-decoration: none;' class='btn-login'>Login</a>";
                    }
                ?>
                </li>
            </ul>
        </div>
    </section>