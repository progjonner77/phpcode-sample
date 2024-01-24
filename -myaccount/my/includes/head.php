<?php
include("includes/init.php");
if ($_SESSION['Account_id'] == '') {
    header('location:login.php');
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="robots" content="noindex">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://bitdollartrade.com/images/BDT.png">
    <title> <?php
            $nav_class = (strstr(basename($_SERVER['PHP_SELF']), ".", true)) == 'index' ? " " : "wpo-header-style-3" ?>
    </title>
    <!-- Custom CSS -->


    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <style>
        .header .top-navbar .navbar-header .navbar-brand b img {
            max-width: 278%;
            width: 100%;
        }
        .header .top-navbar .navbar-header .navbar-brand b {
            width: 64px !important;
        }
    </style>
    <!-- Custom CSS -->
</head>

<?php
$query = qField('admin', 'id', $_SESSION['Account_id']);
$i = 0;
while ($row = mysqli_fetch_assoc($query)) {
    ++$i;
    extract($row);
}
?>