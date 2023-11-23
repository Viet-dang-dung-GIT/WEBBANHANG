<?php
    require("../db/connect.php");
    session_start();
    session_destroy();
    header("location: ../login/index.php");
?>