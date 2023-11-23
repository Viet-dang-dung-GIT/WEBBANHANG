<?php
	require("../db/connect.php");
	$message="";
	if(isset($_POST["btnSubmit"])){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "INSERT INTO `ecommerceshop`.`users` (`name`, `email`, `password`, `status`) VALUES (?, ?, ?, 'Active');";
		try {
			$statement = $connection->prepare($sql);
			if(!$statement->execute([$name, $email, $hashedPassword])) {
				throw new Exception("Tài khoản đã tồn tại!");
			}
			header("location: ../login/index.php");
		} catch (Exception $e) {
			$message = "Có lỗi xảy ra, vui lòng thử lại!";
		}
	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>

  <form class="login" method="post" action=<?php echo $_SERVER["PHP_SELF"];?>>
    <div class="title">Hello</div>
    <div class="des">
      Wellcome
    </div>
    <div class="group">
      <input type="text" name="name" placeholder="Enter username">
    </div>
    <div class="group">
      <input type="email" name="email" placeholder="Enter email">
    </div>
    <div class="group">
      <input type="password" id="inputPassword" name="password" placeholder="Password">
      <span id="showPassword">
        <ion-icon name="eye-outline"></ion-icon>
        <ion-icon name="eye-off-outline"></ion-icon>
      </span>
    </div>
    <p style="color: #e44343;"><?php echo $message?></p>
    <div class="signIn">
      <button name="btnSubmit">Sign up</button>
    </div>
    <div class="or">
      Or continue with
    </div>
    <div class="list">
      <div class="item">
        <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" alt="">
      </div>
      <div class="item">
        <img
          src="https://museumandgallery.org/wp-content/uploads/2020/03/Facebook-Icon-Facebook-Logo-Social-Media-Fb-Logo-Facebook-Logo-PNG-and-Vector-with-Transparent-Background-for-Free-Download.png"
          alt="">
      </div>
      <div class="item">
        <img src="https://www.iconpacks.net/icons/2/free-twitter-logo-icon-2429-thumb.png" alt="">
      </div>
    </div>
    <div class="register">
      <a href="../login/index.php">Login now</a>
    </div>

  </form>

  <script src="app.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>