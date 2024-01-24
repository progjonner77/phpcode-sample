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
                            <span class="text-muted fw-light">Create /</span> An Account
                        </h4>
                        <form id="formAccountSettings" method="POST">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="User_Name" class="form-label">Enter Account Name</label>
                                                        <input type="text" name="Account_Name" id="Account_Name" class="form-control" placeholder="Enter Account Name">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="Status" class="form-label">Account Number</label>
                                                        <input type="text" name="Account_Number" id="Account_Number" class="form-control" placeholder="Account Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="Date" class="form-label"> Account Balance</label> <input type="number" name="Account_Balance" id="Account_Balance" class="form-control" placeholder="000000">
                                                    </div>

                                                    <div class="col mb-0">
                                                        <label for="coin" class="form-label">Account Email Address</label>
                                                        <input type="text" name="Account_Email_Address" id="Account_Email_Address" class="form-control" placeholder="Account Email Address">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="emailBackdrop" class="form-label">Account Type</label>
                                                        <select name="Account_Type" id="Account_Type" class=" form-control form-select">
                                                            <option>Savings account</option>
                                                            <option>Current Account</option>
                                                            <option>Non Resident Account</option>
                                                            <option>Fixed Deposit Account</option>
                                                            <option>Check Account</option>
                                                        </select>
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="Status" class="form-label">Currency</label>
                                                        <select name="Currency" id="Currency" class=" form-control form-select">
                                                            <?php
                                                            $result = qField_all("currency", "id");
                                                            if (!$result) {
                                                            } else {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                                    <option value="<?php echo symbolToName($row["Symbol"]); ?>">
                                                                        <?php echo $row["Symbol"]; ?>
                                                                    </option>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label">Status</label>
                                                        <select name="Status" id="Status" class=" form-control form-select">
                                                            <option>Active</option>
                                                            <option>Deactivated</option>
                                                            <option>Suspended</option>
                                                        </select>
                                                    </div>

                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label">Card Status</label>
                                                        <select name="Status_Card" id="Status_Card" class=" form-control form-select">
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                                            <option>Suspended</option>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label">Date</label>
                                                        <input type="date" name="Date" id="Date" class="form-control" placeholder="2023:05:10">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="Ben_Bank" class="form-label">Account Tel No</label>
                                                        <input type="text" name="Account_Tel_No" id="Account_Tel_No" class="form-control" placeholder="Account Tel No">
                                                    </div>
                                                </div>
                                            </div>
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
                                                        <label for="Ben_Accname" class="form-label"> Occupation </label>
                                                        <input type="text" name="Occupation" id="Occupation" class="form-control" placeholder="Occupation ">
                                                    </div>

                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label"> Next Of KIN</label>
                                                        <input type="text" name="Next_Of_KIN" id="Next_Of_KIN" class="form-control" placeholder="Next Of KIN">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label">Marital Status </label>
                                                        <input type="text" name="Marital_Status" id="Marital_Status" class="form-control" placeholder="Marital Status">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label">Date of Birth</label>
                                                        <input type="date" name="Date_of_Birth" id="Date_of_Birth" class="form-control" placeholder="Date of Birth">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label">Country</label>
                                                        <input type="text" name="Country" id="Country" class="form-control" placeholder="Country">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="Ben_Accname" class="form-label">Zip Code</label>
                                                        <input type="text" name="Zip_Code" id="Zip_Code" class="form-control" placeholder="Zip Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row mb-3">
                                                    <div class="col mb-0">
                                                        <label for="nameBackdrop" class="form-label">IBAN_Number</label>
                                                        <input type="text" name="IBAN_Number" id="IBAN_Number" class="form-control" placeholder="IBAN_Number">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="Address" class="form-label">Address</label>
                                                        <input type="text" name="Address" id="Address" class="form-control" placeholder="Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary send">
                                                <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Create
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
                url: "admin_temps/admin/funcs/reg_account.php",
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