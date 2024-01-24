<!doctype html>
<html class="no-js" lang="en">
    
	<?php 
	include 'includes/dbconnect.php';
    	$result2 = mysqli_query($con, "Select  * From currency ORDER BY `id` ASC");
    // echo mysqli_error();
    
    
    $count1 = mysqli_num_rows($result2);

	?>
	
<head>
	  <?php
        include "includes/header.php";
        ?>	
        <style>
            .contact-form input[type="text"], .contact-form input[type="email"], input[type="number"],input[type="date"], select {
                background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                border: 3px solid #1B2654;
                border-radius: 0;
                color: #1b2654;
                height: 52px;
                margin-bottom: 25px;
                padding-left: 20px;
                width: 100%;
                background: #ffffff;
            }
            .nice-select {
                width: 100%;
                border: 3px solid #1B2654;
                border-radius: 0;
                color: #1b2654;
                height: 52px;
            }
            .nice-select.open .list {
                overflow-y: scroll;
                opacity: 1;
                pointer-events: auto;
                -webkit-transform: scale(1) translateY(0);
                height: 500%;
                -ms-transform: scale(1) translateY(0);
                transform: scale(1) translateY(0);
            }
        </style>
	</head>
		<body>

		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

        <div id="preloader"></div>
        <!-- Start Header Area -->
          <?php
        include "includes/nav.php";
        ?>
        <!-- End Header Area -->
        <!-- Start breadcrumbs area -->
        <div class="page-area">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline white-headline text-center">
                                <h3>Account</h3>
                            </div>
                            <ul>
                                <li class="home-bread">Home</li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumbs area -->
        <!-- Start contact page area -->
        <div class="contact-area bg-color area-padding">
            <div class="container">
                <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                         <div class="contact-images">
                             <img class="sub" src="img/about/8e363755412931.598334711828f.gif" alt="">
                         </div>
                    </div>
                     <!--Start Left contact -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form">
                            <div class="row">
                                <form  method="POST" action="" class="contact-form">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <lable class="form-label">Account Name</lable>
                                        <input type="text" id="Account-Name" class="form-control" placeholder="Acount Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                   
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                         <lable class="form-label">Email</lable>
                                        <input type="email" class="Account-Email-Address form-control" id="Account-Email-Address" placeholder="Enter your Account Email Address" required data-error="Please enter your Account Email Address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                       
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button type="submit" id="submit" class="add-btn contact-btn submit">Send Code</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                        <div class="clearfix"></div>
                                    </div>   
                                </form>  
                            </div>
                        </div>
                    </div>
                     <!--End Left contact -->
                </div>
            </div>
        </div>
        <!-- End contact page area -->
        <!-- Start footer area -->
       <!-- Start footer area -->
       <footer class="footer-1">
        <?php
        include "includes/footer.php";
        ?>
        </footer>

        <!-- footer scripts for this fil--->
        <?php
        include "includes/footer_scripts.php";
        ?>
        <script src="js/jquery.nice-select.min.js"></script>
        <script>
        $(".submit").on('click', function(trigger) {
            trigger.preventDefault(); //stops anything from hapenning 
            var Account_Name = $("#Account-Name").val();
            
            var button = $(".submit")
            var bval = button.html();
            button.prop('disabled','disabled')
            button.html("Processing...")
            
            var Account_Email_Address = $("#Account-Email-Address").val();
           
            var _formData = {
                Account_Name,
                Account_Email_Address
            }

            var $_databaseObject = {
                url: "includes/admin/funcs/reg_account.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                error : function(){
                   button.removeAttr('disabled')
                   button.html(bval) 
    
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
                    if (data.error === 1) {

                        //document.getElementById("loading2").style.display = "none";
                        button.removeAttr('disabled')
                        button.html(bval)
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.output1,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    } else {
                        //document.getElementById("loading2").style.display = "none";
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "Confirmation code sent Successfully!",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                     var stope_Int = setInterval(() => {
                                     window.location="Code.php";
                                    clearInterval(stope_Int)
                                }, 3000);
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();
        });
    </script>
    
	</body>

</html>