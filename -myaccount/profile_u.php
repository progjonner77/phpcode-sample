<!DOCTYPE html>
<?php include "includes/head.php";
$data = array(
    'id' => $_SESSION['Account_id'],
);

$result = qFields($con, "account", "*", $data);
$i = 0;

if (!$result) {
} else {
    while ($row_pro = mysqli_fetch_assoc($result)) {
        ++$i;
        extract($row_pro);
    }
}

?>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->

            <?php include "includes/side.php" ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <?php include "includes/top.php" ?>
                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">Account Settings /</span> Account
                        </h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <?php
                                            if ($Image_Name != 'null' && $Image_Name != "") {
                                            ?>
                                                <img id="blah" alt="user-avatar" class="d-block rounded profile" height="100" width="100" id="uploadedAvatar" src="../-myaccount/includes/data/images/<?php echo $Image_Name ?>">

                                            <?php
                                            } else {
                                            ?>
                                                <img id="blah" src="../assets/img/elements/12.png" alt="user-avatar" class="profile d-block rounded" height="100" width="100" id="uploadedAvatar">
                                            <?php

                                            }
                                            ?>

                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Upload new photo</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4 accept_image">
                                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Submit</span>
                                                </button>

                                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="Account_Email_Address" name="Account_Email_Address" value="<?php echo $Account_Email_Address ?>" placeholder="">
                                                </div>
                                            <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="Account_Tel_No">Phone Number</label>
                                                    <br/>
                                                        <input type="number" id="Account_Tel_No" name="Account_Tel_No" class="form-control" value="<?php echo $Account_Tel_No ?>" placeholder="<?php echo $Account_Tel_No ?>">

                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="IBAN_Number" class="form-label">IBAN Number</label>
                                                    <input type="text" class="form-control" id="IBAN_Number" name="IBAN_Number" value="<?php echo $IBAN_Number ?>" placeholder="IBAN_Number">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Country" class="form-label">Country</label>
                                                    <input class="form-control" type="text" id="Country" name="Country" value="<?php echo $Country ?>" placeholder="California">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Zip_Code" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" id="Zip_Code" value="<?php echo $Zip_Code ?>" name="Zip_Code" placeholder="231465" maxlength="6">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Occupation" class="form-label">Occupation</label>
                                                    <input type="text" class="form-control" id="Occupation" name="Occupation" value="<?php echo $Occupation ?>" placeholder="231465" maxlength="6">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Next_Of_KIN" class="form-label">Next_Of_KIN</label>
                                                    <input type="text" class="form-control" id="Next_Of_KIN" name="Next_Of_KIN" value="<?php echo $Next_Of_KIN ?>" placeholder="231465" maxlength="6">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Marital_Status" class="form-label">Marital Status</label>
                                                    <input type="text" class="form-control" id="Marital_Status" name="Marital_Status" value="<?php echo $Marital_Status ?>" placeholder="231465" maxlength="6">
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 update">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary reset">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- / Content -->




                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


    </div>
    <!-- / Layout wrapper -->
    <?php include "includes/script.php" ?>
    <script>
        $('.accept_image').prop('style', "display:none");

        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('.accept_image').prop('style', "display:block");
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#upload").change(function() {
            readURL(this); //return the exact element <input type=​"file" id=​"uploadfile">​
        });
        $(".accept_image").click(function(e) {
            e.preventDefault();
            const self = $(this);
            var val;
            off(self)

            $('.accept_image').prop('display', "true");
            $('.accept_image').val('Please Wait');

            var file = $("#upload").prop("files")[0];
            var _formData = new FormData();
            _formData.append('file', file);

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/upload.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: false,
                processData: false,
                contentType: false,
                error: function() {

                    $('.accept_image').prop('disabled', 'true');
                    error(self)
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        $('.change-img ').attr('src', $('#blah').attr('src'));
                        success(self);
                        $('.accept_image').prop('style', "display:none");

                    } else {
                        $('.accept_image').removeAttr('disabled');
                        $('.accept_image').prop('style', "display:block");
                        error(self, data.error);
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();

        });
        $(".update").click(function(e) {
            e.preventDefault();

            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();
            var $_databaseObject = {
                url: "admin_temps/admin/funcs/update_profile.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: true,
                processData: true,
                error: function() {
                    error(self)
                    $('.accept_image').prop('disabled', 'true');
                    // $('.loader').prop('style', "display:none");
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        $('.change-img ').attr('src', $('#blah').attr('src'));
                        success(self);
                        $('.accept_image').prop('style', "display:none");
                        setTimeout(() => {
                            window.location = "";
                        }, 3000);
                    } else {
                        error(self, data.output1);
                        $('.accept_image').removeAttr('disabled');
                        $('.accept_image').prop('style', "display:block");
                        // $('.loader').prop('style', "display:none");
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();

        });
    </script>

</body>

</html>