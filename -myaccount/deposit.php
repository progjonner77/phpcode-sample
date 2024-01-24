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
                                                <div class="mb-3 div_qr">
                                                    <img class="QR" id="Copy" alt="" src="<?php echo $target; ?>phone-to-text.png" />
                                                    <label for="Copy" class="form-label">Scan to verify</label>
                                                </div>


                                                <label for="defaultSelect" class="form-label">Select Wallet</label>
                                                <select id="crypto_name" name="crypto_name" class="form-select">
                                                    <option value="">Default select</option>
                                                    <?php
                                                    $result = qField_all("crypto", "id");
                                                    $i = 0;

                                                    if (!$result) {
                                                    } else {
                                                        while ($row_pro = mysqli_fetch_assoc($result)) {
                                                            ++$i;
                                                            $address = $row_pro['crypto_name']
                                                    ?>

                                                            <option value="<?php echo strToLower($row_pro['crypto_name']) ?>"><?php echo $row_pro['crypto_name'] ?></option>

                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="Amount" name="amount" placeholder="00000" aria-describedby="Amount">
                                                        <label for="Amount">Amount</label>
                                                        <div id="Amount" class="form-text">fill in Amount</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <input type="text" readonly class="form-control" id="Coin" placeholder="00000" name="coin" aria-describedby="Coin">
                                                        <input type="text" hidden class="form-control" id="Address" placeholder="00000" name="address" aria-describedby="Address">

                                                    </div>
                                                    <div class="mb-3 ">
                                                        <div class="spinner-grow load   text-danger" role="status" style="display:none">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                        <label style="color:coral" for="Address" id="Equ">Equivalent In coin</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2 send">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary reset">Cancel</button>
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

    </div>
    <?php include "includes/script.php" ?>

    <script>
        $("#crypto_name").attr("disabled", "true")
        $(".div_qr").attr("style", "display:none")

        function check() {
            if ($("#Amount").val() === "") {
                $("#crypto_name").attr("disabled", "true")
                $(".div_qr").attr("style", "display:none")
                return true;
            }
        }

        function crypto_create() {

            var _formData2 = $("#formAccountSettings").serializeArray();
            covert($("#Amount").val(), $("#crypto_name").val(), $("#Coin"), $("#Equ"), $(".load"))
            var $_databaseObject = {
                url: "QR.php",
                method: "POST",
                dataType: "json",
                data: _formData2,
                cache: true,
                processData: true,
                success: function(data) {
                    $(".QR").attr("src", data.src)
                    $(".div_qr").attr("style", "display:block")
                    $("#Address").val(data.address)
                }
            }

            $.ajax($_databaseObject);
            //alert();
        }

        function covert(amt, cryp, coin, mess, load) {
            if (cryp == "") {
                mess.html("You have to Select a coin type first ")
                return
            }

            if (cryp == "ethereum") {
                cryp = "ETH"
            } else if (cryp == "bitcoin") {
                cryp = "BTC"
            }
            load.prop("style", "display:block")
            mess.html(`Loading...`)
            $.get(`https://min-api.cryptocompare.com/data/price?fsym=${cryp}&tsyms=USD`, function(data) {
                let BTC_amount = amt / data["USD"],
                    final_value = BTC_amount.toFixed(4)
                coin.val(final_value)
                mess.html(`Equivalent In ${cryp}`)
                load.prop("style", "display:none")
            });
        }

        $("#Amount").on("blur", (e) => {
            e.preventDefault();

            if (check()) {
                return
            } else {
                $("#crypto_name").removeAttr("disabled")
                covert($("#Amount").val(), $("#crypto_name").val(), $("#Coin"), $("#Equ"), $(".load"))
                if ($("#crypto_name").val() == "") {
                    return
                } else {
                    covert($("#Amount").val(), $("#crypto_name").val(), $("#Coin"), $("#Equ"), $(".load"))
                    crypto_create();
                }
            }
        })

        $("#crypto_name").on("change", (e) => {

            e.preventDefault();
            check()

            if (check()) {
                return
            } else {
                crypto_create()
            }

        });

        $(".send").click(function(e) {
            e.preventDefault();
            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/deposit.php",
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