<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" media="screen" />
	<link rel="stylesheet" href="/resource/css/admin/admin.css" media="screen" />
	<link rel="stylesheet" href="/css/smoothness/jquery-ui-1.10.0.custom.min.css" media="screen" />
	<link rel="stylesheet" href="/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
	<link rel="stylesheet" href="/resource/css/admin/appmsg.css" media="screen" />
	<link rel="stylesheet" href="/resource/css/admin/coupon-setting.css" media="screen" />
	<link rel="stylesheet" href="/css/uploadify.css" media="screen" />
	<script type="text/javascript" src="/resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="/resource/js/page/appmsg.js"></script>
	<script type="text/javascript" src="/resource/js/plugin/operamasks-ui.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.10.0.custom.min.js"></script>
	<script type="text/javascript" src="/js/jquery.uploadify.min.js"></script> 
	<script type="text/javascript">window.UEDITOR_HOME_URL = '/ueditor/';</script>
	<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
	<link rel="stylesheet" href="/ueditor/themes/default/css/ueditor.css" />

	<script type="text/javascript">
    /*window.msg_editor = new UE.ui.Editor({initialFrameWidth:498});
	    window.msg_editor.render('editor');*/
	   
$(function(){ 
var $btn  = $(".btn-large");
var $form = $("#changpwdform");
//验证表单
$validator=$form.validate({
	rules:{
		js_user_type:{required:true},
		js_title:{required:true}
		
	},
	messages:{
		js_user_type:{required:'请选择发送用户'},
		js_title:{required:'标题必填'}
		
	}, 
	 submitHandler:function(){
		var content = ue.getContent();
		if(content == ''){
			alert('内容必填');return false;
		}
		var submitData={
			js_title:$("input[name='js_title']",$form).val(),
			js_user_type:$("select[name='js_user_type']",$form).val(),
			js_content:content 
		};
		
		//$btn.addClass("disabled"); 
		 $.post('/admin/system_messages_add',submitData,function(data){
			$btn.removeClass("disabled");
			if(data.success=="no"){
				alert('保存失败');
			}else if(data.success=="yes"){
			    
			   window.location.href="/admin/system_messages";
				 
			}
			
		},"json");
		return false;			
	}
}); 
  
});
</script>

</head>
<body>
<div class="main-title">
		<h3>新增系统消息</h3>
	</div>
<form id="changpwdform" class="form-horizontal" action="#" >	
	<input type="hidden" name="js_id" value="<?php if(isset($sub_design)){ echo $sub_design->js_id;} ?>" />
	
	
	<div class="control-group">
	<label class="control-label"  for="keyword">发送用户<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="js_user_type" id="js_user_type">
		 	<option value="1">全部用户</option>
		 	<?php if($user_level){
		 			foreach($user_level as $k=>$v){
		 	?>
		 		<option value="<?php echo $k;?>"><?php echo $v;?></option>
		 	<?php }
		 			}?>
		 </select>  
		</div>
	</div>
<div class="control-group">
		<label class="control-label"  for="keyword">标题<span class="maroon">*</span>：</label>
		<div class="controls">
		  <input type="text" value="" name="js_title"/>
		</div>
	</div>
	 

	 
	<div class="control-group">
	<label class="control-label"  for="keyword">内容：</label>
		<div class="controls">
		  <script type="text/plain" id="editor" style="width: 498px;"></script>
		</div>
	</div>
 
	<div class="control-group">
		<div class="controls"> 
		  
		  <button  class="btn btn-primary btn-large" type="submit" data-id="0" >保存</button>
		  <button  class="btn go_back btn-large" type="button" data-id="about" >返回</button>
		</div>
	</div>
</form>	
<script type="text/javascript">
	 var ue = UE.getEditor('editor', {serverUrl: '/ueditor/php/controller.php'});
</script>
</body>
</html>