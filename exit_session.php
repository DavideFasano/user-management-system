<?php
session_start();
unset($_SESSION["user_autenticated"]);
header("location: login_user.php");