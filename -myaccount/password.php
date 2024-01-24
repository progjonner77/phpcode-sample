<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php include "includes/head.php" ?>
<?php $data = array(
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
                            <span class="text-muted fw-light">Settings /</span> Password
                        </h4>

                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">

                                    <?php
                                    if ($Image_Name != 'null' && $Image_Name != "") {
                                    ?>
                                        <img alt="user-avatar" class="card-img-top" src="includes/data/images/<?php echo $Image_Name ?>">

                                    <?php
                                    } else {
                                    ?>
                                        <img src="../assets/img/elements/12.jpg" alt="user-avatar" class="card-img-top">
                                    <?php

                                    }
                                    ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><b><?php echo $Account_Name?></b></h5>
                                        <p class="card-text">
                                            Your Account is up and running 
                                        </p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                    
                                        <li class="list-group-item"><b>My Balance</b></li>
                                        <li class="list-group-item"><?php echo (nameToSymbol(getField('account', 'id', $id, 'Currency'))). $Account_Balance  ?></li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="profile.php" class="card-link">Profile</a>
                                        <a href="password.php" class="card-link">Settings</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <h5 class="card-header">Password Settings</h5>

                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" name="old" placeholder="John Doe" aria-describedby="floatingInput_old">
                                                <label for="floatingInput">Old</label>
                                                <div id="floatingInput_old" class="form-text">fill in old password</div>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" name="new" placeholder="John Doe" aria-describedby="floatingInput_new">
                                                <label for="floatingInput">New</label>
                                                <div id="floatingInput_new" class="form-text">fill in new password</div>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" name="confirm" placeholder="John Doe" aria-describedby="floatingInput_con">
                                                <label for="floatingInput">Confirm</label>
                                                <div id="floatingInput_con" class="form-text">Confirm your new password.</div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 update">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary reset">Cancel</button>
                                            </div>
                                        </form>
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
    <script>
        $(".update").click(function(e) {
            e.preventDefault();
            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/update_password.php",
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