<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ECN - <?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../css/custom.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<div id="overlay"></div>
<body id="page-top" style="visibility: hidden;" onload="unhideBody()">

      <!-- Page Wrapper -->
  <div id="wrapper">
<?php
require '../00_config/connect.php';//db connect
require '../layout/config.php';
require '../layout/logout_modal.php';
require '../layout/sideleft.php';
require '../layout/navbar.php';

  ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">