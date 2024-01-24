<?php
session_start();
$errormsg = '';
if(isset($_SESSION['Account_id'])!="") {
    header("Location:../-myaccount/");
}

include 'includes/dbconnect.php';

//check if form is submitted
?>

<html class="no-js" lang="en">

<head>
    <?php
        include "includes/header.php";
        ?>

</head>

<body data-spy="scroll" data-target="#navbar-example">

        <!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
    <?php
    include "includes/nav.php";
    ?>
    
    <!-- Start Slider Area -->
    <div class="login-area area-padding fix">
        <div class="login-overlay"></div>
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-12">
                            <div class="login-form">
                                <h4 class="login-title text-center">LOGIN</h4>
                                <div class="row">
                                <h3>Welcome back</h3>
                                <p>New to Silveringb? <a href="Account.php">Get an Account</a></p>
                                <form>
                                    <div class="switch-div"style="display:none">
                                         <div class="form-group">
                                            <input type="number" style="display:none" name="account_num" id="account_num" value="" placeholder="Your Account Number" class="form-control account_num">
                                            <input type="email" name="email" style="display:none" id="email" placeholder="Your Email Address" class="form-control email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="Your password" class="form-control password">
                                        </div>
                                        <button type="submit" class="slide-btn login-btn btn btn-primary submit" id="submit">Login</button>
                                        <div class="forgot-password">
                                            <a href="contact.php">Forgot Password?</a>
                                        </div>  
                                    </div>
                                    <div class="switch-button"style="display:block">
                                          <div class="connect-with-social">
                                            <button type="submit" class="slide-btn login-btn facebook ac_n"><i class="fa fa-unlock" aria-hidden="true"></i> Login with Account Number</button>
                                            <hr>
                                            <button type="submit" class="slide-btn login-btn google ac_e"><i class="fa fa-at"></i>With Account Email</button>
                                        </div>  
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- all js here -->
    <!-- footer scripts for this fil--->
    <?php
    include "includes/footer_scripts.php";
    ?>
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Form validator js -->
    <script src="js/form-validator.min.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <script  src="my%20shower/package/dist/sweetalert2.all.min.js"></script>
     <script>
        $(document).ready(()=>{
           
            $(".ac_n").click((e)=>{
                e.preventDefault()
                
                $(".switch-div").prop("style","display:block");
                  $(".account_num").prop("style","display:block");
                  $(".email").prop("style","display:none");
                  $(".email").val("");
                  $(".ac_n").prop("style","display:none");
                  $(".ac_e").prop("style","display:block");
            });
            $(".ac_e").click((e)=>{
                e.preventDefault()
                
                $(".switch-div").prop("style","display:block");
                  $(".account_num").prop("style","display:none");
                  $(".account_num").val("")
                  $(".email").prop("style","display:block");
                  $(".ac_e").prop("style","display:none");
                  $(".ac_n").prop("style","display:block");
            });
            
            

        $(".submit").on('click', function(trigger) {
            trigger.preventDefault(); //stops anything from hapenning 
            
            var button = $(".submit")
            button.prop('disabled','disabled')
            
            document.getElementById("submit").innerText = "Login in Wait... ";
            console.log(document.getElementsByClassName("submit"))
            var account_num = $(".account_num").val()
            var email = $(".email").val()
            var password = $(".password").val()
            account_num = account_num === ""?"null" : account_num
            email = email === ""?"null" : email
            
            var _formData = {
                account_num: account_num,
                email: email,
                password: password,
            }

            var $_databaseObject = {
                url: en,
                method: "POST",
                dataType: "json",
                data: _formData,
                 error : function(){
                   button.removeAttr('disabled')
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: "Network Error",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                },
                success: function(data) {
                    if (data.output === 1) {
                        
                    button.removeAttr('disabled')
                        document.getElementById("submit").innerText = "Login";
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.error,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    } else {
                    document.getElementById("submit").innerText = "Logging you in now....";
                     var stope_Int = setInterval(() => {
                                     window.location="../-myaccount";
                                    clearInterval(stope_Int)
                                }, 3000);
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();
            });
        });
        
    </script>
    <script>
        var en = "in.php";
    </script>
    
</body>

</html>