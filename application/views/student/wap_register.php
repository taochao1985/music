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
        <script src="/static/js/jquery.min.js"></script>
    </head>

    <body class="no-trans">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo $portrait;?>" class="pull-right" style="width:30px;" />
        <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('register');?></h4>
      </div>
      <?php $this->load->view('front/register_form',array('openid'=>$openid,'student_id'=>$student_id,'success_url'=>base_url().'student/member_center/'));?>
      <div class="modal-footer">

      </div>
    </div>
  </div>
<script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/asset/plugins/modernizr.js"></script>
<script type="text/javascript" src="/asset/plugins/isotope/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/asset/plugins/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="/asset/plugins/jquery.appear.js"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="/asset/js/custom.js"></script>
</body>
</html>