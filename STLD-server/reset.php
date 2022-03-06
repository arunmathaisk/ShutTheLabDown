<?php
 require 'rb-sqlite.php';
  session_start();
 if(!isset($_SESSION['AUTH']))
 {
	 header("location:login.php");
     exit;
 }
 $cur_dir = getcwd();
 $cur_dir = "sqlite:". $cur_dir . "/stld.db"; 
 R::setup($cur_dir);
 
	$id = $_GET['id'];
	$lab = R::load("lab", $id);
    $lab->status="awake";
    R::store($lab);
	header("location:index.php");
    exit;

?>
