<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
    include "includes/header.php";
    ?>
    <style>
        /* 2 - General Styles
---------------------------------------------------------------------- */
        .xpt-container {
            text-align: center;
        }

        .xpt-center {
            text-align: center;
        }


        .xpt *,
        .xpt *:after,
        .xpt *:before {
            -webkit-transition: all .25s linear;
            -moz-transition: all .25s linear;
            -ms-transition: all .25s linear;
            -o-transition: all .25s linear;
            transition: all .25s linear;
        }

        /* 2 - General Styles End
---------------------------------------------------------------------- */



        /* 3 - Hexagon Styles
---------------------------------------------------------------------- */
        .xpt-hex {
            font-family: 'Lato', sans-serif;
            position: relative;
            z-index: 0;
            color: #fff;
            display: inline-block;
            margin: 80px 5px 75px 5px;
        }

        .xpt-hex:after {
            content: "";
            position: absolute;
            -webkit-transform: rotate(60deg);
            -moz-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            -o-transform: rotate(60deg);
            transform: rotate(60deg);
        }

        .xpt-hex:before {
            content: "";
            position: absolute;
            -webkit-transform: rotate(-60deg);
            -moz-transform: rotate(-60deg);
            -ms-transform: rotate(-60deg);
            -o-transform: rotate(-60deg);
            transform: rotate(-60deg);
        }

        .xpt-hex,
        .xpt-hex:after,
        .xpt-hex:before {
            width: 250px;
            height: 143px;
            background: #fff;
            text-align: justify;
        }


        /* 3.1 - Inner Hexagon
--------------------------------------*/
        .xpt-ihex {
            position: absolute;
            z-index: 1;
            left: 12px;
            right: 12px;
            top: 6px;
            bottom: 6px;
        }

        .xpt-ihex:after {
            content: "";
            position: absolute;
            -webkit-transform: rotate(60deg);
            -moz-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            -o-transform: rotate(60deg);
            transform: rotate(60deg);
        }

        .xpt-ihex:before {
            content: "";
            position: absolute;
            -webkit-transform: rotate(-60deg);
            -moz-transform: rotate(-60deg);
            -ms-transform: rotate(-60deg);
            -o-transform: rotate(-60deg);
            transform: rotate(-60deg);
        }

        .xpt-ihex,
        .xpt-ihex:after,
        .xpt-ihex:before {
            background: #adcf24;
        }

        .xpt-ihex:after,
        .xpt-ihex:before {
            width: 100%;
            height: 100%;
        }

        .xpt-box-inr {
            z-index: 2;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
        }

        /* 3.1 - Inner Hexagon End
--------------------------------------*/



        /* 3.2 - Price Component
--------------------------------------*/
        .xpt-box-1 {
            font-weight: 300;
        }

        .xpt-title {
            font-size: 24px !important;
            font-family: 'Lato', sans-serif;
            margin: 0;
            padding: 0;
            font-weight: 300 !important;
            text-transform: uppercase;
            margin-top: -15px !important;
        }

        .xpt-price-box {
            font-weight: 300 !important;
            display: inline-block;
            position: relative;
        }

        .xpt-price {
            font-size: 90px;
            line-height: 60px;
        }

        .xpt-price span {
            position: absolute;
            left: 100%;
            font-size: 40px;
            top: -14px;
        }

        .xpt-currency {
            position: absolute;
            left: -20px;
            top: -8px;
            font-size: 40px;
        }

        .xpt-duration {
            position: absolute;
            font-size: 20px;
            bottom: -30px;
            left: 0;
            right: 0;
        }

        .xpt-box-2 {
            position: absolute;
            left: 0;
            right: 0;
            top: 50px;
            opacity: 0;
            padding: 0 45px;
            margin-top: -10px;
        }

        .xpt-fleft {
            text-align: left;
        }

        .xpt-fcenter {
            text-align: center;
        }

        .xpt-fright {
            text-align: right;
        }

        .xpt-body,
        .xpt-body li {
            list-style: none;
            margin: 0 !important;
            padding: 0;
        }

        .xpt-body li {
            line-height: 19px;
            font-size: 12px;
            padding: 4px 0;
            position: relative;
        }


        /* Tool-tip */
        .xpt-body li span {
            display: inline-block;
            cursor: help;
            border-bottom: dotted 2px #fff;
        }

        .xpt-body li span:before {
            content: "";
            position: absolute;
            top: -15px;
            width: 12px;
            height: 12px;
            left: 50%;
            margin-left: -6px;
        }

        .xpt-body li span i {
            margin: 0;
            margin-bottom: 15px;
            position: absolute;
            bottom: 100%;
            display: inline-block;
            padding: 0 5px;
            border-radius: 3px;
            text-align: center;
            background: #adcf24;
            left: 0px;
            right: 0px;
        }

        .xpt-body li span:before,
        .xpt-body li span i {
            width: 0;
            height: 0;
            display: inline-block;
            overflow: hidden;
            border: 0;
        }

        .xpt-body li span:hover:before,
        .xpt-body li span:hover i {
            opacity: 1;
            width: auto;
            height: auto;
            overflow: visible;
        }

        .xpt-body li span:hover:before {
            top: 0;
            border-width: 6px;
            border-style: solid;
            border-color: #fff transparent transparent transparent;
        }

        .xpt-body li span:hover i {
            margin-bottom: 0;
            padding: 4px;
            border: 2px solid #fff;
        }


        /* Button */

        .xpt-btn {
            font-size: 13px;
            display: inline-block;
            color: #fff !important;
            padding-top: 25px;
            text-decoration: none;
            box-shadow: none !important;
            text-transform: uppercase;
        }

        .xpt-body li i,
        .xpt-btn i {
            margin-right: 15px;
        }


        /* 3.2 - Price Component End
--------------------------------------*/


        /* 3.3 - Hover Effects
--------------------------------------*/
        .xpt-hex:hover .xpt-box-1 {
            opacity: 0;
        }

        .xpt-hex:hover .xpt-box-2 {
            opacity: 1;
            top: 0;
        }

        .xpt-hex.xpt-cw:hover,
        .xpt-hex.xpt-acw:hover .xpt-ihex {
            -webkit-transform: rotate(60deg);
            -moz-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            -o-transform: rotate(60deg);
            transform: rotate(60deg);
        }

        .xpt-hex.xpt-cw:hover .xpt-ihex,
        .xpt-hex.xpt-acw:hover {
            -webkit-transform: rotate(-60deg);
            -moz-transform: rotate(-60deg);
            -ms-transform: rotate(-60deg);
            -o-transform: rotate(-60deg);
            transform: rotate(-60deg);
        }

        .xpt-hex.xpt-zoom:hover .xpt-ihex {
            -webkit-transform: scale(1.105, 1.105);
            -moz-transform: scale(1.105, 1.105);
            -ms-transform: scale(1.105, 1.105);
            -o-transform: scale(1.105, 1.105);
            transform: scale(1.105, 1.105);
        }


        .xpt-hex.xpt-zoom-out .xpt-ihex {
            -webkit-transform: scale(1.105, 1.105);
            -moz-transform: scale(1.105, 1.105);
            -ms-transform: scale(1.105, 1.105);
            -o-transform: scale(1.105, 1.105);
            transform: scale(1.105, 1.105);
        }

        .xpt-hex.xpt-zoom-out:hover .xpt-ihex {
            -webkit-transform: scale(1, 1);
            -moz-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            -o-transform: scale(1, 1);
            transform: scale(1, 1);
        }


        .xpt-hex.xpt-inr-cw:hover .xpt-ihex .xpt-box-inr,
        .xpt-hex.xpt-inr-acw:hover .xpt-ihex,
        .xpt-hex.xpt-acw.xpt-zoom:hover .xpt-box-inr {
            -webkit-transform: rotate(60deg);
            -moz-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            -o-transform: rotate(60deg);
            transform: rotate(60deg);
        }

        .xpt-hex.xpt-inr-cw:hover .xpt-ihex,
        .xpt-hex.xpt-inr-acw:hover .xpt-ihex .xpt-box-inr,
        .xpt-hex.xpt-cw.xpt-zoom:hover .xpt-box-inr {
            -webkit-transform: rotate(-60deg);
            -moz-transform: rotate(-60deg);
            -ms-transform: rotate(-60deg);
            -o-transform: rotate(-60deg);
            transform: rotate(-60deg);
        }

        .xpt-hex.xpt-clr-cng:hover,
        .xpt-hex.xpt-clr-cng:hover:after,
        .xpt-hex.xpt-clr-cng:hover:before {
            background: #adcf24;
        }



        .xpt-hex.xpt-flip {
            -webkit-perspective: 1000;
            -moz-perspective: 1000;
            -ms-perspective: 1000;
            perspective: 1000;
        }

        .xpt-hex.xpt-flip .xpt-box-2,
        .xpt-hex.xpt-zoom-in-out .xpt-box-2 {
            top: 0;
        }

        .xpt-hex.xpt-flip:hover .xpt-ihex,
        .xpt-hex.xpt-flip:hover .xpt-box-inr {
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -ms-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        .xpt-hex.xpt-flip.xpt-frl:hover .xpt-ihex,
        .xpt-hex.xpt-flip.xpt-frl:hover .xpt-box-inr {
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
        }

        .xpt-hex.xpt-flip.xpt-ftb:hover .xpt-ihex,
        .xpt-hex.xpt-flip.xpt-ftb:hover .xpt-box-inr {
            -webkit-transform: rotateX(-180deg);
            -moz-transform: rotateX(-180deg);
            -ms-transform: rotateX(-180deg);
            -o-transform: rotateX(-180deg);
            transform: rotateX(-180deg);
        }

        .xpt-hex.xpt-flip.xpt-fbt:hover .xpt-ihex,
        .xpt-hex.xpt-flip.xpt-fbt:hover .xpt-box-inr {
            -webkit-transform: rotateX(180deg);
            -moz-transform: rotateX(180deg);
            -ms-transform: rotateX(180deg);
            -o-transform: rotateX(180deg);
            transform: rotateX(180deg);
        }

        .xpt-hex.xpt-zoom-in-out:hover .xpt-ihex {
            -webkit-animation: xptzoom-in-out .5s;
            animation: xptzoom-in-out .5s;
        }

        @keyframes xptzoom-in-out {
            0% {
                -webkit-transform: scale(1, 1);
                -moz-transform: scale(1, 1);
                -ms-transform: scale(1, 1);
                -o-transform: scale(1, 1);
                transform: scale(1, 1);
            }

            50% {
                -webkit-transform: scale(.4, .4);
                -moz-transform: scale(.4, .4);
                -ms-transform: scale(.4, .4);
                -o-transform: scale(.4, .4);
                transform: scale(.4, .4);
            }

            100% {
                -webkit-transform: scale(1, 1);
                -moz-transform: scale(1, 1);
                -ms-transform: scale(1, 1);
                -o-transform: scale(1, 1);
                transform: scale(1, 1);
            }
        }

        /* 3.3 - Hover Effects End
--------------------------------------*/
        /* 3 - Hexagon Styles  End
---------------------------------------------------------------------- */




        /* 4 - Hexagon Color Variation
---------------------------------------------------------------------- */
        /* Front Hexagon BG Color */
        .xpt_inner-lb,
        .xpt_inner-lb:after,
        .xpt_inner-lb:before,
        .xpt_inner-lb li span i {
            background: #0FB9DB;
        }

        .xpt_inner-b,
        .xpt_inner-b:after,
        .xpt_inner-b:before,
        .xpt_inner-b li span i {
            background: #3498db;
        }

        .xpt_inner-db,
        .xpt_inner-db:after,
        .xpt_inner-db:before,
        .xpt_inner-db li span i {
            background: #2980b9;
        }

        .xpt_inner-ld,
        .xpt_inner-ld:after,
        .xpt_inner-ld:before,
        .xpt_inner-ld li span i {
            background: #2c3e50;
        }

        .xpt_inner-lg,
        .xpt_inner-lg:after,
        .xpt_inner-lg:before,
        .xpt_inner-lg li span i {
            background: #1abc9c;
        }

        .xpt_inner-lg,
        .xpt_inner-lg:after,
        .xpt_inner-lg:before,
        .xpt_inner-lg li span i {
            background: #1abc9c;
        }

        .xpt_inner-g,
        .xpt_inner-g:after,
        .xpt_inner-g:before,
        .xpt_inner-g li span i {
            background: #16a085;
        }

        .xpt_inner-lr,
        .xpt_inner-lr:after,
        .xpt_inner-lr:before,
        .xpt_inner-lr li span i {
            background: #f15b5d;
        }

        .xpt_inner-r,
        .xpt_inner-r:after,
        .xpt_inner-r:before,
        .xpt_inner-r li span i {
            background: #dc2a0b;
        }

        .xpt_inner-o,
        .xpt_inner-o:after,
        .xpt_inner-o:before,
        .xpt_inner-o li span i {
            background: #f39c12;
        }

        .xpt_inner-lp,
        .xpt_inner-lp:after,
        .xpt_inner-lp:before,
        .xpt_inner-lp li span i {
            background: #d368e8;
        }

        .xpt_inner-lp,
        .xpt_inner-lp:after,
        .xpt_inner-lp:before,
        .xpt_inner-lp li span i {
            background: #d368e8;
        }

        .xpt_inner-p,
        .xpt_inner-p:after,
        .xpt_inner-p:before,
        .xpt_inner-p li span i {
            background: #de2e8c;
        }

        .xpt_inner-dp,
        .xpt_inner-dp:after,
        .xpt_inner-dp:before,
        .xpt_inner-dp li span i {
            background: #F305C7;
        }

        /* Front Hexagon BG Color End */





        /* Back Hexagon BG Color */
        .bhex_white,
        .bhex_white:after,
        .bhex_white:before {
            background: #ffffff;
        }

        .bhex_GhostWhite,
        .bhex_GhostWhite:after,
        .bhex_GhostWhite:before {
            background: #F8F8FF;
        }

        .bhex_WhiteSmoke,
        .bhex_WhiteSmoke:after,
        .bhex_WhiteSmoke:before {
            background: #F5F5F5;
        }

        .bhex_Snow,
        .bhex_Snow:after,
        .bhex_Snow:before {
            background: #FFFAFA;
        }

        .bhex_Silver,
        .bhex_Silverl:after,
        .bhex_Silver:before {
            background: #C0C0C0;
        }

        .bhex_Gray,
        .bhex_Gray:after,
        .bhex_Gray:before {
            background: #808080;
        }

        .bhex_LightGray,
        .bhex_LightGray:after,
        .bhex_LightGray"before {
 background: #D3D3D3;
        }

        .bhex_SlateGray,
        .bhex_SlateGray:after,
        .bhex_SlateGray:before {
            background: #708090
        }

        .bhex_LightSlateGray,
        .bhex_LightSlateGray:after,
        .bhex_LightSlateGray:before {
            background: #778899
        }

        .bhex_DimGray,
        .bhex_DimGray:after,
        .bhex_DimGray:before {
            background: #696969;
        }

        .bhex_DarkGray,
        .bhex_DarkGray:after,
        .bhex_DarkGray:before {
            background: #A9A9A9;
        }

        /* Back Hexagon BG Color End */


        /* 4 - Hexagon Color Variation End
---------------------------------------------------------------------- */
    </style>
