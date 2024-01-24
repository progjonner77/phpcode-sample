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
                                <div class="card mb-4">
                                    <h5 class="card-header">Form Controls</h5>
                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label for="exampleDataList" class="form-label">Select Client</label>
                                            <input class="form-control" list="datalistOptions" name="customer" id="customer" placeholder="Type to search...">
                                            <datalist id="datalistOptions">

                                                <option value="...">
                                                    <?php
                                                    $result = qField_all("account", "id");
                                                    if (!$result) {
                                                    } else {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                          if($row["id"] == 0){
                                                              }else{
                                                                  ?>
                                                                <option value="<?php echo $row["Account_Name"]; ?>">
                                                                <?php
                                                              }
                                                        }
                                                ?>
                                                </option><?php
                                                        }
                                                            ?>
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleDataList" class="form-label">Select Code</label>
                                            <input class="form-control" list="Codetype" id="Code_Type" placeholder="Type to search...">
                                            <datalist id="Codetype">
                                                <option value="COT">COT</option>
                                                <option value="OTP">OTP</option>
                                                <option value="OTA">OTA</option>
                                                <option value="TOKEN">TOKEN</option>
                                            </datalist>
                                        </div>
                                        <div class="modal-footer  commit">
                                            <button type="button" name="COT_send" class="btn btn-primary save">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Copy
                                            Code</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="exampleInputEmail2" class="col-form-label codes" style="background-color: #24446e;border-radius: 10%;padding: 11%;color: #efeeed;"></label>
                                        </div>
                                        <br/>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" name="generate" class="btn btn-primary mr-2 generate">Generate Code</button>
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
    <script>
        //fetch chat history all
        $(document).ready(function(e) {
            e.preventDefault;
            //alert();
            $(".commit").prop("hidden", true);
        });

        $(".generate").click(function(e) {

            e.preventDefault();
            var codeType = $("#Code_Type").val();
            if (codeType === "..." || codeType === "") {
                alert("select a code type")
                $("#Code_Type").focus();
                return;
            }
            if ($("#customer").val() == "...") {
                alert("Fill in all the fields")
                return;
            } else {
                $(".codes").html(
                    "<div class='img img-responsive' id=loading><pr>Cooking it....</pr><img style='max-width: 100%;' src='../assets/img/gifs/200w.webp' alt='loading' /></div>"
                );

                var loader = setInterval(function() {
                    var codeType = $("#Code_Type").val();
                    console.log(codeType);
                    var generate = $(".generate").prop("name");
                    $(".codes").prop("codes", " ");

                    var customer = $("#customer").val();

                    var _formData = {
                        customer: customer,
                        codeType: codeType,
                        process: generate
                    }

                    var $_databaseObject = {
                        url: "admin_temps/admin/funcs/codes.php",
                        type: "POST",
                        dataType: "json",
                        data: _formData,
                        success: function(data) {
                            //var_dump(data);
                            //alert(data);
                            if (data.output1 != 0) {
                                $(".codes").html(data.output1);
                                $(".codes").prop("codes", data.output1);
                                $(".commit").prop("hidden", false);
                                $("#customer").attr("Disabled", true);

                            }
                            clearInterval(loader); // stops the timer interal
                        }
                    }
                    $.ajax($_databaseObject);
                }, 2000);
            }



        });


    </script>

    <script>
        //fetch chat history all

        $(".save").click(function(e) {
            e.preventDefault();
            var codeType = $("#Code_Type").val();
            if (codeType === "...") {
                alert("select a code type")
                $("#Code_Type").focus();
                return;
            }
            if ($("#customer").val() == "...") {
                alert("Fill in all the fields")
                return
            } else {
                $(".codes").html(
                    "<div class='img img-responsive' id=loading><pr>Saving it....</pr><img style='max-width: 100%;' src='../assets/img/gifs/200w.webp"
                );
                var loader = setInterval(function() {


                    var process = $(".save").prop("name");
                    var customer = $("#customer").val();
                    var Code = $(".codes").prop("codes");
                    var _formData = {
                        customer: customer,
                        codeType: codeType,
                        process: process,
                        Code: Code
                    }

                    var $_databaseObject = {
                        url: "admin_temps/admin/funcs/codes.php",
                        type: "POST",
                        dataType: "json",
                        data: _formData,
                        success: function(data) {
                            //var_dump(data);
                            //alert(data);
                            if (data.output1 == true) {
                                $(".codes").html("Successfully Saved");
                                $(".commit").prop("hidden", true);
                                $("#customer").removeAttr("Disabled");
                            } else {

                                $(".codes").html("Code saved");
                                $(".commit").prop("hidden", true);
                                $("#customer").removeAttr("Disabled");
                            }
                            clearInterval(loader); // stops the timer interal
                        }

                    }
                    $.ajax($_databaseObject);
                }, 2000);
            }
        });
    </script>
</body>

</html>