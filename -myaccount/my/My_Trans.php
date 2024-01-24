<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php") ?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap");

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .label-danger {
        background-color: rgb(0 0 0);
        border: #d82121 2px solid;
        cursor: pointer;
    }

    .label-success {
        background-color: rgb(0 0 0);
        border: #1eab24 2px solid;
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
</style>

<body class="header-fix fix-sidebar">

    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include("includes/header.php") ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->xw
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Table</h4>
                                <h6 class="card-subtitle">Data table example</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Crypto Address</th>
                                                <th>Date of request</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = getFields('withdraw');
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                ++$i;
                                                extract($row)
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <!-- <td><?php //echo (getField('user','id',$user_id,'name')) 
                                                                ?></td> -->
                                                    <td><?php echo $amount ?></td>
                                                    <?php
                                                    $status = getField('withdraw', 'user_id', $user_id, 'status');
                                                    if ($status) : ?>
                                                        <td><span class="label label-rouded label-success pull-right">Approved</span></td>
                                                    <?php else : ?>
                                                        <td><span id=<?php echo $id; ?> class="label label-rouded label-danger pull-right action">Unapproved</span></td>
                                                    <?php endif; ?>
                                                    <td><?php echo  $u_crypt ?></td>
                                                    <td><?php echo $date ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
        $(".action").click((e) => {
            e.preventDefault();

            var _formData = new FormData();
            _formData.append('id', $('.action').attr("id"));

            var $_databaseObject = {
                url: "includes/data/withdrawal.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: false,
                processData: false,
                contentType: false,
                error: function() {
                    sweetAlert("Oops...", "Something went wrong !!", "error");
                    $('.action').prop('disabled', 'true');
                    // $('.loader').prop('style', "display:none");
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        
                        sweetAlert("Success", "Done", "success");
                       
                        setTimeout(() => {
                            window.location = "";
                        }, 3000);
                    } else {
                        sweetAlert("Oops...", data.error, "error");
                        $('.action').removeAttr('disabled');
                      
                        // $('.loader').prop('style', "display:none");
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();
        });
    </script>
</body>


<!--         dark/layout-blank.html     2019 02:23:14 GMT -->

</html>