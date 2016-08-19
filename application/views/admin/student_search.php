<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/appmsg.css" media="screen" />
<link rel="stylesheet" href="/asset/jquery-ui/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
<link rel="stylesheet" href="/asset/resource/css/plugin/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/asset/jquery-ui/js/jquery-ui-1.10.0.custom.min.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/timepicker/jquery-ui-timepicker-zh-CN.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/timepicker/jquery-ui-sliderAccess.js"></script>
<title>学员设置</title>
<style>
label{
    display: inline-block;
}
.help-inline{
    vertical-align: top;
}
.row{
    padding-top: 20px;
    padding-bottom: 20px;
}
</style>
</head>
<script>
 $(function(){
 	$('#search_code').click(function(){

 		   $.post('/admin/student_search', {keywords:$('#keywords').val()},function(data) {

            if (data.success == 'yes') {

                location.href = "/admin/student_get_course/"+data.student_id;
            }  else{
                    alert("保存失败");
            }
        },"json");
        return false;
 	})
 })
</script>
<body>
	<div id="sn_form"  style="width:100%;text-align:center;margin-top:50px;">
			<div class="control-group">
		    	<div class="controls">
		    	    学生名,学号或者手机号：<input type="text" name="keywords" id="keywords"  style="margin-top:10px;" />
			    	<button class="btn btn-primary" id="search_code">查询</button>
		    	</div>
		  	</div>
	</div>
</body>
</html>