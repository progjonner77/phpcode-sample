<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php include "includes/head.php" ?>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar ">
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
                            <span class="text-muted fw-light">Forms /</span> Basic Inputs
                        </h4>

                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="../assets/img/elements/7.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">
                                            Some quick example text to build on the card title.
                                        </p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="javascript:void(0)" class="card-link">Card link</a>
                                        <a href="javascript:void(0)" class="card-link">Another link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <h5 class="card-header">Float label</h5>
                                    <div class="card-body">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInput_old">
                                            <label for="floatingInput">Old</label>
                                            <div id="floatingInput_old" class="form-text">fill in  old password</div>
                                            </div>
                                            <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInput_new">
                                            <label for="floatingInput">New</label>
                                            <div id="floatingInput_new" class="form-text">fill in  new password</div>
                                            </div>
                                            <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInput_con">
                                            <label for="floatingInput">Confirm</label>
                                            <div id="floatingInput_con" class="form-text">Confirm your new password.</div>
                                            </div>
                                        </div>
                                    </div>
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
    <?php include "includes/script.php" ?>
</body>

</html>