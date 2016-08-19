<?php
exit;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>历史记录</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
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

</head>
<style type="text/css">
  body{
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    background-color: #fff;
  }

</style>
<body>
   <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content">
          <form class="form-horizontal form-label-left">
            <div class="form-group">
              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                     <button class="btn btn-primary" type="button">Go!</button>
                   </span>
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
<div class="col-sm-12 mail_list_column">
<?php for($i =1 ; $i<20; $i++){?>
                      <div class="mail_list">
                        <div class="left">

                        </div>
                        <div class="right">
                          <h3>测试标题<?php echo $i;?> <small>标签<?php echo $i;?>&nbsp;&nbsp;标签<?php echo $i;?></small></h3>
                          <p><?php echo date('Y-m-d H:i:s',strtotime('-'.$i.' hours'));?></p>
                        </div>
                      </div>
                    <?php }?>
                    </div>
</body>
</html>