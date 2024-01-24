<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php");

?>
<style>
    .label-danger {
        background-color: rgb(0 0 0);
        border: #d82121 2px solid;
        cursor: pointer;
    }
    .label-success {
        background-color: rgb(0 0 0);
        border: #1eab24 2px solid;
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
                                                <th>User Name</th>
                                                <th>Package</th>
                                                <th>Status</th>
                                                <th>Date of request</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = getFields('request');
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                ++$i;
                                                extract($row)
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo (getField('user', 'id', $user_id, 'name')) ?></td>
                                                    <td><?php echo (getField('pack', 'id', $pack_id, 'name')) ?></td>
                                                    <?php
                                                    $status = getField('request', 'id', $id, 'status');
                                                    if ($status) : ?>
                                                        <td><span class="label label-rouded label-success pull-right">Approved</span></td>
                                                    <?php else : ?>
                                                        <td ><span id=<?php echo $id; ?> class="label label-rouded label-danger pull-right action">Unapproved</span></td>
                                                    <?php endif; ?>
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
    <!-- All Jquery -->
    <?php include("includes/script.php") ?>
    <script>
        $(".action").click((e) => {
            e.preventDefault();

            var _formData = new FormData();
            _formData.append('id', $('.action').attr("id"));

            var $_databaseObject = {
                url: "includes/data/upPack.php",
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