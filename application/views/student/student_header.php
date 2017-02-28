<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Rolling Music</title>
        <meta name="description" content="Rolling Music">
        <meta name="keywords" content="Rolling Music">
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="/asset/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="/asset/css/animations.css" rel="stylesheet">
        <link href="/asset/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="/asset/css/style.css" rel="stylesheet">
        <link href="/asset/css/custom.css" rel="stylesheet">
        <link href="/asset/css/select2.min.css" rel="stylesheet">
        <script src="/static/js/jquery.min.js"></script>
        <script src="/asset/js/select2.full.js"></script>
        <script type="text/javascript" src="/asset/js/moment.min.js"></script>
        <script type="text/javascript" src="/asset/js/daterangepicker.js"></script>
        <script type="text/javascript" src="/asset/js/respond.js"></script>
        <link href="/static/css/pnotify.css" rel="stylesheet">
        <script type="text/javascript" src="/static/js/notify/pnotify.core.js"></script>
        <script type="text/javascript" src="/static/js/notify/pnotify.buttons.js"></script>
        <script type="text/javascript" src="/static/js/notify/pnotify.nonblock.js"></script>
        <style type="text/css">
          body{
            background-color: #f7f7f7;
          }
        </style>

    </head>

    <body class="no-trans fixed-header-on">
    <!-- scrollToTop -->
        <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

        <!-- header start -->
        <header class="header clearfix navbar member-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">

                        <!-- header-left start -->
                        <div class="header-left">

                            <!-- logo -->
                            <div class="logo smooth-scroll">
                                <a href="#banner"><img id="logo" src="/asset/images/logo.png" alt="Worthy"></a>
                            </div>

                            <!-- name-and-slogan -->
                            <!--div class="logo-section smooth-scroll">
                                <div class="brand"><a href="#banner">WIND</a></div>
                            </div-->

                        </div>
                        <!-- header-left end -->

                    </div>
                    <div class="col-md-10">

                        <!-- header-right start -->
                        <div class="header-right">

                            <!-- main-navigation start -->
                            <div class="main-navigation animated">

                                <!-- navbar start -->
                                <nav class="navbar navbar-default" role="navigation">
                                    <div class="container-fluid">

                                        <!-- Toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li class="active"><a href="#banner"><?php echo $this->lang->line('index_info');?></a></li>
                                                <!--li><a href="#services">Services</a></li-->
                                                <li><a href="#about"><?php echo $this->lang->line('about_us');?></a></li>

                                                <li><a href="#teachers"><?php echo $this->lang->line('teachers');?></a></li>
                                                <!--li><a href="#team">Team</a></li-->
                                                <!--li><a href="#price">Price</a></li-->
                                                <li><a href="#contact"><?php echo $this->lang->line('contact');?></a></li>
                                                <li><a href="/front/logout/student" ><?php echo $this->lang->line('logout');?></a>
                                                </li>
                                                <li><a href="javascript:void(0)" id="change_language"><?php echo $this->lang->line('language_info');;?></a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </nav>
                                <!-- navbar end -->

                            </div>
                            <!-- main-navigation end -->

                        </div>
                        <!-- header-right end -->

                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

 <div class="container">
            <ul class="col-sm-2 col-xs-2 nav child_menu music_menu_ul student_menu">
              <li <?php if($this->router->method =='index' || $this->router->method =='course_detail'){ ?>class="active" <?php }?>>
                <a href="/student/index"><?php echo $this->lang->line('course_homework');?></a>
              </li>

              <li <?php if($this->router->method =='my_course'){ ?>class="active" <?php }?>>
                <a href="/student/my_course"><?php echo $this->lang->line('my_course');?></a>
              </li>

              <li <?php if($this->router->method =='payment_list'){ ?>class="active" <?php }?> style="display:none;">
                <a href="/student/payment_list"><?php echo $this->lang->line('payment_list');?></a>
              </li>

            </ul>
