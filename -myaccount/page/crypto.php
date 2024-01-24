<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php") ?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap");

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .card {
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.7);
        /* user-select: none; */
    }

    .profile-card {
        margin-left: auto;
    }

    .cover-photo {
        position: relative;
        background: url(https://i.imgur.com/jxyuizJ.jpeg);
        background-size: cover;
        height: 180px;
        border-radius: 5px 5px 0 0;
    }

    .profile {
        position: absolute;
        width: 120px;
        bottom: -60px;
        left: 30px;
        border-radius: 50%;
        border: 2px solid #222;
        background: #222;
        padding: 5px;
    }

    .profile-name {
        font-size: 20px;
        margin: 25px 0 0 120px;
        color: #fff;
    }

    .about {
        margin-top: 30px;
        line-height: 1.6;
    }

    .btn {
        margin: 30px 15px;
        background: #7ce3ff;
        padding: 10px 25px;
        border-radius: 3px;
        border: 1px solid #7ce3ff;
        font-weight: bold;
        font-family: Montserrat;
        cursor: pointer;
        color: #222;
        transition: 0.2s;
    }

    .btn:last-of-type {
        background: transparent;
        border-color: #7ce3ff;
        color: #7ce3ff;
    }

    .btn:hover {
        background: #7ce3ff;
        color: #222;
    }

    .icons {
        width: 180px;
        margin: 0 auto 10px;
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }

    .icons i {
        cursor: pointer;
        padding: 5px;
        font-size: 18px;
        transition: 0.2s;
    }

    .icons i:hover {
        color: #7ce3ff;
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
            <br/>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <?php include("includes/widget.php") ?>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12 row">
                        <div class="col-md-12 col-lg-6" style="margin-top:4%">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                               
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                                    {
                                        "interval": "1m",
                                        "width": "100%",
                                        "isTransparent": false,
                                        "height": 450,
                                        "symbol": "NASDAQ:AAPL",
                                        "showIntervalTabs": true,
                                        "locale": "en",
                                        "colorTheme": "dark"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        <div class="col-md-12 col-lg-6" style="margin-top:4%">

                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                 
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                                    {
                                        "colorTheme": "dark",
                                        "isTransparent": false,
                                        "width": "100%",
                                        "height": "100%",
                                        "locale": "en",
                                        "importanceFilter": "-1,0,1",
                                        "currencyFilter": "USD,EUR,ITL,NZD,CHF,AUD,FRF,JPY,ZAR,TRL,CAD,DEM,MXN,ESP,GBP"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->

                        </div>
                    </div>
                <br/>
                    <div class="col-12" style="height: 544px; margin-top:4%">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div id="tradingview_cbdfe"></div>
                             
                            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                            <script type="text/javascript">
                                new TradingView.widget({
                                    "autosize": true,
                                    "height": "100%",
                                    "symbol": "COINBASE:BTCUSD",
                                    "interval": "D",
                                    "timezone": "Etc/UTC",
                                    "theme": "dark",
                                    "style": "1",
                                    "locale": "en",
                                    "toolbar_bg": "#f1f3f6",
                                    "enable_publishing": false,
                                    "allow_symbol_change": true,
                                    "container_id": "tradingview_cbdfe"
                                });
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>

                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 CoinBlade All Right Reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

    <?php include("includes/script.php") ?>
</body>


<!--         dark/layout-blank.html     2019 02:23:14 GMT -->

</html>