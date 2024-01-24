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
                        <form id="formAccountSettings" method="POST">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <img class="card-img-top profile" src="../assets/img/elements/7.jpg" alt="Card image cap">
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
                                        <h5 class="card-header">Personal Details</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label"> Crypto Name  </label>
                                                        <input type="text" name="crypto_name" id="Occupation" class="form-control" placeholder="Occupation ">
                                                    </div>

                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label"> Crypto Address </label>
                                                        <input type="text" name="address" id="Next_Of_KIN" class="form-control" placeholder="Next Of KIN">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary send">
                                                <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Add
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
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
    <script>
        $(".send").click(function(e) {
            e.preventDefault();
            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/add_crypto.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: true,
                processData: true,
                error: function() {
                    error(self)
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        success(self);
                        setTimeout(() => {
                            window.location = "";
                        }, 3000);
                    } else {
                        error(self, data.error);
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();

        });
    </script>
</body>

</html>