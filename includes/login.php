<?php session_start(); ?>

<?php include "../admin/includes/function.php"; ?>

<?php

include "database.php";




if (isset($_POST['login_btn'])) {
	// code...

	    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

   login_user($username, $password);


}
































?>