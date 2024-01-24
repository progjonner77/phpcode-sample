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

<link rel="stylesheet" href="../assets/css/atm.css" />
<style>
    .credit-card-box .front, .credit-card-box .back {
        background: linear-gradient(135deg, #000000, #322c2f);
    }
    .credit-card-box .number {
        position: absolute;
        margin: 0 auto;
        top: 103px;
        width: max-content;
        left: 19px;
        font-size: clamp(1.7rem, 1.9em, 6rem);
        word-break: break-all;
        font-family: serif !important;
    }
    .credit-card-box .card-holder div {
        font-size: clamp(0.5rem, .8em, 6rem);
    }
</style>

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
                            <span class="text-muted fw-light">Card /</span> My Card
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
                            <div class="col-md-6 col-lg-8">
                                <div class="card mb-4">
                                    <h5 class="card-header">My Card</h5>
                                    <div class="card-body">
                                        <div class="checkout">
                                            <div class="credit-card-box">
                                                <div class="flip">
                                                    <?php if ($Status_Card == "Active") {
                                                        $statement_pass = qField("card_request", "User_id", $_SESSION['Account_id']);
                                                        $i = '';
                                                        $count_name = mysqli_num_rows($statement_pass);
                                                        if ($count_name > 0) {
                                                            while ($row = mysqli_fetch_assoc($statement_pass)) {
                                                                $i++;

                                                                $card_holder_name = $row["Name_on_Card"];
                                                                $Card_Number = $row["Card_Number"];
                                                                $Card_Type = $row["Card_Type"];
                                                                $Card_Expiry = $row["Card_Expiry"];
                                                                $CVV = $row["CVV"];
                                                            }
                                                        }
                                                    } ?>
                                                    <div class="front">
                                                        <div class="chip"></div>
                                                        <div class="logo">
                                                            <?php if (@$Card_Type == "visa") { ?>
                                                                <img id="back-logo" src="../assets/img/card/<?php echo $Card_Type ?>.png" alt="Card logo">
                                                            <?php } elseif (@$Card_Type == "mastercard") { ?>
                                                                <img id="back-logo" src="../assets/img/card/<?php echo $Card_Type ?>.png" alt="Card logo">
                                                            <?php } else { ?>
                                                                <img id="back-logo" src="../assets/img/card/mastercard.png" alt="Card logo">
                                                            <?php } ?>
                                                        </div>
                                                        <div class="number"><?php echo @$Card_Number ?></div>
                                                        <div class="card-holder">
                                                            <label>Card holder</label>
                                                            <div><?php echo @$card_holder_name ?></div>
                                                        </div>
                                                        <div class="card-expiration-date">
                                                            <label>Expires</label>
                                                            <div><?php echo @$Card_Expiry ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="back">
                                                        <div class="strip"></div>
                                                        <div class="logo">
                                                            <?php if (@$Card_Type == "visa") { ?>
                                                                <img id="back-logo" src="../assets/img/card/<?php echo $Card_Type ?>.png" alt="Card logo">
                                                            <?php } elseif (@$Card_Type == "mastercard") { ?>
                                                                <img id="back-logo" src="../assets/img/card/<?php echo $Card_Type ?>.png" alt="Card logo">
                                                            <?php } else { ?>
                                                                <img id="back-logo" src="../assets/img/card/mastercard.png" alt="Card logo">
                                                            <?php } ?>

                                                        </div>
                                                        <div class="ccv">
                                                            <label>CCV</label>
                                                            <div><?php echo @$CVV ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($Status_Card == "Inactive") { ?>
                                                <form class="form" method="POST" id="formAccountSettings" class="row" autocomplete="off">

                                                    <div hidden>
                                                        <fieldset>
                                                            <label for="card-num">Card Number</label>
                                                            <input type="num" Card_Number="" id="card-num" class="input-cart-number master" visa="<?php echo rand(4100, 4999) ?>" master="<?php echo rand(5100, 5599) ?>" maxlength="4" />

                                                            <input type="num" id="card-number-1" class="input-cart-number" value="<?php echo rand(999, 9999) ?>" maxlength="4" />
                                                            <input type="num" id="card-number-2" class="input-cart-number" value="<?php echo rand(999, 9999) ?>" maxlength="4" />
                                                            <input type="num" id="card-number-3" class="input-cart-number" value="<?php echo rand(999, 9999) ?>" maxlength="4" />


                                                        </fieldset>
                                                        <fieldset>
                                                            <label for="card-holder">Card holder</label>
                                                            <input name="Name_on_Card" type="text" id="card-holder" value="<?php echo $Account_Name ?>" />
                                                        </fieldset>
                                                        <fieldset class="fieldset-expiration">
                                                            <label for="card-expiration-month">Expiration date</label>
                                                            <div class="select">
                                                                <?php
                                                                $month = rand(1, 12);
                                                                $year = (int)date("Y") + 3;
                                                                ?>
                                                                <select id="card-expiration-month">
                                                                    <option value="<?php echo $month  ?>"><?php echo  $month ?></option>
                                                                </select>
                                                            </div>
                                                            <div class="select">
                                                                <select id="card-expiration-year">
                                                                    <option value="<?php echo $year  ?>"><?php echo  $year ?></option>
                                                                </select>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="fieldset-ccv">
                                                            <label for="card-ccv">CCV</label>
                                                            <input type="text" id="card-ccv" name="CVV" maxlength="3" value="<?php echo rand(99, 999) ?>" />
                                                        </fieldset>
                                                    </div>
                                                    <fieldset>
                                                        <label for="card-type">Card Type</label>
                                                        <div class="select card-t col-md-2 col-lg-2">
                                                            <select name="Card_Type" id="card-type">
                                                                <option value="mastercard">Master</option>
                                                                <option value="visa">Visa</option>
                                                            </select>
                                                        </div>
                                                    </fieldset>
                                                    <button class="btn activate send"><i class="fa fa-lock "></i> Activate</button>
                                                <?php } else if ($Status_Card == "Active") { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        Your Card is Active;
                                                    </div>
                                                <?php } else if ($Status_Card == "Suspended") { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        This card has been deactivated
                                                    </div>
                                                <?php } ?>
                                                </form>

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
    <script lang="javascript">
        var card_number, Card_Expiry;

        $(".input-cart-number").on("keyup change", function() {
            $t = $(this);

            if ($t.val().length > 3) {
                $t.next().focus();
            }

            card_number = "";
            $(".input-cart-number").each(function() {
                card_number += $(this).val() + " ";
                if ($(this).val().length === 4) {
                    $(this).next().focus();
                }
            });

            $(".credit-card-box .number").html(card_number);
        });

        $("#card-holder").on("keyup change", function() {
            $t = $(this);
            $(".credit-card-box .card-holder div").html($t.val());
        });
        $("#card-type").on("change", function() {
            $t = $(this);
            $("#front-logo").attr("src", `../assets/img/card/${$t.val().toLowerCase()}.png`);
            $("#back-logo").attr("src", `../assets/img/card/${$t.val().toLowerCase()}.png`);

            process_number()

            // getCardNumber($("#card-type").val());
        });

        function process_number() {


            if ($("#card-type").val() == "visa") {

                $("#card-num").val($("#card-num").attr("visa"))
            } else if (($("#card-type").val() == "mastercard")) {

                $("#card-num").val($("#card-num").attr("master"))
            }

            card_number = "";
            $(".input-cart-number").each(function() {
                card_number += $(this).val() + " ";
                if ($(this).val().length === 4) {
                    $(this).next().focus();
                }
            });

            $(".credit-card-box .number").html(card_number);

        }

        $("#card-expiration-month, #card-expiration-year").change(function() {
            m = $("#card-expiration-month option").index(
                $("#card-expiration-month option:selected")
            );
            m = m < 10 ? "0" + m : m;
            y = $("#card-expiration-year").val().substr(2, 2);
            $(".card-expiration-date div").html(m + "/" + y);
            Card_Expiry = m + "/" + y
        });

        $("#card-ccv")
            .on("focus", function() {
                $(".credit-card-box").addClass("hover");
            })
            .on("blur", function() {
                $(".credit-card-box").removeClass("hover");
            })
            .on("keyup change", function() {
                $(".ccv div").html($(this).val());
            });


        /*--------------------
        CodePen Tile Preview
        --------------------*/
        setTimeout(function() {
            $("#card-ccv")
                .focus()
                .delay(1000)
                .queue(function() {
                    $(this).blur().dequeue();
                });
        }, 500);

        function getCreditCardType(accountNumber) {
            if (/^5[1-5]/.test(accountNumber)) {
                result = 'mastercard';
            } else if (/^4/.test(accountNumber)) {
                result = 'visa';
            } else if (/^(5018|5020|5038|6304|6759|676[1-3])/.test(accountNumber)) {
                result = 'maestro';
            } else {
                result = 'unknown'
            }
            return result;
        }

        $('#card-num').change(function() {
            console.log(getCreditCardType($(this).val()));
        })
        <?php if ($Status_Card == "Inactive") { ?>
            $(document).ready(() => {

                $(".ccv div").html($("#card-ccv").val());

                /////////
                m = $("#card-expiration-month option").val();
                m = m < 10 ? "0" + m : m;
                y = $("#card-expiration-year").val().substr(2, 2);
                $(".card-expiration-date div").html(m + "/" + y);
                Card_Expiry = m + "/" + y
                /////////
                $(".credit-card-box .card-holder div").html($("#card-holder").val());
                /////////
                process_number()

            });
        <?php } ?>
    </script>
    <script>
        $(".send").click(function(e) {
            e.preventDefault();

            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();
            _formData.push({
                'name': "Card_Number",
                'value': card_number
            });
            _formData.push({
                'name': "Card_Expiry",
                'value': Card_Expiry
            });

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/card_request.php",
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