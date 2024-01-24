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
                                            <label for="exampleDataList" class="form-label">Datalist
                                                example</label>
                                            <select class="form-control" list="datalistOptions" name="clients" id="clients">

                                                <option with="" value="..."> </option>
                                                <?php
                                                $result = qField_all("account", "id");
                                                if (!$result) {
                                                } else {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        
                                                     if($row["id"] == 0){
                                                      }else{
                                                          ?>
                                                        <option value="<?php echo $row["id"]; ?>"> <?php echo $row["Account_Name"]; ?></option>
                                                    <?php
                                                      }
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <img class="card-img-top profile" src="../assets/img/elements/7.jpg" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title client-name">Name</h5>
                                        <p class="card-text client-bal">
                                           Bal:
                                        </p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item client-email">Email:</li>
                                        <li class="list-group-item client-acc">Acc:</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="view_c.php" class="card-link">View Clients</a>
                                        <a href="view_f.php" class="card-link">View Statements</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-8">
                                <div class="card mb-4">
                                    <h5 class="card-header">Float label</h5>
                                    <div class="card-body">
                                        <form class="form" method="POST" id="formAccountSettings" autocomplete="off">

                                            <div class="col-md-12">
                                                <input type="text" hidden class="form-control" name="Account_Balance" id="Account_Balance" placeholder="Account Balance" aria-describedby="floatingInput_old">
                                                <label for="floatingInput">Amount</label>
                                                <input type="text" class="form-control" name="Amount" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInput_new">
                                            </div>

                                            <br />
                                            
                                            <div class="col-md-12">
                                                <label for="floatingInput">Transaction Date</label>
                                                <input type="date" class="form-control" name="Date" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInput_new">
                                            </div>
                                            
                                            <br />
                                            <div class="col-md-12">
                                                <div class="col mb-0">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Card Maintenance / Account funding or any other reason for you action...?</label>
                                                    <textarea class="form-control" name="Description" id="Description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <br />
                                            <input type="text" hidden name="id" id="id">

                                            <div class="col-md-12">
                                                <div class="col mb-0">
                                                    <label for="exampleFormControlTextarea1" class="form-label">More info</label>
                                                    <textarea class="form-control" name="More_Info" id="More_Info" rows="3"></textarea>
                                                </div>
                                                <br />
                                                <div class="col-md-12">
                                                    <div class="col mb-0">
                                                        <label for="emailBackdrop" class="form-label">Action Type</label>
                                                        <select name="Action_Type" id="Action_Type" class=" form-control form-select">
                                                            <option>Credit</option>
                                                            <option>Debit</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br />
                                                <button type="button" class="btn btn-outline-primary save">
                                                    <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Primary
                                                </button>
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
        $("#clients").change(function(e) {
            e.preventDefault();
            $(".trigger_e").click();

            var id = $(this).val();
            $.ajax({
                url: "admin_temps/admin/funcs/feed_Trans.php",
                method: "POST",
                data: {
                    id: id,
                    operation: "account",
                },
                dataType: "json",
                success: function(data) {
                     $('#Account_Balance').val(data.Account_Balance);
                    $('.profile').prop("src", `../-myaccount/includes/data/images/${data.Image_Name}`);
                    $('.client-name').html(`${data.Account_Name}`);
                    $('.client-bal').html(`Bal: ${data.Currency} ${data.Account_Balance}`);
                    $('.client-acc').html(`Acc No: ${data.Account_Number}`);
                    $('#id').val(data.id);
                    $('.client-email').html(`Email: ${data.Account_Email_Address}`);
                }

            });



        });
    </script>
    <script>
        $(".save").click(function(e) {
            e.preventDefault();
            const self = $(this);
            var val;
            off(self)

            var _formData = $("#formAccountSettings").serializeArray();
            _formData.push({
                'name': "operation",
                'value': "account"
            });

            var $_databaseObject = {
                url: "admin_temps/admin/funcs/cd_funct.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: true,
                processData: true,

                error: function() {
                    error(self);
                },

                success: function(data) {

                    if (data.output1 == 1) {
                        $('.btn-close').click();
                        $("#formAccountSettings")[0].reset();
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
        })
    </script>

</body>

</html>