<?php
require '../config/db.php';
require '../classes/ticket.class.php';
require '../classes/passenger.class.php';
require '../classes/user.class.php';
require '../classes/class.book.php';
session_start();
if(!isset($_SESSION['admin'])){
  echo '<script>alert("You must login first");window.location="./index.php"</script>';
  exit();
}
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$ticket = new Ticket($db);
$passenger = new Passenger($db);
$user = new User($db);
$booked = new Book($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book Your Train Admin </title>

    <!-- Custom CSS -->
    <link href="./dist/css/custom.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
