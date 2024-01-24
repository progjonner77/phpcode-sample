<!DOCTYPE html>

<?php
include("admin_temps/config/initiate.php");

$message = '';
 //echo passCrypt("@Etrust2000");


if (isset($_SESSION['Account_id'])) {
    header('location:index.php');
} else {

    if (!empty($_POST['name'])) {
        
       
        $query = "
		SELECT * FROM account 
  		WHERE Account_Name = '" . $_POST["name"] . "' AND Account_Email_Address = '" . $_POST["email"] . "'";
	    
	
        $statement = mysqli_query($con,$query);
        
        // echo mysqli_error($con);
         
        // var_dump($con);
         $count = mysqli_num_rows($statement);;
        if ($count > 0) {

            while ($row = mysqli_fetch_assoc($statement)) {
                  $_id = $row['id'];
                  $Account_Name = $row['Account_Name'];
                  $pass = $row["Password"];
                  $image = $row["Image_Name"];
            }
            
            if (password_verify($_POST["password"], $pass)) {
                $_SESSION['Account_id'] = $_id;
                $_SESSION['Account_Name'] = $Account_Name;
                $_SESSION['Image']  = $image;
                
                 $sub_query = "
					INSERT INTO login_details 
					(user_id) 
					VALUES ('" . $_SESSION['Account_id'] . "')
					";
                    $statement = mysqli_query($con,$sub_query);
                    header('location:index.php');
                    
            } else {
                $message = '<label>Wrong Password</label>';
            }
            
        //check if user has logged in before
    }else{
         $message = '<label>Wrong Username / Email</labe>';
    }
  }
}
?>


<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>|intl silveringb </title>
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



    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css">
    
    

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="../assets/css/demo.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    
    

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css">
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="../../gtag/js?id=GA_MEASUREMENT_ID"></script>
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

</head>

<body>

  <!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="../assets/img/logo/logo.png" />
                </span>
              <!--<span class="app-brand-text demo text-body fw-bolder"></span>-->
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to intl silveringb! 👋</h4>
          <p class="mb-4">Please sign-in to your Account </p>

          <form id="formAuthentication" class="mb-3" action="auth-login.php" method="POST">
              <h6 style="text-align:center;color:red;box-shadow: -4px 6px 5px 0px black;border-radius: 62%;"> <?php echo @$message; ?> </h6>
            
            <div class="mb-3">
              <label for="email" class="form-label">Username</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" autofocus="">
            </div>  
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus="">
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
     
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" name="login" type="submit">Sign in</button>
              <div id="msgSubmit" class="h3 text-center hidden"></div
            </div>
          </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<!-- / Content -->



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  
  

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  
  
  
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async="" defer="" src="../../buttons.js"></script>
  
</body>

</html>
