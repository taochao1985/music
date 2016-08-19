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
		js_name:{required:true}, 
		js_pid:{required:true},
		js_designer_id:{required:true}, 
		js_pic:{required:true},  
		js_display_order:{required:true}
	},
	messages:{
		js_name:{required:'设计系列名必填'}, 
		js_pid:{required:'请选择父设计系'},
		js_designer_id:{required:'请选择设计师'}, 
		js_pic:{required:'请上传设计系图'},  
		js_display_order:{required:'排序必填'}
		
	}, 
	 submitHandler:function(){
		var recommended_flag = $("#js_recommended").prop('checked');
	 	var recommended_value = 0;
	 	if(recommended_flag){
	 		recommended_value = 1;
	 	}
	 	var app_recommended_flag = $("#js_app_recommended").prop('checked');
	 	var app_recommended_value = 0;
	 	if(app_recommended_flag){
	 		app_recommended_value = 1;
	 	}
		var submitData={
			js_name:$("input[name='js_name']",$form).val(),
			js_pid:$("select[name='js_pid']",$form).val(),
			js_designer_id:$("select[name='js_designer_id']",$form).val(), 
			js_desc:ue.getContent(),
			js_pic:$("input[name='js_pic']",$form).val(), 
			js_display_order:$("input[name='js_display_order']",$form).val(), 		 			
			js_id:$("input[name='js_id']",$form).val(),
			recommended_value:recommended_value,
			app_recommended_value:app_recommended_value
		};
		
		//$btn.addClass("disabled"); 
		 $.post('/admin/sub_design_add',submitData,function(data){
			$btn.removeClass("disabled");
			if(data.success=="no"){
				alert('保存失败');
			}else if(data.success=="yes"){
			    
			   window.location.href="/admin/sub_design_list";
				 
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
		<h3>新增设计系</h3>
	</div>
<form id="changpwdform" class="form-horizontal" action="#" >	
	<input type="hidden" name="js_id" value="<?php if(isset($sub_design)){ echo $sub_design->js_id;} ?>" />
	
	<div class="control-group">
		<label class="control-label"  for="keyword">设计系列名<span class="maroon">*</span>：</label>
		<div class="controls">
		  <input type="text" value="<?php if(isset($sub_design)){ echo $sub_design->js_name;}?>" name="js_name"/>
		</div>
	</div>
	
	<div class="control-group">
	<label class="control-label"  for="keyword">父设计系<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="js_pid" id="js_pid">
		 	<option value="">请选择</option>
		 	<?php if($designs){
		 			foreach($designs as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jc_id;?>" <?php if(isset($sub_design)&&($sub_design->js_pid == $v->jc_id)){ ?>selected<?php }?> ><?php echo $v->jc_field_one;?></option>
		 	<?php }
		 			}?>
		 </select>  
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">设计师的品牌<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="js_designer_id" id="js_designer_id">
		 	<option value="">请选择</option>
		 	<?php if($designers){
		 			foreach($designers as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jd_id;?>" <?php if(isset($sub_design)&&($sub_design->js_designer_id == $v->jd_id)){ ?>selected<?php }?> ><?php echo $v->jd_brand;?></option>
		 	<?php }
		 			}?>
		 </select>
		</div>
	</div>
	

	<div class="control-group">
	<label class="control-label"  for="keyword">设计系列图:<span class="maroon">*</span>：</label>
		<div class="controls">
			<div class="cover-area">
				<div class="cover-hd" >
					<input id="file_upload1" name="file_upload1" class="file_upload" type="file" />
					<input id="cover1" style="width:300px;display: none;" class="cover-input" value="<?php if (isset($sub_design)){ echo $sub_design->js_pic; }?>" name="js_pic" type="text" />
				</div>
			
				<p class="img-area cover-bd" >
				<img src="<?php if (isset($sub_design)){ echo $sub_design->js_pic;}?>" <?php if (!isset($sub_design)){?>style="display:none;"<?php }?> id="img">
				<a href="javascript:;"  <?php if (!isset($sub_design)){ ?>style="display: none;"<?php }?>class="vb cover-del"   >删除</a>
				</p>
			</div>
		</div>
	</div>

	 
	<div class="control-group">
	<label class="control-label"  for="keyword">设计系列简介：</label>
		<div class="controls">
		  <script type="text/plain" id="editor" style="width: 498px;"><?php if(isset($sub_design)){echo trim($sub_design->js_desc);  }?></script>
		</div>
	</div>

<div class="control-group">
	<label class="control-label"  for="keyword">排序：</label>
		<div class="controls">
		 <input type="text" id="js_display_order" value="<?php if(isset($sub_design)){echo $sub_design->js_display_order; }?>" name="js_display_order"/>
		</div>
	</div>

	<div class="control-group" style="display:none;">
	<label class="control-label"  for="keyword">推荐：</label>
		<div class="controls">
		 <input type="checkbox" id="js_recommended" <?php if(isset($sub_design)&&$sub_design->js_recommended){ ?>checked<?php }?> value="1" name="js_recommended"/>
		</div>
	</div>	

	<div class="control-group">
	<label class="control-label"  for="keyword">推荐至APP商城：</label>
		<div class="controls">
		 <input type="checkbox" id="js_app_recommended" <?php if(isset($sub_design)&&$sub_design->js_app_recommended){ ?>checked<?php }?> value="1" name="js_app_recommended"/>
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