<!doctype html>
<html class="no-js" lang="en">
	
<head>
	  <?php
        include "includes/header.php";
        ?>	
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
                                <h3>Contact</h3>
                            </div>
                            <ul>
                                <li class="home-bread">Home</li>
                                <li>Contact</li>
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
                    <div class="contact-inner">
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="fa fa-mobile"></i>
                                    <p> We are always available to respond <br> 
                                        <span>Monday-Friday (10 am-18 pm)
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="fa fa-envelope-o"></i>
                                    <p>info@silveringb.online<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Start contact icon column -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="contact-icon text-center">
                                <div class="single-icon">
                                    <i class="fa fa-map-marker"></i>
                                    <p>
                                        Location: Newyork city<br>
                                        <span>23 house/3 Road</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                         <div class="contact-images">
                             <img class="sub" src="img/about/5f58e44ff63d854a1665a381_Bridge_Anim_02_Regulation.gif" alt="">
                         </div>
                    </div>
                     <!--Start Left contact -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form">
                            <div class="row">
                                <form  method="POST" action="" class="contact-form">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" class="form-control First_Name" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="msg_subject" class="form-control Last_Name" placeholder="Subject" required data-error="Please enter your last name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="msg_subject" class="form-control Phone" placeholder="Subject" required data-error="+90">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" class="Email form-control" id="email" placeholder="Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea id="message" rows="7" placeholder="Massage" class="form-control Message" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button type="submit" id="submit" class="add-btn contact-btn Submit">Send Message</button>
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
        
        <script>
        $(".Submit").on('click', function(trigger) {
            trigger.preventDefault(); //stops anything from hapenning 
            
            
            var button = $(".Submit")
            button.prop('disabled','disabled')
            var bval = button.html();
            button.html("Sending Wait...")
            
            var First_Name = $('.First_Name').val()
            var Last_Name = $(".Last_Name").val()
            var Phone = $(".Phone").val()
            var Email = $(".Email").val()
            var Message = $(".Message").val()

            var _formData = {
                First_Name,
                Last_Name,
                Phone,
                Email,
                Message
            }

            var $_databaseObject = {
                url: "contact-process.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                error: function() {
                    button.removeAttr('disabbled')
                    button.html(bval)
                    
                    $(".Submit").html("Send message")
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
                $(".Submit").html("Send message")
                    if (data.output1 != true) {
                        button.removeAttr('disabbled')
                        button.html(bval)
                        //document.getElementById("loading2").style.display = "none";
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
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your Request Was completed successfully',
                            showConfirmButton: false,
                            timer: 6000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }

                        });
                        setInterval(function() {
                            window.location = "";
                        }, 6000);

                    }
                }
            }
            $.ajax($_databaseObject);
            //alert();
        });
    </script>
	</body>
	

</html>