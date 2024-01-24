<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php include "includes/head.php";

?>


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
                            <span class="text-muted fw-light">Forms /</span> Basic Inputs
                        </h4>

                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <?php


                                    ?>
                                    <div class="container">

                                    </div>
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
                                <form id="formAccountSettings" method="POST" onsubmit="return false">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <?php
                                                $result = qField_all("crypto", "id");
                                                $i = 0;

                                                if (!$result) {
                                                } else {
                                                    while ($row_pro = mysqli_fetch_assoc($result)) {
                                                        ++$i;
                                                        $crypto_name =  $row_pro['crypto_name'];
                                                        $address =  $row_pro['address'];
                                                    }
                                                }


                                                ?>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Loan_amount">Amount</label> <input type="text" class="form-control" id="Loan_amount" name="Loan_amount" placeholder="00000" aria-describedby="Loan_amount">

                                                        <div id="Amount" class="form-text">fill in Amount</div>
                                                    </div>
                                                    <div class="mb-3 load" style="display:none">
                                                        <div class="spinner-grow  text-danger" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                        <label style="color:coral" for="Address" id="Equ">Equivalent In coin</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Amount">Year Span</label>
                                                        <input type="text" class="form-control" id="Year" placeholder="Year" name="Year" aria-describedby="Year">
                                                        <div id="Amount" class="form-text">fill in the Payment Year Span</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Purpose">Enter Extra Loan Details</label>
                                                        <textarea rows="4" cols="50" name="Purpose" id="Purpose" class="form-control" placeholder="Enter the required loan details in here" aria-label="Enter the required Loan details in here" aria-describedby="basic-icon-default-message2" style="min-height:calc(8.530000000000001em + 0.875rem + 2px) !important"></textarea>

                                                        <div id="Purpose" class="form-text">fill in the Transaction Details</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Amount">Loan Interest : %</label>
                                                        <input type="text" readonly class="form-control" id="Interest" placeholder="00000" value="10" name="Interest" aria-describedby="Interest">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Total_Interest">Total Interest</label>
                                                        <input type="text" readonly class="form-control" id="Total_Interest" placeholder="Total Interest" name="Monthly_Payment" aria-describedby="Monthly_Payment">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Total_Payment">Total Payment</label>
                                                        <input type="text" readonly class="form-control" id="Total_Payment" name="Total_Payment" placeholder="Total Payment" aria-describedby="Total_Payment">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Monthly_Payment">Monthly Payment</label>
                                                        <input type="text" readonly class="form-control" id="Monthly_Payment" placeholder="Monthly Payment" name="Total_Interest" aria-describedby="Total_Interest">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="bal">Cash At Hand</label>
                                                        <input type="text" readonly class="form-control" id="bal" placeholder="Total Payment" value="<?php echo (nameToSymbol($Currency)) . ' ' . $Account_Balance ?>" aria-describedby="bal">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 send">Compute Interest</button>
                                                <button type="reset" class="btn btn-outline-secondary reset">Cancel</button>
                                                <div class="mb-3">
                                                    <div style="display:none" class="spinner-grow load1 text-danger" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <label for="Address" id="Equ1">Equivalent In coin</label>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </form>
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



    <?php include "includes/script.php" ?>

    <script>
        function onLoader(msg) {
            $(".load").prop("style", "display:block")
            $("#Equ").html(msg)
        }

        function offLoader(msg = "") {
            $("#Equ").html(`${msg}`)
            $(".load").prop("style", "display:none")
        }

        // Calculate Results
        function calculateResults() {

            const amount = document.getElementById("Loan_amount");
            const interest = 10;
            const years = document.getElementById("Year");
            const monthlyPayment = document.getElementById("Monthly_Payment");
            const totalPayment = document.getElementById("Total_Payment");
            const totalInterest = document.getElementById("Total_Interest");

            const principal = parseFloat(amount.value);
            const calculatedInterest = parseFloat(interest) / 100 / 12;
            const calculatedPayments = parseFloat(years.value) * 12;

            // Computed Monthly payment
            const x = Math.pow(1 + calculatedInterest, calculatedPayments);
            const monthly = (principal * x * calculatedInterest) / (x - 1);
            // alert(monthly);
            if (isFinite(monthly)) {
                monthlyPayment.value = monthly.toFixed(2);
                totalPayment.value = (monthly * calculatedPayments).toFixed(2);
                totalInterest.value = (monthly * calculatedPayments - principal).toFixed(2);

                // Show Results
                setTimeout(() => {
                    offLoader()
                }, 5000);

            }
        }

        $("#Loan_amount, #Year").on("blur", (e) => {
            e.preventDefault();
            onLoader("Computing...")
            if (check()) {
                return
            } else {

                calculateResults()
            }
        });


        function check() {

            if (($("#Loan_amount").val() === "") || ($("#Year").val() === "")) {
                offLoader();
                return true;
            }

        }



        $(".send").click(function(e) {
            e.preventDefault();

            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/reg_loan.php",
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