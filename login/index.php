<?php
	session_start();
	require("../db/connect.php");
	$message="";
	if(isset($_POST["btnSubmit"])){
		$name = $_POST["name"];
		$password = $_POST["password"];
		
		$sql = "SELECT * from ecommerceshop.users where name=? ";
		try {
			$statement = $connection->prepare($sql);
			$statement->execute([$name]);
			$user = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($user && is_array($user) && password_verify($password, $user['password'])) {
				$_SESSION['id'] = $user["id"];
				$_SESSION["name"] = $user["name"];
				$_SESSION["password"] = $user["password"];
				$_SESSION["role"] = $user["role"];
				if($_SESSION["role"] == 1) {
					header("location: ../quantri/index.php");
				} else if($_SESSION["role"] == 0) {
					header("location: ../../../ecommerce/index.php");
				}
			} else {
				throw new Exception("Tên đăng nhập hoặc mật khẩu bị sai");
			}
		} catch (Exception $e) {
			$message = $e->getMessage();
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
    <div class="title">Hello Again!</div>
    <div class="des">
      Wellcome back you've <br> beeb missed!
    </div>
    <div class="group">
      <input type="text" name="name" placeholder="Enter username">
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
      <button name="btnSubmit">Sign In</button>
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
      Not a member? <a href="../login/register.php">Register now</a>
    </div>

  </form>

  <script src="app.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>