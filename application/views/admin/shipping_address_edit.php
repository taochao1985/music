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
 
	<script type="text/javascript" src="/resource/js/plugin/operamasks-ui.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.10.0.custom.min.js"></script> 

	<script type="text/javascript"> 
	   
$(function(){ 
var $btn  = $(".btn-large");
var $form = $("#changpwdform");
//验证表单
$validator=$form.validate({
	rules:{
		js_username:{required:true}, 
		js_mobile:{required:true},
		js_province:{required:true}, 
		js_city:{required:true}, 
		js_district:{required:true}, 
		js_address:{required:true} 
	},
	messages:{
		js_username:{required:'姓名必填'}, 
		js_mobile:{required:'手机必填'},
		js_province:{required:'请选择省'}, 
		js_city:{required:'请选择市'}, 
		js_district:{required:'请选择区'}, 
		js_address:{required:'地址必填'} 
		
	}, 
	 submitHandler:function(){
		var default_flag = $("#js_default_address").prop('checked');
	 	var default_value = 0;
	 	if(default_flag){
	 		default_value = 1;
	 	} 

		var submitData={
			js_username:$("input[name='js_username']",$form).val(),
			js_mobile:$("input[name='js_mobile']",$form).val(),
			js_province:$("select[name='js_province']",$form).val(),
			js_city:$("select[name='js_city']",$form).val(),
			js_district:$("select[name='js_district']",$form).val(),  
			js_address:$("input[name='js_address']",$form).val(),  	 			
			js_id:$("input[name='js_id']",$form).val(),
			js_uid:$("input[name='js_uid']",$form).val(),
			default_value:default_value
		};
		
		//$btn.addClass("disabled"); 
		 $.post('/admin/shipping_address_edit',submitData,function(data){
			$btn.removeClass("disabled");
			alert(data.msg);
			if(data.success=="no"){ 
			}else if(data.success=="yes"){
			    
			   window.location.href="/admin/shipping_address_list";
				 
			}
			
		},"json");
		return false;			
	}
}); 
  


     $('#province').change(function(){
        var province_id = $(this).val();
        var str = "<option value='0'>请选择</option>";
        if(province_id !=0){
         $.ajax({
              type:"POST",
              url:"/front/get_city_area",
              data:{'table':'city', 'id':province_id},
              dataType:'json',
              success:function(data){
                
                var data_len = data.msg.length;
                var msg = data.msg;
                for(var j=0;j<data_len;j++){
                  str+="<option value='"+msg[j].city_id+"'>"+msg[j].city+"</option>";
                }
                 $('#city').html(str);
              }

          })
       }else{
        $('#city').html(str);
       }
     })

     $('#city').change(function(){
        var province_id = $(this).val();
        var str = "<option value='0'>请选择</option>";
        if(province_id !=0){
         $.ajax({
              type:"POST",
              url:"/front/get_city_area",
              data:{'table':'district', 'id':province_id},
              dataType:'json',
              success:function(data){
                
                var data_len = data.msg.length;
                var msg = data.msg;
                for(var j=0;j<data_len;j++){
                  str+="<option value='"+msg[j].area_id+"'>"+msg[j].area+"</option>";
                }
                 $('#district').html(str);
              }

          })
       }else{
        $('#district').html(str);
       }
     })

});
</script>

</head>
<body>
<div class="main-title">
		<h3>修改配送地址</h3>
	</div>
<form id="changpwdform" class="form-horizontal" action="#" >	
	<input type="hidden" name="js_id" value="<?php if(isset($shipping_address)){ echo $shipping_address->js_id;} ?>" />
	<input type="hidden" name="js_uid" value="<?php if(isset($shipping_address)){ echo $shipping_address->js_uid;} ?>" />
	<div class="control-group">
		<label class="control-label"  for="keyword">姓名<span class="maroon">*</span>：</label>
		<div class="controls">
		  <input type="text" value="<?php if(isset($shipping_address)){ echo $shipping_address->js_username;}?>" name="js_username"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label"  for="keyword">手机号<span class="maroon">*</span>：</label>
		<div class="controls">
		  <input type="text" value="<?php if(isset($shipping_address)){ echo $shipping_address->js_mobile;}?>" name="js_mobile" disabled=disabled/>
		</div>
	</div>
	<div class="control-group">
	<label class="control-label"  for="keyword">省<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="js_province" id="province">
		 	<option value="">请选择</option>
		 	<?php if($province){
		 			foreach($province as $k=>$v){
		 	?>
		 		    <option value="<?php echo $v->province_id;?>" <?php if(isset($shipping_address)&&($shipping_address->js_province == $v->province_id)){ ?>selected<?php }?> ><?php echo $v->province;?></option>
		 	<?php }
		 			}?>
		 </select>  
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">市<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="js_city" id="city">
		 	<option value="">请选择</option>
		 	<?php  
		 			foreach($city as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->city_id;?>" <?php if(isset($shipping_address)&&($shipping_address->js_city == $v->city_id)){ ?>selected<?php }?> ><?php echo $v->city;?></option>
		 	<?php }
		 			?>
		 </select>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">区<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="js_district" id="district">
		 	<option value="">请选择</option>
		 	<?php  
		 			foreach($area as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->area_id;?>" <?php if(isset($shipping_address)&&($shipping_address->js_district == $v->area_id)){ ?>selected<?php }?> ><?php echo $v->area;?></option>
		 	<?php }
		 			?>
		 </select>
		</div>
	</div>
	  

<div class="control-group">
	<label class="control-label"  for="keyword">地址：</label>
		<div class="controls">
		 <input type="text" id="js_display_order" value="<?php if(isset($shipping_address)){echo $shipping_address->js_address; }?>" name="js_address"/>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">设为默认地址：</label>
		<div class="controls">
		 <input type="checkbox" id="js_default_address" <?php if(isset($shipping_address)&&$shipping_address->js_default_address){ ?>checked<?php }?> value="1" name="js_default_address"/>
		</div>
	</div>	
 

	<div class="control-group">
		<div class="controls"> 
		  
		  <button  class="btn btn-primary btn-large" type="submit" data-id="0" >保存</button>
		  <button  class="btn go_back btn-large" type="button" data-id="about" >返回</button>
		</div>
	</div>
</form>	 
</body>
</html>