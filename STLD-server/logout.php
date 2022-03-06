<?php
 require 'rb-sqlite.php';
 session_start();
 if(isset($_SESSION['AUTH']))
 {
	 session_unset();
	 session_destroy();
	 header("location:login.php");
     exit;
 }
 else
 {
	header("location:login.php");
    exit;

 }
	
?>