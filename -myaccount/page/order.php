<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php");

?>
<style>
    .label-danger {
        background-color: rgb(0 0 0);
        border: #d82121 2px solid;
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
                                            $query = qField('request', 'user_id', $_SESSION['Account_id']);
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
                                                    $status = getField('request', 'user_id', $user_id, 'status');
                                                    if ($status) : ?>
                                                        <td><span class="label label-rouded label-danger pull-right">Approved</span></td>
                                                    <?php else : ?>
                                                        <td><span class="label label-rouded label-danger pull-right">Unapproved</span></td>
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
            <footer class="footer"> © 2018 CoinBlade All Right Reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <?php include("includes/script.php") ?>

</body>


<!--         dark/layout-blank.html     2019 02:23:14 GMT -->

</html>