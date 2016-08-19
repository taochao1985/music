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
  <link rel="stylesheet" type="text/css" href="/static/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="/static/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="/static/css/floatexamples.css" rel="stylesheet" type="text/css" />

  <script src="/static/js/jquery.min.js"></script>
  <script src="/static/js/nprogress.js"></script>
  <script src="/static/js/bootstrap.min.js"></script>
  <script src="/static/js/validator/validator.js"></script>
  <script src="/static/js/custom.js"></script>
  <!--[if lt IE 9]>
        <script src="/static/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <?php $this->load->view('admin/common_left');?>


      <!-- page content -->
      <div class="right_col" role="main">
      <div class="" style="width:100%;height:100%;position:absolute;">

      <!-- /top navigation -->
        <iframe frameborder="0" id="main" name="main" src="/admin/wechat_config" ></iframe>
        </div>
      </div>
      <!-- /page content -->
      <!-- footer content -->

    </div>
  </div>

</body>

</html>
