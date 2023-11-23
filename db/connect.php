<?php
define('DATABASE_SERVER', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', '12345678');
define('DATABASE_NAME', 'ecommerceshop');
$connection = null;
try {
  $connection = new PDO("mysql:host=" . DATABASE_SERVER . ";dbname=" . DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  $connection = null;
}
