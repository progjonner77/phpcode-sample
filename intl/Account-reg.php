<!doctype html>
<html class="no-js" lang="en">
    
	<?php 
	include 'includes/dbconnect.php';
	session_start();
	if(@ $_SESSION['CODE'] == ""){
	    header("location:Code.php");
	}
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
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <lable class="form-label">Account Name</lable>
                                        <input type="text" id="Account-Name" class="form-control" placeholder="Acount Name" required data-error="Please enter your name" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Email Address</lable>
                                        <input type="email" class="Account-Email-Address form-control" id="Account-Email-Address" placeholder="Account Email Address"  required data-error="Please enter your Eamil Address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <lable class="form-label">Enter Currency </lable>
                                      <select name="currency-select" id="Currency">
                                                           <option value="...">...</option>
                                                            <?php
                                                                if ($count1 > 0) {
                                                                    $i = 1;
                                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                                ?>
                                                            <option value="<?php echo $row["Names"]; ?>">
                                                                <?php echo $row["Names"]; ?>
                                                            </option>

                                                            <?php
                                                                    }
                                                                }
                                                    ?>  
                                            </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Enter Account type</lable>
                                         <select id="Account">
                                                <option> Deposit account </option>
                                                <option> Transaction account</option>
                                                <option> Savings account </option>
                                                <option> Time Deposit </option>
                                                <option> Tax-free savings account </option>
                                                <option> Fixed Deposit Account </option>
                                                <option>Non Resident Account </option>
                                                <option> Joint account </option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Iban Number</lable>
                                        <input type="text" class="Iban-Number form-control" id="Iban-Number" placeholder="Enter your Iban Number" value="--" required data-error="Please enter your Iban Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Tel No</lable>
                                        <input type="text" class="Account-Tel-No form-control" id="Account-Tel-No" placeholder="Add your country code (+..)" required data-error="Please enter number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Country</lable>
                                        <input type="text" class="Country form-control" id="Country" placeholder="Enter your Country" required data-error="Please enter your Country">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Occupation</lable>
                                        <input type="text" class="Occupation form-control" id="Occupation" placeholder="Enter your Occupation" required data-error="Please enter your Occupation">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Next of Kin</lable>
                                        <input type="text" class="Next-of-Kin form-control" id="Next-of-Kin" placeholder="Enter your Next of Kin" required data-error="Please enter your Next of Kin">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Marital Status</lable>
                                        <input type="text" class="Marital-Status form-control" id="Marital-Status" placeholder="Enter your Marital Status" required data-error="Please enter your Marital Status">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Address</lable>
                                        <input type="text" class="Address form-control" id="Address" placeholder="Enter your Address" required data-error="Please enter your Address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                   <div class="col-md-6 col-sm-6 col-xs-12">
                                         <lable class="form-label">Date of Birth</lable>
                                        <input type="date" class="Date-of-Birth form-control" id="Date-of-Birth" placeholder="Enter your Date of Birth" required data-error="Please enter your Date of Birth">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button type="submit" id="submit" class="add-btn contact-btn submit">Create</button>
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
            
            var button = $(".submit")
            var bval = button.html();
            button.prop('disabled','disabled')
            button.html("Processing...")
            
            var Account_Name = $("#Account-Name").val();
            var IBAN_Number = $("#Iban-Number").val();
            var Account_Type = $("#Account").val();
            var Account_Email_Address = $("#Account-Email-Address").val();
            var Account_Tel_No = $("#Account-Tel-No").val();
            var Country = $("#Country").val();
            var Address = $("#Address").val();
            var Date_of_Birth = $("#Date-of-Birth").val();
            var Zip_Code = "null";
            var Next_Of_KIN = $("#Next-of-Kin").val();
            var Occupation = $("#Occupation").val();
            var Marital_Status = $("#Marital-Status").val();
            var Password = $(".Password").val();
            var Currency = $("#Currency").val();

            var _formData = {
                Account_Name: Account_Name,
                Account_Type: Account_Type,
                IBAN_Number: IBAN_Number,
                Account_Type: Account_Type,
                Account_Email_Address: Account_Email_Address,
                Account_Tel_No: Account_Tel_No,
                Country: Country,
                Zip_Code: Zip_Code,
                Next_Of_KIN: Next_Of_KIN,
                Occupation: Occupation,
                Marital_Status: Marital_Status,
                Currency: Currency,
                Address:Address,
                Date_of_Birth:Date_of_Birth

            }

            var $_databaseObject = {
                url: "includes/admin/funcs/_account.php",
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
                    }else {
                        //document.getElementById("loading2").style.display = "none";
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "While we verify your Info, your details will be sent to your Email shortly!",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                     var stope_Int = setInterval(() => {
                                     window.location="login.php";
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