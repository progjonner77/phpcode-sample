<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php");
?>
 
<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap");

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .card {
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.7);
        /* user-select: none; */
    }

    .profile-card {
        margin-left: auto;
    }

    .cover-photo {
        position: relative;
        background: url(https://i.imgur.com/jxyuizJ.jpeg);
        background-size: cover;
        height: 180px;
        border-radius: 5px 5px 0 0;
    }

    .profile {
        position: absolute;
        width: 120px;
        bottom: -60px;
        left: 30px;
        border-radius: 50%;
        border: 2px solid #222;
        background: #222;
        padding: 5px;
    }

    .profile-name {
        font-size: 20px;
        margin: 25px 0 0 120px;
        color: #fff;
    }

    .about {
        margin-top: 30px;
        line-height: 1.6;
    }

    .btn {
        margin: 30px 15px;
        background: #7ce3ff;
        padding: 10px 25px;
        border-radius: 3px;
        border: 1px solid #7ce3ff;
        font-weight: bold;
        font-family: Montserrat;
        cursor: pointer;
        color: #222;
        transition: 0.2s;
    }

    .btn:last-of-type {
        background: transparent;
        border-color: #7ce3ff;
        color: #7ce3ff;
    }

    .btn:hover {
        background: #7ce3ff;
        color: #222;
    }

    .icons {
        width: 180px;
        margin: 0 auto 10px;
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }

    .icons i {
        cursor: pointer;
        padding: 5px;
        font-size: 18px;
        transition: 0.2s;
    }

    .icons i:hover {
        color: #7ce3ff;
    }

    #btnfile {
        cursor: pointer;
    }
</style>

<body class="header-fix fix-sidebar">

    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include("includes/header.php") ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include("includes/side.php") ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <?php include("includes/widget.php") ?>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12 row">
                        <div class="col-md-12 col-lg-4">
                            <div class="card profile-card">
                                <div class="cover-photo" class="social-tooltip" title="Click Update" aria-label="Click Update" id="btnfile">
                                    <?php
                                    if (@$Image_Name != NULL && @$Image_Name != "") {
                                    ?>
                                        <img id="blah" src="includes/data/images/<?php echo @$Image_Name ?>" class="profile">

                                    <?php
                                    } else {
                                    ?>
                                        <img id="blah" src="../images/avatar/avatar.png" class="profile">
                                    <?php

                                    }
                                    ?>
                                </div>
                                <div class="wrapper" style="display: none;">
                                    <input type="file" id="uploadfile" />
                                </div>

                                <h3 class="profile-name"><?php echo $name ?></h3>

                                <button class="btn accept_image" style="display: none;">Update Image</button>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide update-form" action="#" method="post">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="name" value="<?php echo $name ?>" name="username" placeholder="Enter a username..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="email" value="<?php echo $email ?>" name="email" placeholder="Your valid email..">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Crypto <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="cr" value="<?php echo $cr ?>" name="cr" placeholder="Enter a crypo ..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-primary update">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2022 bitdollartrade All Right Reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <?php include("includes/script.php") ?>

    <script>
    
        $(".update").click((e) => {
            e.preventDefault();

            var _formData = new FormData();
            _formData.append('user', $('#name').val() );
            _formData.append('email', $('#email').val());
             _formData.append('cr', $('#cr').val());


            var $_databaseObject = {
                url: "includes/data/update_profile.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: false,
                processData: false,
                contentType: false,
                error: function() {
                    sweetAlert("Oops...", "Something went wrong !!", "error");
                    $('.accept_image').prop('disabled', 'true');
                    // $('.loader').prop('style', "display:none");
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        $('.change-img ').attr('src', $('#blah').attr('src'));
                        sweetAlert("Success", "Done", "success");
                        $('.accept_image').prop('style', "display:none");
                        setTimeout(() => {
                            window.location = "";
                        }, 3000);
                    } else {
                        sweetAlert("Oops...", data.error, "error");
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