<!DOCTYPE html>

<?php include "includes/head.php";


$result = qFields($con, "account", "*", ['id' => $_SESSION['Account_id']]);
$i = 0;
if (!$result) {
} else {
    while ($row_pro = mysqli_fetch_assoc($result)) {
        ++$i;
        extract($row_pro);
        // echo $User_id;
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

                        <div class="row">
                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Congratulations
                                                    <?php echo $Account_Name ?>! 🎉</h5>
                                                <p class="mb-4">You have done <span class="fw-bold"><?php echo rand(70,100)."%"?></span>
                                                    more sales today. Check your the clients details.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 order-1">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start
                            justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                            <a class="dropdown-item" href="view_c.php">View
                                                                More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Total Customer</span>
                                                <h3 class="card-title mb-2"><?php echo ((int)getAllField_count('account') - 1) ?></h3>
                                                <small class="text-success fw-semibold"><i class='bx
                              bx-up-arrow-alt'></i> Clients</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start
                            justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                            <a class="dropdown-item" href="view_c.php">View
                                                                More</a>
                                                        </div>
                                                    </div>
                                                </div>Active Clients </span>
                                                <h3 class="card-title text-nowrap mb-1"><?php echo (getField_count('account', 'Status', "Active")) ?></h3>
                                                <small class="text-danger fw-semibold"><i class='bx bx-up-arrow-alt'></i><?php echo (((int)getAllField_count('account') - 1) - getField_count('account', 'Status', "Active") - 1) . " Inactive" ?> </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Revenue -->
                            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">

                                <div class="col-md">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <?php
                                                if ($Image_Name != NULL && $Image_Name != "") {
                                                ?>
                                                    <img id="blah" alt="user-avatar" class="card-img card-img-left" id="uploadedAvatar" src="includes/data/images/<?php echo $Image_Name ?>">

                                                <?php
                                                } else {
                                                ?>
                                                    <img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image">
                                                <?php

                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">
                                                        Welcome to your dashboard Sir <b><?php echo $Account_Name?></b>, all is in good shape boss. This site was built with love. Refer me to you guys sir. 
                                                    </p>
                                                    <div class="card-body">
                                                        <a href="profile.php" class="card-link">Profile</a>
                                                        <a href="password.php" class="card-link">Settings</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/ Total Revenue -->
                            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                                <div class="row">
                                   <!--/   <div class="col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start
                            justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded">
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                            <a class="dropdown-item" href="statement_c.php">View
                                                                More</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="d-block mb-1">Total Deposits </span>
                                                <h3 class="card-title text-nowrap mb-2"><?php echo ((int)getAllField_count('deposit')) ?></h3>
                                                <small class="text-primary fw-semibold"><i class='bx
                              bx-down-arrow-alt'></i> <?php //echo (getField_count('deposit', 'Status', "Active")) . " Approved" ?></small>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-12 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start
                            justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded">
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                            <a class="dropdown-item" href="statement_t.php">View
                                                                More</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="fw-semibold d-block mb-1">Transactions</span>
                                                <h3 class="card-title mb-2"><?php echo ((int)getAllField_count('statement')) ?></h3>
                                                <small class="text-success fw-semibold"><i class='bx
                              bx-up-arrow-alt'></i> <?php echo (getField_count('statement', 'Type', "tr")) . " Transfers" ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div>
           <div class="row"> -->

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Order Statistics -->
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                        <div class="card-title mb-0">
                                            <h5 class="m-0 me-2">Transactions Statistics</h5>
                                            <small class="text-muted"><?php echo ((int)getAllField_count('statement')) ?> Total </small>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                                <a class="dropdown-item" href="statement_t.php">View
                                                    All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <h2 class="mb-2"><?php echo ((int)getAllField_count('statement')) ?></h2>
                                                <span>Total Transaction</span>
                                            </div>
                                            <div id="orderStatisticsChart"></div>
                                        </div>
                                        <ul class="p-0 m-0">
                                             <!--/ <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-download'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Deposits</h6>
                                                        <small class="text-muted">All deposits done</small>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo ((int)getAllField_count('deposit')) ?></small>
                                                    </div>
                                                </div>
                                            </li>-->
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded
                              bg-label-success"><i class='bx bx-transfer'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Transfers</h6>
                                                        <small class="text-muted">All Transfers trans done</small>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo (getField_count('statement', 'Type', "tr")) ?></small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-info"><i class='bx bx-mobile-alt'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Debits</h6>
                                                        <small class="text-muted">All Debits trans done</small>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo (getField_count('statement', 'Type', "dp")) ?></small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded
                              bg-label-secondary"><i class='bx bx-money-withdraw'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Credits</h6>
                                                        <small class="text-muted">All Credits trans done</small>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo (getField_count('statement', 'Type', "cr")) ?></small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Order Statistics -->

                            <!-- Transactions -->
                            <div class="col-md-6 col-lg-8 order-2 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center
                      justify-content-between">
                                        <h5 class="card-title m-0 me-2">Transactions</h5>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                                <a class="dropdown-item" href="statement_t.php">All Transaction</a>
                                                <a class="dropdown-item" href="loan.php">Loans</a>
                                                <a class="dropdown-item" href="withdrawal.php">Withdrawals</a>
                                                 <!--<a class="dropdown-item" href="deposit.php">Deposits</a>
                                               <a class="dropdown-item" href="statement_c.php">Cards</a>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Payment</small>
                                                        <h6 class="mb-0">All Transfers</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center
                              gap-1">
                                                        <h6 class="mb-0"><?php echo ( getField_count('statement', 'Type', "tr"))?></h6><span class="text-muted"> Trans</span> 
                                                    </div>
                                                </div>
                                            </li>
                                            <!--<li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Active Cards</small>
                                                        <h6 class="mb-0">All Active Cards</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center
                              gap-1">
                                                        <h6 class="mb-0"><?php echo ( getField_count('account', 'Status_Card', "Active"))?></h6> <span class="text-muted"> Cards</span>
                                                    </div>
                                                </div>
                                            </li>-->
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded">
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Account</small>
                                                        <h6 class="mb-0">Active Account</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center
                              gap-1">
                                                        <h6 class="mb-0"><?php echo ( getField_count('account', 'Status', "Active"))?></h6> <span class="text-muted">Clients</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded">
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">Deactivated Account</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center
                              gap-1">
                                                        <h6 class="mb-0"><?php echo (getField_count('account', 'Status', "Deactivated")) ?></h6> <span class="text-muted">Clients</span>
                                                    </div>
                                                </div>
                                            </li>
                                             <!--/ <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded">
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Deposits</small>
                                                        <h6 class="mb-0">Confirmed Deposit</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center
                              gap-1">
                                                        <h6 class="mb-0"><?php echo (getField_count('deposit', 'status', "Confirmed"))?></h6> <span class="text-muted">Deposits</span>
                                                    </div>
                                                </div>
                                            </li>-->
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Withdrawal</small>
                                                        <h6 class="mb-0">All Withdrawals</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center
                              gap-1">
                                                        <h6 class="mb-0"><?php echo (getField_count('withdrawal', 'Status', "Active"))?></h6> <span class="text-muted">Active</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded">
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center
                            justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Suspended</small>
                                                        <h6 class="mb-0">All Suspended Withdrawals</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center
                              gap-1">
                                                        <h6 class="mb-0"><?php echo (getField_count('withdrawal', 'Status', "Suspended"))?></h6> <span class="text-muted">Suspended</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Transactions -->
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
    <!-- / Layout wrapper -->

    <?php include "includes/script.php" ?>
    <!-- Page JS -->

    <script>
        !(function() {
            var o = config.colors.white,
                t = config.colors.headingColor,
                e = config.colors.axisColor,
                r = config.colors.borderColor,
                i = document.querySelector("#totalRevenueChart"),
                s = {
                    series: [{
                            name: "2021",
                            data: [18, 7, 15, 29, 18, 12, 9]
                        },
                        {
                            name: "2020",
                            data: [-13, -18, -9, -14, -5, -17, -15]
                        },
                    ],
                    chart: {
                        height: 300,
                        stacked: !0,
                        type: "bar",
                        toolbar: {
                            show: !1
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: "33%",
                            borderRadius: 12,
                            startingShape: "rounded",
                            endingShape: "rounded",
                        },
                    },
                    colors: [config.colors.primary, config.colors.info],
                    dataLabels: {
                        enabled: !1
                    },
                    stroke: {
                        curve: "smooth",
                        width: 6,
                        lineCap: "round",
                        colors: [o]
                    },
                    legend: {
                        show: !0,
                        horizontalAlign: "left",
                        position: "top",
                        markers: {
                            height: 8,
                            width: 8,
                            radius: 12,
                            offsetX: -3
                        },
                        labels: {
                            colors: e
                        },
                        itemMargin: {
                            horizontal: 10
                        },
                    },
                    grid: {
                        borderColor: r,
                        padding: {
                            top: 0,
                            bottom: -8,
                            left: 20,
                            right: 20
                        },
                    },
                    xaxis: {
                        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                        labels: {
                            style: {
                                fontSize: "13px",
                                colors: e
                            }
                        },
                        axisTicks: {
                            show: !1
                        },
                        axisBorder: {
                            show: !1
                        },
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: "13px",
                                colors: e
                            }
                        }
                    },
                    responsive: [{
                            breakpoint: 1700,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "32%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 1580,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "35%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 1440,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "42%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 1300,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "48%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 1200,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "40%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 1040,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 11,
                                        columnWidth: "48%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 991,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "30%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 840,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "35%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 768,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "28%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 640,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "32%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 576,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "37%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 480,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "45%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 420,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "52%"
                                    }
                                },
                            },
                        },
                        {
                            breakpoint: 380,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "60%"
                                    }
                                },
                            },
                        },
                    ],
                    states: {
                        hover: {
                            filter: {
                                type: "none"
                            }
                        },
                        active: {
                            filter: {
                                type: "none"
                            }
                        },
                    },
                };
            if (null !== i) {
                const a = new ApexCharts(i, s);
                a.render();
            }
            (i = document.querySelector("#growthChart")),
            (s = {
                series: [78],
                labels: ["Growth"],
                chart: {
                    height: 240,
                    type: "radialBar"
                },
                plotOptions: {
                    radialBar: {
                        size: 150,
                        offsetY: 10,
                        startAngle: -150,
                        endAngle: 150,
                        hollow: {
                            size: "55%"
                        },
                        track: {
                            background: o,
                            strokeWidth: "100%"
                        },
                        dataLabels: {
                            name: {
                                offsetY: 15,
                                color: t,
                                fontSize: "15px",
                                fontWeight: "600",
                                fontFamily: "Public Sans",
                            },
                            value: {
                                offsetY: -25,
                                color: t,
                                fontSize: "22px",
                                fontWeight: "500",
                                fontFamily: "Public Sans",
                            },
                        },
                    },
                },
                colors: [config.colors.primary],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        shadeIntensity: 0.5,
                        gradientToColors: [config.colors.primary],
                        inverseColors: !0,
                        opacityFrom: 1,
                        opacityTo: 0.6,
                        stops: [30, 70, 100],
                    },
                },
                stroke: {
                    dashArray: 5
                },
                grid: {
                    padding: {
                        top: -35,
                        bottom: -10
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    },
                    active: {
                        filter: {
                            type: "none"
                        }
                    },
                },
            });
            if (null !== i) {
                const n = new ApexCharts(i, s);
                n.render();
            }
            (i = document.querySelector("#profileReportChart")),
            (s = {
                chart: {
                    height: 80,
                    type: "line",
                    toolbar: {
                        show: !1
                    },
                    dropShadow: {
                        enabled: !0,
                        top: 10,
                        left: 5,
                        blur: 3,
                        color: config.colors.warning,
                        opacity: 0.15,
                    },
                    sparkline: {
                        enabled: !0
                    },
                },
                grid: {
                    show: !1,
                    padding: {
                        right: 8
                    }
                },
                colors: [config.colors.warning],
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    width: 5,
                    curve: "smooth"
                },
                series: [{
                    data: [110, 270, 145, 245, 205, 285]
                }],
                xaxis: {
                    show: !1,
                    lines: {
                        show: !1
                    },
                    labels: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    },
                },
                yaxis: {
                    show: !1
                },
            });
            if (null !== i) {
                const l = new ApexCharts(i, s);
                l.render();
            }
            (i = document.querySelector("#orderStatisticsChart")),
            (s = {
                chart: {
                    height: 165,
                    width: 130,
                    type: "donut"
                },
                labels: ["Transfers", "Debits", "Credits"/*, "deposit"*/],
                series: [<?php echo (getField_count('statement', 'Type', "tr")) ?>, <?php echo (getField_count('statement', 'Type', "dp")) ?>, <?php echo (getField_count('statement', 'Type', "cr"))?>/*, <?php  echo ((int)getAllField_count('deposit')) ?>*/ ],
                colors: [
                    config.colors.primary,
                    config.colors.secondary,
                    config.colors.info,
                    config.colors.success,
                ],
                stroke: {
                    width: 5,
                    colors: o
                },
                dataLabels: {
                    enabled: !1,
                    formatter: function(o, t) {
                        return parseInt(o) + "";
                    },
                },
                legend: {
                    show: !1
                },
                grid: {
                    padding: {
                        top: 0,
                        bottom: 0,
                        right: 15
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "75%",
                            labels: {
                                show: !0,
                                value: {
                                    fontSize: "1.5rem",
                                    fontFamily: "Public Sans",
                                    color: t,
                                    offsetY: -15,
                                    formatter: function(o) {
                                        return parseInt(o) + "";
                                    },
                                },
                                name: {
                                    offsetY: 20,
                                    fontFamily: "Public Sans"
                                },
                                total: {
                                    show: !0,
                                    fontSize: "0.8125rem",
                                    color: e,
                                    label: "Total Trans",
                                    formatter: function(o) {
                                        return "38%";
                                    },
                                },
                            },
                        },
                    },
                },
            });
            if (null !== i) {
                const d = new ApexCharts(i, s);
                d.render();
            }
            (o = document.querySelector("#incomeChart")),
            (t = {
                series: [{
                    data: [24, 21, 30, 22, 42, 26, 35, 29]
                }],
                chart: {
                    height: 215,
                    parentHeightOffset: 0,
                    parentWidthOffset: 0,
                    toolbar: {
                        show: !1
                    },
                    type: "area",
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    width: 2,
                    curve: "smooth"
                },
                legend: {
                    show: !1
                },
                markers: {
                    size: 6,
                    colors: "transparent",
                    strokeColors: "transparent",
                    strokeWidth: 4,
                    discrete: [{
                        fillColor: config.colors.white,
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        strokeColor: config.colors.primary,
                        strokeWidth: 2,
                        size: 6,
                        radius: 8,
                    }, ],
                    hover: {
                        size: 7
                    },
                },
                colors: [config.colors.primary],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: void 0,
                        shadeIntensity: 0.6,
                        opacityFrom: 0.5,
                        opacityTo: 0.25,
                        stops: [0, 95, 100],
                    },
                },
                grid: {
                    borderColor: r,
                    strokeDashArray: 3,
                    padding: {
                        top: -20,
                        bottom: -8,
                        left: -10,
                        right: 8
                    },
                },
                xaxis: {
                    categories: ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    },
                    labels: {
                        show: !0,
                        style: {
                            fontSize: "13px",
                            colors: e
                        }
                    },
                },
                yaxis: {
                    labels: {
                        show: !1
                    },
                    min: 10,
                    max: 50,
                    tickAmount: 4
                },
            });
            if (null !== o) {
                const p = new ApexCharts(o, t);
                p.render();
            }
            (i = document.querySelector("#expensesOfWeek")),
            (s = {
                series: [65],
                chart: {
                    width: 60,
                    height: 60,
                    type: "radialBar"
                },
                plotOptions: {
                    radialBar: {
                        startAngle: 0,
                        endAngle: 360,
                        strokeWidth: "8",
                        hollow: {
                            margin: 2,
                            size: "45%"
                        },
                        track: {
                            strokeWidth: "50%",
                            background: r
                        },
                        dataLabels: {
                            show: !0,
                            name: {
                                show: !1
                            },
                            value: {
                                formatter: function(o) {
                                    return "$" + parseInt(o);
                                },
                                offsetY: 5,
                                color: "#697a8d",
                                fontSize: "13px",
                                show: !0,
                            },
                        },
                    },
                },
                fill: {
                    type: "solid",
                    colors: config.colors.primary
                },
                stroke: {
                    lineCap: "round"
                },
                grid: {
                    padding: {
                        top: -10,
                        bottom: -15,
                        left: -10,
                        right: -10
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: "none"
                        }
                    },
                    active: {
                        filter: {
                            type: "none"
                        }
                    },
                },
            });
            if (null !== i) {
                const c = new ApexCharts(i, s);
                c.render();
            }
        })();
    </script>

</body>

</html>