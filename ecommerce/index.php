<?php
require("./includes/header.php");
?>

<section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with cunpons & up to 70% off! </p>
    <button><span>Shop now</span></button>
</section>

<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="./assets/img/features/f1.png" alt="">
        <h6>Free Shipping</h6>
    </div>

    <div class="fe-box">
        <img src="./assets/img/features/f2.png" alt="">
        <h6>Online Oder</h6>
    </div>

    <div class="fe-box">
        <img src="./assets/img/features/f3.png" alt="">
        <h6>Save Money</h6>
    </div>

    <div class="fe-box">
        <img src="./assets/img/features/f4.png" alt="">
        <h6>Promotions</h6>
    </div>

    <div class="fe-box">
        <img src="./assets/img/features/f5.png" alt="">
        <h6>Happy Sell</h6>
    </div>

    <div class="fe-box">
        <img src="./assets/img/features/f6.png" alt="">
        <h6>F24/7 Support</h6>
    </div>

</section>

<section id="product1" class="section-p1">
    <h1>Feature Products</h1>
    <p>Summer Collection New Morden Design</p>

    <div class="pro-container">

        <?php
        require("../db/connect.php");
        function anhdaidien($arrstr, $height)
        {
            // $arrstr là chuỗicó dạng anh1;anh2;anh3;
            //tách ra thành mảng thôi
            $arr = explode(";", $arrstr);
            return "<img src='../quantri/$arr[0]' height='$height'/>";
        }
        $sql = "SELECT p.name as product_name, b.name as brand_name, p.images as images, p.price as price, p.id as id FROM ecommerceshop.products as p INNER JOIN ecommerceshop.brands as b on p.brand_id = b.id;";

        $statement = $connection->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product) {
            $id = $product["id"];
            $product_name = $product["product_name"];
            $brand_name = $product["brand_name"];
            $images = $product["images"];
            $price = $product["price"];
            echo "
                <div class='pro'>
                <a href ='./products.php?id=$id'>
                    " . anhdaidien($images, '100%') . "
                </a>
                <div class='des'>
                    <span>$brand_name</span>
                    <h5>$product_name</h5>
                    <h4>$price đ</h4>
                </div>
                <a href=''><i class='fa-solid fa-cart-shopping cart'></i></a>
            </div>
                ";
        }
        ?>

    </div>

</section>

<section id="banner" class="section-m1">
    <h4>Repair Servives</h4>
    <h1>Up to <span>70% Off</span> - All t-shirt & Accessories</h1>
    <button class="normal">Explore More</button>
</section>

<section id="product1" class="section-p1">
    <h1>New Arrivals</h1>
    <p>Summer Collection New Morden Design</p>

    <div class="pro-container">
        <div class="pro">
            <img src="./assets/img/products/n1.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

        <div class="pro">
            <img src="./assets/img/products/n2.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

        <div class="pro">
            <img src="./assets/img/products/n3.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

        <div class="pro">
            <img src="./assets/img/products/n4.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

        <div class="pro">
            <img src="./assets/img/products/n5.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

        <div class="pro">
            <img src="./assets/img/products/n6.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

        <div class="pro">
            <img src="./assets/img/products/n7.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

        <div class="pro">
            <img src="./assets/img/products/n8.jpg" alt="">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoon Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>100.000đ</h4>
            </div>
            <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
        </div>

    </div>
</section>


<section id="newletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up For NewsLetters</h4>
        <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
    </div>
    <div class="form">
        <input type="text" placeholder="Your mail address">
        <button class="normal">Sign Up</button>
    </div>
</section>

<?php
require("./includes/footer.php");
?>