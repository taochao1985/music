<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/resource/css/admin/appmsg.css" media="screen" /> 
<script type="text/javascript" src="/resource/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/resource/js/plugin/operamasks-ui.min.js"></script>
<title>邮件地址设置</title>
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
var validator = $("#appmsg-form").validate({
 
			submitHandler: function() {
				 
				var $form = $("#appmsg-form");
				var $btn = $("#save-btn");
				if($btn.hasClass("disabled")) return; 
				var case_count = $("#content").val();
				if( case_count == ''){ 
					alert('邮件地址不能空'); 
					return false;
				}
				 
				var submitData = {
						content: case_count
				};
				$btn.addClass("disabled");
				$.post('/admin/mail_config', submitData,function(data) {
					$btn.removeClass("disabled");
					if (data.success == 'yes') {
					    alert(data.msg);
						location.href = "/admin/mail_config";
					}  else{
							alert("保存失败");						 
					}
				},"json");
				return false;
			}
		}); 
 })
</script>
<body>
	<div class="row">

		<div class="span7">
			<div class="msg-editer-wrapper">
				<div class="msg-editer">
					<form id="appmsg-form" class="form">
						 
					  	<div class="control-group">
						<label class="control-label">邮件地址</label>    
						    <div class="controls"> 
								<textarea name="content" style="width: 300px;height:120px;" id="content"><?php if($config){ echo $config[0]->jc_content;}?></textarea>
								<span>多个邮件地址，请用 , 拼接</span>
							</div>
						</div>
					 
						 <div class="control-group">
						    <div class="controls">
						      <button id="save-btn" type="submit" class="btn btn-primary btn-large">保存</button>
						      <button id="cancel-btn" type="button" class="btn btn-large">取消</button>
						      						    </div>
					    </div>
					</form> 
				</div>
				<span class="abs msg-arrow a-out" style="margin-top: 0px;"></span>
				<span class="abs msg-arrow a-in" style="margin-top: 0px;"></span>
			</div>
		</div>
	</div>
</body>
</html>