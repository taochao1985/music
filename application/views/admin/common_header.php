<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Music School | Backend </title>

  <!-- Bootstrap core CSS -->

  <link href="/static/css/bootstrap.min.css" rel="stylesheet">

  <link href="/static/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="/static/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="/static/css/custom.css" rel="stylesheet">
  <link href="/static/css/select/select2.min.css" rel="stylesheet">
  <link href="/static/css/pnotify.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/static/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="/static/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="/static/css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="/static/js/jquery.min.js"></script>
  <script src="/static/js/nprogress.js"></script>

  <script src="/static/js/validator/validator.js"></script>
  <script src="/static/js/select/select2.full.js"></script>
  <!--[if lt IE 9]>
        <script src="/static/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<?php $user = $this->session->userdata('admin'); $user = $user[0];$data['user'] = $user;?>

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <?php $this->load->view('admin/common_left',$data);?>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <?php echo $user->username;?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="/admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main" id="music_target" style="min-height:400px;">
