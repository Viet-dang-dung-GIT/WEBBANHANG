<?php
require("./includes/header.php");
require("../db/connect.php");

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT p.name as product_name, b.name as brand_name, p.images as images, p.price as price, p.weigth as weight, p.description as description, p.benefit as benefit FROM ecommerceshop.products as p INNER JOIN ecommerceshop.brands as b on p.brand_id = b.id where p.id = $id;";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);

    $product_name = $product["product_name"];
    $brand_name = $product["brand_name"];
    $images = $product["images"];
    $price = $product["price"];
    $weight = $product["weight"];
    $description = $product["description"];
    $benefit = $product["benefit"];

    $arr = explode(";", $images);
} else {
    echo "error 404";
}
// qty số lượng
if (isset($_POST['atcbtn'])) {
    $id = $_POST["id"];
    $qty = $_POST["qty"];
    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
    // cập nhật số lượng 
    $isFound = false;
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]["id"] == $id) {
            $cart[$i]["qty"] += $qty;
            $isFound = true;
            break;
        }
    }
    if (!$isFound) {
        $sql_atc = "SELECT * FROM ecommerceshop.products where id=$id";
        $stm = $connection->prepare($sql_atc);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $result["qty"] = $qty;
        $cart[] = $result;
    }
    $_SESSION['cart'] = $cart;
    header("location: index.php");
}
?>

<section id="prodetails" class="section-p1">
  <div class="single-pro-img">
    <img src="../quantri/<?php echo $arr[0] ?>" width="100%" id="MainImg" alt="">

    <div class="small-img-group">
      <div class="small-img-col">
        <img src="../quantri/<?php echo $arr[0] ?>" width="100%" class="small-img" alt="">
      </div>

      <div class="small-img-col">
        <img src="../quantri/<?php echo $arr[1] ?>" width="100%" class="small-img" alt="">
      </div>

      <div class="small-img-col">
        <img src="../quantri/<?php echo $arr[2] ?>" width="100%" class="small-img" alt="">
      </div>

      <div class="small-img-col">
        <img src="../quantri/<?php echo $arr[3] ?>" width="100%" class="small-img" alt="">
      </div>
    </div>
  </div>
  <form method="post" action=<?php echo $_SERVER['PHP_SELF'] ?>>
    <?php
        echo "
                <div class='single-pro-details'>
                <h6>Home / $brand_name</h6>
                <h4>$product_name</h4>
                <h2>$weight gr</h2>
                <h2>$price đ</h2>
                <input type='number' value='1' name='qty' id='input' oninput='updateValue(this.value)'>
                <input type='hidden' value=$id name=id>
                <button class='normal' type='submit' name='atcbtn'>Add To Cart</button>
                <h4>Thành phần dinh dưỡng</h4>
                <span>$description</span>
                <h4>Lợi ích</h4>
                <span>$benefit</span>
            </div>
                "
        ?>
  </form>
</section>

<section id="product1" class="section-p1">
  <h1>Featured Products</h1>
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
  </div>
</section>

<section id="newletter" class="section-p1 section-m1">
  <div class="newstext">
    <h4>Sign Up For NewsLetters</h4>
    <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
  </div>
  <div class="form">
    <input type="text" , placeholder="Your mail address">
    <button class="normal">Sign Up</button>
  </div>
</section>

<footer class="section-p1">
  <div class="col">
    <img class="logo" src="./assets/img/logo.png" alt="">
    <h4>Contact</h4>
    <p><strong>Address: </strong>K40/05 Trần Văn Dư</p>
    <p><strong>Phone: </strong>0888298168</p>
    <p><strong>Hours: </strong>7:30 AM - 17:30 PM, Mon - Sat</p>

    <div class="follow">
      <h4>Follow us</h4>
      <div class="icon">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-tiktok"></i>
        <i class="fa-brands fa-youtube"></i>
      </div>
    </div>
  </div>

  <div class="col">
    <h4>About</h4>
    <a href="#">About us</a>
    <a href="#">Delitvery Information</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Term & Conditions</a>
    <a href="#">Contact us</a>
  </div>

  <div class="col">
    <h4>My Account</h4>
    <a href="#">Sign in</a>
    <a href="#">View Cart</a>
    <a href="#">My WithList</a>
    <a href="#">Track My Oder</a>
    <a href="#">Help</a>
  </div>

  <div class="col install">
    <h4>Install Apps</h4>
    <p>From App Store or GG Play</p>
    <div class="row">
      <img src="./assets/img/pay/play.jpg" alt="">
      <img src="./assets/img/pay/app.jpg" alt="">
    </div>
    <p>Secured Payment Gateways</p>
    <img src="./assets/img/pay/pay.png" alt="">
  </div>
</footer>

<script>
let MainImg = document.querySelector('#MainImg');
let smallimg = document.querySelectorAll('.small-img');
const input = document.getElementById('input')

function updateValue(val) {
  input.value = val
}
smallimg[0].onclick = () => {
  MainImg.src = smallimg[0].src;
}

smallimg[1].onclick = () => {
  MainImg.src = smallimg[1].src;
}

smallimg[2].onclick = () => {
  MainImg.src = smallimg[2].src;
}

smallimg[3].onclick = () => {
  MainImg.src = smallimg[3].src;
}
</script>

<script src="https://unpkg.com/scrollreveal"></script>
<!-- <script src="./scrollreveal.min.js"></script> -->
<script src="./script.js"></script>
</body>

</html>