</head>

<body>

    <!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

    <div id="preloader"></div>
    <!-- Start Header Area -->
    <?php
    include "includes/nav.php";
    ?>
    <!-- End Header Area -->
    <!-- Start breadcrumbs area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline text-center">
                            <h3>Accounts </h3>
                        </div>
                        <ul>
                            <li class="home-bread">Home</li>
                            <li>Our available Accounts </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumbs area -->
    <!-- start pricing table area -->
    <div class="pricing-area bg-color area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Our all services worldwide</h3>
                        <p>Help agencies define their new business objectives and then create professional software.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pricing-content">
                    <!-- Pricing Table structure -->
                    <div class="xpt">
                        <div class="xpt-hex xpt-cw">
                            <div class="xpt-ihex">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title"> Deposit account </h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening</span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>Tax-free interest</li>
                                            <li><i class="fa fa-star"></i>Substantial returns</li>
                                            <li><i class="fa fa-heart"></i>Loan request </li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->


                        <div class="xpt-hex">
                            <div class="xpt-ihex  xpt_inner-lb">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title"> Transaction account</h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening</span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>Overdraft</li>
                                            <li><i class="fa fa-star"></i>Tax-free earnings</li>
                                            <li><i class="fa fa-heart"></i>High-yield accounts</li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->

                        <div class="xpt-hex xpt-zoom">
                            <div class="xpt-ihex xpt_inner-db">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title"> Savings account </h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening</span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>High yield</li>
                                            <li><i class="fa fa-star"></i>Over draft</li>
                                            <li><i class="fa fa-heart"></i>Loan Request </li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->


                        <div class="xpt-hex xpt-zoom-out">
                            <div class="xpt-ihex xpt_inner-ld">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title"> Time Deposit </h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening</span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>Tax free Interest</li>
                                            <li><i class="fa fa-star"></i>High yielding</li>
                                            <li><i class="fa fa-heart"></i>Over Draft</li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->


                        <div class="xpt-hex xpt-inr-cw">
                            <div class="xpt-ihex xpt_inner-lg">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title"> Tax-free savings account </h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening</span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>Tax Free interest</li>
                                            <li><i class="fa fa-star"></i>Fast yielding</li>
                                            <li><i class="fa fa-heart"></i>Loan Request </li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->

                        <div class="xpt-hex xpt-inr-acw">
                            <div class="xpt-ihex xpt_inner-lg">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title"> Fixed Deposit Account </h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening </span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>Tax free earnings</li>
                                            <li><i class="fa fa-star"></i>Substantial Returns</li>
                                            <li><i class="fa fa-heart"></i>Over draft</li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->


                        <div class="xpt-hex xpt-inr-acw xpt-zoom-out">
                            <div class="xpt-ihex xpt_inner-g">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title">Non Resident Account </h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening</span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>Tax Free</li>
                                            <li><i class="fa fa-star"></i>Loan request</li>
                                            <li><i class="fa fa-heart"></i>Over draft </li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->

                        <div class="xpt-hex xpt-inr-cw xpt-zoom-out">
                            <div class="xpt-ihex xpt_inner-lr">
                                <div class="xpt-box-inr">
                                    <div class="xpt-box-1 xpt-center">
                                        <h3 class="xpt-title"> Joint account </h3>
                                        <p class="xpt-price-box">
                                            <span class="xpt-currency">$</span>
                                            <span class="xpt-price">30<span>00</span></span>
                                            <span class="xpt-duration">for opening</span>
                                        </p>
                                    </div>
                                    <div class="xpt-box-2">
                                        <ul class="xpt-body">
                                            <li><i class="fa fa-clock-o"></i>24/7 Tech Support</li>
                                            <li><i class="fa fa-cog"></i>Fast Earnings</li>
                                            <li><i class="fa fa-star"></i>Exchange rate inflation</li>
                                            <li><i class="fa fa-heart"></i> </li>
                                        </ul>
                                        <!-- /.xpt-body -->
                                        <div class="xpt-footer">
                                            <a href="Account-from.php" class="xpt-btn"><i class="fa fa-long-arrow-right"></i>Get Account</a>
                                        </div>
                                        <!-- /.xpt-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.xpt-hex -->


                    </div>
                    <!-- /.xpt -->
                </div>
            </div>
        </div>
    </div>
    <!-- End pricing table area -->
    <!-- Start footer area -->
    <!-- Start footer area -->
    <footer class="footer-1">
        <?php
        include "includes/footer.php";
        ?>
    </footer>

    <!-- footer scripts for this fil--->
    <?php
    include "includes/footer_scripts.php";
    ?>
</body>

</html>