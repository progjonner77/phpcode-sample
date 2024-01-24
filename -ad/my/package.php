<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php");

?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&display=swap");

    @import url("https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap");

    * {
        padding: 0px;
        margin: 0px;
        list-style: none;
        border: none;
        text-decoration: none;
        box-sizing: border-box;
        -webkit-overflow-scrolling: touch;
        font-family: "IBM Plex Sans", sans-serif;
    }

    .row .card {
        width: 100%;
    }

    .container {
        align-items: center;
        justify-content: center;
    }

    .container ul {
        color: #fff;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-around;
        align-items: stretch;
        align-content: center;
    }

    .container ul li {
        padding: 1%;
        margin-top: 50px;
        height: 100%;
        display: flex;
        align-items: center;
        box-shadow: 0px 0px 0px 15px #95929b;
        border-radius: 15px;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .container ul li:hover {
        box-shadow: 0px 0px 0px 15px #7a3af4;
    }

    .container ul li .type {
        font-size: 20px;
        font-weight: 500;
        margin-top: 44px;
    }

    .container ul li .size {
        font-size: 60px;
        margin-top: 22px;
        font-family: "Merriweather", serif;
    }

    .container ul li .time {
        font-size: 20px;
        font-weight: 500;
        margin-top: 5px;
    }

    .container ul li .button {
        background-color: #7a3af4;
        color: #fff;
        width: 200px;
        height: 60px;
        border-radius: 10px;
        font-size: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .container ul li .line {
        height: 2px;
        width: 100%;
        background-color: #212c4d;
    }

    .container ul li .details-list {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
    }

    .container ul li .details-list span {
        box-shadow: none;
        display: flex;
        flex-direction: row;
        font-size: 20px;
        margin-bottom: 18px;
    }

    .container ul li .details-list span:last-child {
        margin-bottom: 0px;
    }

    .container ul li .details-list span svg {
        width: 24px;
        margin-right: 10px;
    }

    .action {
        cursor: pointer;
    }
</style>

<body class="header-fix fix-sidebar">

    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include("includes/header.php") ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include("includes/side.php") ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <?php include("includes/widget.php") ?>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12 row">

                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <ul>
                                        <?php
                                        $sql = "SELECT * FROM `pack` order by id ASC";
                                        $query = $conn->query($sql);

                                        while ($row = mysqli_fetch_assoc($query)) {
                                            ++$i;
                                            extract($row);

                                        ?>

                                            <li> <span class="type">Pack name</span>
                                                <form>
                                                    <input type="text" class="form-control" id="name<?php echo $id;?>" value="<?php echo $name ?>" name="username" placeholder="Enter a username..">

                                                    <span class="type">Price</span>
                                                    <input type="text" class="form-control" id="amount<?php echo $id;?>" value="<?php echo $amount ?>" name="username" placeholder="Enter a username..">
                                                    <br />
                                                    <span class="time"><?php echo $profit ?> Return, in <?php echo $days ?> Days</span>
                                                    <input type="text" class="form-control" id="profit<?php echo $id;?>" value="<?php echo $profit ?>" name="username" placeholder="Enter a username..">
                                                    <input type="text" class="form-control" id="days<?php echo $id;?>" value="<?php echo $days ?>" name="username" placeholder="Enter a username..">


                                                    <span class='button action' m=" <?php echo $id; ?>"> Update</span>
                                                </form>
                                                <span class="line"></span>
                                                <!-- <div class="details-list">
                                                <span>
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="#fff" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                                        </path>
                                                    </svg>100GB storage</span>
                                                <span>
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="#fff" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                                        </path>
                                                    </svg>Option to add members</span>
                                                <span>
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path fill="#fff" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                                                        </path>
                                                    </svg>Extra member benefits</span>
                                            </div> -->
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2022 bitdollartrade All Right Reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <?php include("includes/script.php") ?>

    <script>
        $(".action").click((e) => {
            e.preventDefault();
            var _formData = new FormData();

            _formData.append('name', $(`#name${$(e)[0].target.attributes.m.value.trim()}`).val());
            _formData.append('amount', $(`#amount${$(e)[0].target.attributes.m.value.trim()}`).val());
            _formData.append('profit', $(`#profit${$(e)[0].target.attributes.m.value.trim()}`).val());
            _formData.append('days', $(`#days${$(e)[0].target.attributes.m.value.trim()}`).val());
            _formData.append('id', $(e)[0].target.attributes.m.value);

            var $_databaseObject = {
                url: "includes/data/pack.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: false,
                processData: false,
                contentType: false,
                error: function() {
                    sweetAlert("Oops...", "Something went wrong !!", "error");
                    $('.action').prop('disabled', 'true');
                    // $('.loader').prop('style', "display:none");
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        sweetAlert("Success", "Done", "success");
                        setTimeout(() => {
                            window.location = "";
                        }, 3000);
                    } else {
                        sweetAlert("Oops...", data.error, "error");
                        $('.action').removeAttr('disabled');
                        // $('.pack').prop('style', "display:block");
                        // $('.loader').prop('style', "display:none");
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();
        });

        $(".pack").click((e) => {

            e.preventDefault();

            var my_pack = "<?php echo 1; ?>";

            if (!($(e)[0].target.attributes.id)) {
                return;
            }

            var _formData = new FormData();
            _formData.append('id', $(e)[0].target.attributes.id.value);

            var $_databaseObject = {
                url: "includes/data/pack.php",
                method: "POST",
                dataType: "json",
                data: _formData,
                cache: false,
                processData: false,
                contentType: false,
                error: function() {
                    sweetAlert("Oops...", "Something went wrong !!", "error");
                    $('.pack').prop('disabled', 'true');
                    // $('.loader').prop('style', "display:none");
                },
                success: function(data) {
                    // $('.loader').prop('style', "display:block");
                    if (data.output1 == 1) {
                        sweetAlert("Success", "Done", "success");
                        setTimeout(() => {
                            window.location = "";
                        }, 3000);
                    } else {
                        sweetAlert("Oops...", data.error, "error");
                        $('.pack').removeAttr('disabled');
                        // $('.pack').prop('style', "display:block");
                        // $('.loader').prop('style', "display:none");
                    }

                }
            }
            $.ajax($_databaseObject);
            //alert();

        });
    </script>

</body>



</html>