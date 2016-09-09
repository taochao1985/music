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
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="no-trans">
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body"  onclick="window.location.href='<?php echo base_url().'student/index';?>'">
        我已注册过，查看作业
      </div>
    </div>
<?php if($student_class_id){?>
    <div class="panel panel-default" >
      <div class="panel-body" onclick="window.location.href='<?php echo base_url().'student/pay_class/'.$student_class_id;?>'">
        立即支付
      </div>
    </div>
<?php }?>
  </div>
</body>
</html>