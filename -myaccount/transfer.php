<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php include "includes/head.php" ?>
<style>
    .progress-outer {
        background: #fff;
        border-radius: 50px;
        padding: 25px;
        margin: 10px 0;
        box-shadow: 0 0 10px rgba(209, 219, 231, 0.7);
    }

    .progress {
        height: 27px;
        margin: 0;
        overflow: visible;
        border-radius: 50px;
        background: #eaedf3;
        box-shadow: inset 0 10px 10px rgba(244, 245, 250, 0.9);
        position: relative;
    }

    .progress .progress-bar {
        border-radius: 122px;
    }



    .progress .progress-value {
        position: absolute;
        right: 0px;
        top: 4px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        letter-spacing: 2px;
    }

    .progress-bar.active {
        animation: reverse progress-bar-stripes 0.40s linear infinite;
    }

    @-webkit-keyframes animate-positive {
        50% {
            background-color: yellow;
        }
    }

    @keyframes animate-positive {
        100% {
            background-color: red;
        }
    }

    .please .card-header {
        opacity: 9;
        animation: glow 2s linear infinite;
    }


    @-webkit-keyframes glow {
        50% {
            opacity: 4;
            color: #ff5722;
        }

        100% {
            opacity: 4;
            color: #696cff;
        }
    }

    @keyframes glow {
        50% {
            opacity: 4;
            color: #ff5722;
        }

        100% {
            opacity: 4;
            color: #696cff;
        }
    }

    .img-responsive.img {
        padding: 0 0 5% 0px;
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
                            <span class="text-muted fw-light">Transfer /</span> New Transfer
                        </h4>

                        <style>
                            .slide-cover {
                                position: relative;
                                top: 0;
                                left: 0;
                                height: inherit;
                                width: 100%;
                            }

                            .negative {
                                position: absolute;
                                top: 0;
                                left: 0;
                                height: 100%;
                                width: 100%;
                                transform: scale(1, 0);
                                transition: all 100ms ease;
                                transform-origin: top center;
                            }

                            .negative_hover {
                                position: relative;
                                transform: scale(1, 1);
                                transform-origin: top center;
                                transition: all 1000ms ease;
                            }
                        </style>

                        <div class="slide-cover">

                            <div class="row slide negative">
                                <div class="col-md-6 ">
                                    <div class="card mb-4 please">
                                        <h5 class="card-header pros">Processing.... </h5>
                                        <div class="card-body row">
                                            <div class="col-md-8 col-lg-8">
                                                <div class="progress-outer" style="margin-top: 1%;">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-info progress-bar-striped active" style=" box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>
                                                        <div class="progress-value"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="img-responsive img col-md-3 col-lg-3">
                                                <img src="../assets/img/gifs/gif2.gif" alt="avatar" style="width: 100%;border-radius: 10%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Transaction Process</h5>
                                        <div class="card-body">
                                            <form class="form" method="POST" id="formAccountCode" autocomplete="off">
                                                <div class="alert alert-danger" role="alert">
                                                </div>
                                                <div class="form-floating">
                                                    <input type="text" code="" name="Code" class="form-control Code" id="code_in" placeholder="Code" aria-describedby="code_in">
                                                    <label for="code_in">Enter Code</label>
                                                </div>
                                                <button type="button" style="display:none" class="btn btn-outline-primary code">
                                                    <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Check
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <form class="form" method="POST" id="formAccountSettings" autocomplete="on">
                            <div class="row down-section">

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Basic Details</h5>
                                        <div class="card-body">
                                            <div class="form-floating">
                                                <input type="number" name="Amount" class="form-control" id="Amount" placeholder="fill in the Amount" aria-describedby="Amount">
                                                <label for="Amount">Amount</label>
                                                <div id="Amount" class="form-text">fill in the Amount</div>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="Ben_Bank" name="Ben_Bank" placeholder="Receiver Bank Name" aria-describedby="Ben_Bank">
                                                <label for="floatingInput"> Bank Name</label>
                                                <div id="Ben_Bank" class="form-text">fill in Bank Name</div>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="Ben_Accno" name="Ben_Accno" placeholder="Receive Acc. Number" aria-describedby="Ben_Accno">
                                                <label for="floatingInput"> Acc. Number </label>
                                                <div id="Ben_Accno" class="form-text">fill in Bank Number</div>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="Ben_Accname" name="Ben_Accname" placeholder="Receiver Acc. Name<" aria-describedby="Ben_Accname">
                                                <label for="floatingInput"> Acc. Name</label>
                                                <div id="Ben_Accname" class="form-text">fill in Bank Number</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Exra Details</h5>
                                        <div class="card-body">
                                            <div class="form-floating">
                                                <textarea name="More_info" col="7" id="Transaction_Details" class="form-control" placeholder="Enter the required transaction details in here" aria-label="Enter the required transaction details in here" aria-describedby="basic-icon-default-message2" style="height: 275px;"></textarea>
                                                <label for="Transaction_Details">Narration</label>
                                                <div id="Transaction_Detail" class="form-text">fill in the Transaction Details</div>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary proceed">
                                                <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Submit
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
    <script type="text/javascript">
        function moveBar(val, elm) {
            var pbv = 0;

            // shift from the edge
            if (val > 100) {
                pbv = 0
            } else {
                pbv = 100 - val
            }

            // progress fill animator
            $(".progress-bar").animate({
                width: `${val}%`
            }, {
                duration: 1,
                easing: "linear",
            })

            //progress value animator
            $(".progress-value").animate({
                right: `${pbv+2}%`
            }, {
                duration: 200
            })
        }

        var inc = 0;
        var done = false;

        function progress(stop, data) {

            $('.progress-value').each(function() {

                var timer = setInterval(() => {
                    inc += 1;

                    // mover//
                    moveBar(inc, $(this));

                    if (inc >= 98) {
                        if (!done) {
                            oko();
                        }


                    }
                    console.log(data);
                    // counter animation
                    $(this).text(Math.ceil(inc) + "%")
                    if (inc == stop) {
                        if (!done) {
                            $('.alert').prop('style', 'display:block');
                            $('.alert').html(`${data} code Required`);
                            $(".code").prop('style', 'display:block');
                        }
                        clearInterval(timer)
                    }

                }, 200)

            });
        }


        function move(int, second, data) {
            setTimeout(() => {
                progress(int, data);
            }, second)
        }
    </script>

    <script>
        $(".proceed").click(function(e) {
            e.preventDefault();
            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();
            var $_databaseObject = {
                url: "admin_temps/admin/funcs/verify_account_fund_ex.php",
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
                        $('#code_in').attr('code', "COT");
                        $('.alert').html(`'COT' code Required`);
                        $(".slide").addClass("negative_hover");
                        $("#formAccountSettings").prop('style', 'display:none');
                        
                        progress(20, "COT");
                    } else {
                        $('.proceed').removeAttr('disabled');

                        error(self, data.error);
                    }
                }
            }
            $.ajax($_databaseObject);
            //alert();

        });
    </script>

    <script>
        $(".code").click(function(e) {
            e.preventDefault();
            const self = $(this);
            var val;
            off(self)
            

            var _formData = $("#formAccountCode").serializeArray();
            _formData.push({
                'name': "Code_Name",
                'value': $('#code_in').attr('code')
            })


            $(".code").prop('style', 'display:none');
            $('.alert').prop('style', 'display:none');

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/code.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: true,
                processData: true,

                error: function() {
                    $(".alert").prop('style', 'display:block');
                    $(".code").prop('style', 'display:block');
                    error(self)

                },
                success: function(data) {

                    if (data.output1 == true) {
                        if (data.next_ == true) {
                            move(100, 700, data.code_type)
                        } else {
                            if (data.code_type == "OTP") {
                                move(50, 700, data.code_type)
                                $('.code').removeAttr('disabled');
                            } else if (data.code_type == "OTA") {
                                move(70, 700, data.code_type)
                                $('.code').removeAttr('disabled');
                            }
                            $("#formAccountCode")[0].reset();
                            $('#code_in').attr('code', data.code_type);

                            success(self, "accepted");
                        }

                    } else {
                        $(".alert").prop('style', 'display:block');
                        $(".code").prop('style', 'display:block');
                        error(self, data.error);
                    }
                }
            }
            $.ajax($_databaseObject);
            //alert();

        });
    </script>

    <script>
        const oko = () => {
            done = true;
            var _formData = $("#formAccountSettings").serializeArray();
            // _formData.push({
            //     'name': "Card_Number",
            //     'value': "card_number"
            // });

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/fund_ext.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: true,
                processData: true,

                error: function() {
                    error(self);
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        setTimeout(() => {
                            window.location = "";
                        }, 3000);
                        success(self, "Transfer Successful");
                        $('.pros').html(`Transfer Completed`);
                    } else {
                        error(self, data.error);
                        // $('.loader').prop('style', "display:none");
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();
        }
    </script>
</body>

</html>