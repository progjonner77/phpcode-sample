<?php
include("admin_temps/config/initiate.php");

if ($_SESSION['Account_id'] == '') {
    header('location:../intl/login.php');
}
?>

<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,
      user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    
    
    <title>|Intl Silveringb </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://intl.silveringb.online/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://intl.silveringb.online/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://intl.silveringb.online/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://intl.silveringb.online/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://intl.silveringb.online/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css">
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons-2.1.4/css/boxicons.css">
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons-2.1.4/css/animations.css">
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons-2.1.4/css/transformations.css">


  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="../assets/css/demo.css">

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
  <link rel="stylesheet" href="../nice-select/dist/css/nice-select2.css">
  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async="async" src="../gtag/js?id=GA_MEASUREMENT_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
  </script>
  <!-- Custom notification for demo -->
  <!-- beautify ignore:end -->

  <style>
      .text-muted {
        --bs-text-opacity: 1;
        color: #ac4848 !important;
    }
    .layout-menu {
      background: #fff;
      border: 1px solid rgba(0, 0, 0, .1);
      box-shadow: 0 2px 4px rgba(0, 0, 0, .3) !important;
      margin: 1% 0% 1% 2% !important;
      left: 1% !important;
      border-radius: 10px;
      overflow: hidden;
    }

    .menu .app-brand.demo {
      height: 64px;
      margin-top: 12px;
      background: lightgray;
    }

    .form-floating {
      position: relative;
      margin-bottom: 8%;
    }
  </style>
  <style>
    td.highlight {
      background-color: whitesmoke !important;
    }

    tr.highlight {
      background-color: whitesmoke !important;
    }

    .app-brand-logo img {
      width: 30%
    }
    .app-brand-link {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    .menu-vertical .app-brand {
      padding-right: 0rem;
      padding-left: 0rem;
    }

    .app-brand-text.demo {
        font-size: 1.4vw;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        color: white;
    }

    .avatar.avatar-online img {
      width: 100% !important;
      height: 100% !important;
    }
    .app-brand-logo {
        display: flex;
        flex-grow: 0;
        flex-shrink: 0;
        overflow: hidden;
        min-height: 1px;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: space-evenly;
        flex-direction: row;
        padding-bottom: 5%;
        width: 100%;
    }
    
  </style>
<style>
    body{
        background-color: #0f0f0fdb;
    }
 
</style>
</head>