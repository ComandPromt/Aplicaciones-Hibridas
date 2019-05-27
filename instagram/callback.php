<?php
session_start();
include "instaClass.php";

if(!isset($_GET['code'])){
 header('location: index.php');
}

$obj_insta = new instaClass();

// Set access token
$obj_insta->setAccess_token($_GET['code']);

// Get user details
$result = $obj_insta->getUserDetails();

$_SESSION['insta_login'] = $result;

header('location: home.php');