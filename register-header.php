<?php
ob_start();
session_start();
require 'connect.php';

$askAdmin=$pdo->prepare("SELECT * FROM admins where admin_mail=:mail");
$askAdmin->execute(array(
  'mail' => $_SESSION['admin_mail']
  ));
$count=$askAdmin->rowCount();
$pullAdmin=$askAdmin->fetch(PDO::FETCH_ASSOC);

if ($count!==0) {

  Header("Location:index.php?state=alreadyloggedin");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Welcome</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/logo.svg" sizes="180x180">
    <link rel="icon" href="assets/img/logo.svg" sizes="32x32" type="image/png">
    <link rel="icon" href="htassets/img/logo.svg" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="assets/img/logo.svg" color="#712cf9">
    <link rel="icon" href="assets/img/logo.svg">
    <meta name="theme-color" content="#712cf9">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.3/examples/sign-in/sign-in.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="action.php" method="POST">
            <img src="assets/img/logo.svg" alt="" width="auto" height="auto">