<?php
session_start();

require "connection/connection.php";
?>
<!DOCTYPE html>
<html alig="er" dir="ltr">

<head>
    <title>ادارة قسم علوم البيانات</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">

    <link rel="stylesheet" href="css/owl.theme.default.css">
    <link rel="stylesheet" href="css/transitions.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <?php  
    $logoo = mysqli_query($conn, "SELECT * FROM logo");
    while ($logo = mysqli_fetch_assoc($logoo)) {?>
    <link sizes="16x16" src="Images/<?= $logo['image'] ;?>">
    <link href="Images/logo.jpg" rel="icon">
    <?php } ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="tg-home tg-homethree">
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!--************************************
			Wrapper Start
	*************************************-->
    <div id="tg-wrapper" class="tg-wrapper">
        <!--************************************
				Header Start
		*************************************-->
        <header id="tg-header" class="tg-header tg-haslayout">
            <div class="tg-topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="tg-addressinfo">
                                <li>
                                    <i class="icon-map-marker"></i>
                                    <address>جاكعة تعز طلية العلوم الادارية </address>
                                </li>
                                <li>
                                    <i class="icon-clock"></i>
                                    <time datetime="2016-10-10">Mon - Sat 9:00 - 2:00</time>
                                </li>
                                <li>
                                    <i class="icon-phone-handset"></i>
                                    <span>+967 774252137</span>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-navigationarea">
                            <strong class=""><a href="index-2.html">
                                    <img src="Images/logo.jpg" width="50" height="50" alt=" University "></a></strong>

                            <div class=" tg-navigationandsearch">
                                <nav id="tg-nav" class="tg-nav">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                            data-target="#tg-navigation" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                        <ul>
                                            <li class="menu-item-has- current-menu-item">
                                                <a href="index.php">الصفحة الرئيسية</a>

                                            </li>

                                            <li class="menu-item-has-mega-menu">
                                                <a href="javascript:void(0);">المستويات </a>
                                                <div class="mega-menu">
                                                    <ul class="mega-menu-row">
                                                        <li class="mega-menu-col">
                                                            <a href="javascript:void(0);">المستويات</a>
                                                            <ul>
                                                                <li><a href="levelcoursedetail.php">المستوى
                                                                        الاول</a>
                                                                </li>

                                                                <li><a href="levelcoursedetailthree.php">المستوى
                                                                        الثالث</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col">
                                                            <a href="javascript:void(0);">المستويات</a>
                                                            <ul>
                                                                <li><a href="levelcoursedetailtow.php">المستوى
                                                                        الثاني</a>
                                                                </li>
                                                                <li><a href="levelcoursedetailfour.php">المستوى
                                                                        الرابع</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <ul class="mega-menu-row">
                                                        <li class="mega-menu-col">
                                                            <figure><img src="Images/logo.jpg" width="100" height="100"
                                                                    alt="image description">
                                                            </figure>
                                                            <div class="tg-textbox">
                                                                <strong>المستويات الدراسيه في قسم علوم
                                                                    البيانات</strong>
                                                                <div class="tg-description">
                                                                    <p>اختار القسم الذي تدرس فيه لعرض البيانات
                                                                        والمواد
                                                                        الدراسية المناسبة</p>
                                                                </div>
                                                                <a class="tg-btn tg-bgn-sm"
                                                                    href="javascript:void(0);">المزيد</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0);">الاخبار</a>
                                                <ul class="sub-menu">
                                                    <li><a href="newscolleg.php"> الاخبار العامه</a></li>
                                                    <li><a href="newsdepartmint.php"> اخبار خاصه بلقسم</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-    -has- current-menu-item">
                                                <a href="about.php"> من نحن</a>

                                            </li>
                                            <li class="menu-item-has">
                                                <a href="newstabledate.php"> جدول الاختبارات</a>

                                            </li>
                                            <li class="menu-item-has">
                                                <a href="campusesmanagercolleg.php">خدمة الطلاب</a>

                                            </li>


                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0);">المكتبه</a>
                                                <ul class="sub-menu">
                                                    <li><a href="admissions.html">الكتب العامه</a></li>
                                                    <li><a href="linkre.php">مراجع الكترونيه</a></li>
                                                    <li><a href="method.php"></a>المناهج</li>

                                                </ul>
                                            </li>
                                            <li class="menu-item-has-">
                                                <a href="login/login.php"> <i class="fa fa-user mr-2"
                                                        aria-hidden="true"></i>تسجيل دخول</a>

                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="javascript:void(0);">صصفحات اخراء</a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item-has-children">
                                                        <a href="javascript:void(0);">عن الجامعه</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="aboutcampuslife.html">Our Campus
                                                                    Life</a>
                                                            </li>
                                                            <li><a href="abouthonorsawards.html">Our Honor &amp;
                                                                    Awards</a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="javascript:void(0);">News</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="newslist.html">News List</a></li>
                                                            <li><a href="newsgrid.html">News Grid</a></li>
                                                            <li><a href="newsgridsidebar.html">News Grid
                                                                    Sidebar</a>
                                                            </li>
                                                            <li><a href="newsdetail.html">News Detail</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>

                                <div class="tg-searchbox">
                                    <a id="tg-btnsearch" class="tg-btnsearch" href="javascript:void(0);"><i
                                            class="icon-magnifier"></i></a>
                                    <form class="tg-formtheme tg-formsearch">
                                        <fieldset><input type="search" name="search" class="form-control"
                                                placeholder="اكتب ما تريد البحث عنه"></fieldset>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </header>
        <script>
        $(document).ready(function() {
            // Toggle the main navigation menu
            $('.navbar-toggle').on('click', function() {
                $('#tg-navigation').toggleClass('show');
            });

            // Mega menu functionality
            $('.menu-item-has-mega-menu').on('mouseenter', function() {
                $(this).find('.mega-menu').stop(true, true).delay(200).fadeIn(500);
            }).on('mouseleave', function() {
                $(this).find('.mega-menu').stop(true, true).delay(200).fadeOut(500);
            });

            // Dropdown menu functionality
            $('.menu-item-has-children').on('mouseenter', function() {
                $(this).find('.sub-menu').stop(true, true).delay(200).fadeIn(500);
            }).on('mouseleave', function() {
                $(this).find('.sub-menu').stop(true, true).delay(200).fadeOut(500);
            });
        });
        </script>