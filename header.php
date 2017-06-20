<?php
session_start();

require_once('config/db.php');
require_once('classes/user.class.php');

$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if ($db->connect_errno) {
	echo 'Database connection problem: ' . $db->connect_errno;
	exit();
}
$user = new User($db);
if(isset($_SESSION['username']) && $user->is_logged()) {
  $username = $_SESSION['username'];
} else $username = 'guest'; $_SESSION['username'] = 'Guest'; $_SESSION['is_logged'] = false;
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Book Your Train</title>
        <meta name="description" content="HTML framework description">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <link rel="stylesheet" href="css/general.css">
        <link href="http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,600,500,800,700,900" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,400,600,700,800&amp;subset=latin,cyrillic-ext,cyrillic,latin-ext" rel="stylesheet">

        <!-- jQuery & jQuery UI Lib -->
        <script src="js/libs/jquery-1.11.0.min.js"></script>
        <script src="js/libs/jquery-ui.js"></script>
        <script src="js/scriptsJsUI.js"></script>


        <!-- Modernizr -->
        <script type='text/javascript' src='js/libs/modernizr-2.5.3.min.js'></script>

        <!-- Semantic HTML5 Support on old IE -->
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
            <header class="header">
                <div class="container cf">
                    <div class="logo">
                        <a href="index.php" class="logo__item">
                            <img src="css/images/logo.png" alt="Libro" />
                        </a>
                        <p class="logo__item logo__item_descr">
                            There are many variations of passages
                        </p>
                    </div>
                    <!-- END: LOGO -->

                    <ul class="lang header__item">
                        <li class="lang__item">
                            <a href="#" class="lang__link">
                              <?php
                                  $cur_user = $user->get_user_info($username);
                                  echo $cur_user->first_name." ".$cur_user->last_name;
                               ?>
                            </a>
                        </li>
                    </ul>
                    <!-- END: LANG -->

                     <div class="enter header__item">
                        <a href="login.php" class="enter__item enter__item_login">Login</a>
                        <a href="register.php" class="enter__item enter__item_register">Register</a>
                        <?php if ($user->is_logged()) include('logout.link.php');?>
                    </div>
                    <!-- END: ENTER -->

                    <div class="contacts header__item">
                        <div class="contacts__phone">+919876543210</div>
                        <div class="contacts__email">support@bookyourtrain.com</div>
                    </div>
                    <!-- END: CONTACTS -->
                </div>
                <!-- END: CONTAINER -->
            </header>
            <!-- END: HEADER -->

        <nav class="nav">
           <div class="container cf">
                <form class="search">
                    <input type="text" placeholder="Search">
                    <button type="button" class="search__btn"></button>
                </form>
                <!-- END: SEARCH -->

                <a href="#" class="pull pull_insNav">Menu</a>
           </div>
        </nav>
        <!-- END: WRAP NAV -->

        <div class="mainSlider">
            <ul class="insMainSlider cf">
                <li class="insMainSlider__item" style="background: url(css/images/mainSlider/slide.jpg) no-repeat;">
                    <div class="container">
                        <div class="slider__column">
                            <div class="sliderTitle">
                                <h1 class="sliderTitle__titl sliderTitle__item">Get your</h1><br>
                                <h2 class="sliderTitle__desc sliderTitle__item">Ticket instantly</h2>
                            </div>
                            <a href="#" class="btn">Read more</a>
                        </div>


                        <div class="slider__column">
