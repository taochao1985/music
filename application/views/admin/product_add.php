<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" media="screen" />
	<link rel="stylesheet" href="/resource/css/admin/admin.css" media="screen" />
	<link rel="stylesheet" href="/css/smoothness/jquery-ui-1.10.0.custom.min.css" media="screen" />
	<link rel="stylesheet" href="/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
	<link rel="stylesheet" href="/resource/css/admin/appmsg.css" media="screen" /> 
	<link rel="stylesheet" href="/css/uploadify.css" media="screen" />
	<script type="text/javascript" src="/resource/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
 	<script type="text/javascript" src="/resource/js/page/appmsg.js"></script>
	<script type="text/javascript" src="/resource/js/plugin/operamasks-ui.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.10.0.custom.min.js"></script>
	<script type="text/javascript" src="/js/jquery.uploadify.min.js"></script>  
	<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
	<link rel="stylesheet" href="/ueditor/themes/default/css/ueditor.css" />

	<script type="text/javascript"> 
	 

$(function(){ 


var $btn  = $(".btn-large");
var $form = $("#changpwdform");
//验证表单
$validator=$form.validate({
	rules:{
		jd_name:{required:true}, 
		jd_no:{required:true}, 
		jd_index_pic:{required:true}, 
		jd_detail_pic:{required:true}, 
		jd_cate_id:{required:true},
		jd_style_id:{required:true}
	},
	messages:{
		jd_name:{required:'商品名必填'}, 
		jd_no:{required:'商品货号必填'}, 
		jd_index_pic:{required:'请上传商品首图'}, 
		jd_detail_pic:{required:'请上传商品详细图'}, 
		jd_cate_id:{required:'请选择商品类型'},
		jd_style_id:{required:'请选择商品风格'},
		jd_designer_id:{required:'请选择设计师'}
		
	},
	 submitHandler:function(){  
	 	var recommended_flag = $("#jd_recommended").prop('checked');
	 	var recommended_value = 0;
	 	if(recommended_flag){
	 		recommended_value = 1;
	 	}


	 	var app_recommended_flag = $("#jd_app_recommended").prop('checked');
	 	var app_recommended_value = 0;
	 	if(app_recommended_flag){
	 		app_recommended_value = 1;
	 	}


	 	var editor_index = $('#editor_index').val();
	 	var product_desc = product_shipping_time = '';
	 	if(editor_index == 'content_editor1'){
	 		product_desc = ue.getContent();
	 		product_shipping_time = $('#content_editor2').html();
	 	}else{
			product_shipping_time = ue.getContent();
	 		product_desc = $('#content_editor1').html();
	 	}
	 
		var product_price_length = $('.product_prices').length;
		var material_id = size_id = price = stock = '';
		var materials = $('.product_materials');
		var sizes 	  = $('.product_sizes');
		var prices    = $('.product_prices');
		var stocks    = $('.product_stocks');
			for(var i=0;i<product_price_length;i++){

				material_id+=materials[i].value+'||';
				size_id+=sizes[i].value+'||';
				price+=prices[i].value+'||';
				stock+=stocks[i].value+'||';
			}
		if((stock == '')||(price == '')){
			alert('至少需要一个价格库存');return false;
		}	
		var cailiao_length = $('.product_cailiaos').length;
		var cailiaos = $('.product_cailiaos');
		var cailiao_infos = $('.product_cailiao_infos');
		var cailiao_id = cailiao_info = '';	 
			for (var i = 0;i<cailiao_length;i++){
				cailiao_id+=cailiaos[i].value+'||';
				cailiao_info+=cailiao_infos[i].value+'||';
			}
		var event_ids = '';	
  				$("input[name='jd_event_ids']:checked").each(function () {
                    event_ids+=$(this).val()+'||';
                }) 	
		var submitData={
			jd_name:$("input[name='jd_name']",$form).val(),
			jd_no:$("input[name='jd_no']",$form).val(), 
			jd_desc:product_desc,
			jd_shipping_time:product_shipping_time,
			jd_index_pic:$("input[name='jd_index_pic']",$form).val(), 
			jd_detail_pic:$("input[name='jd_detail_pic']",$form).val(),
			jd_try_pic:$("input[name='jd_try_pic']",$form).val(),
			jd_app_pic:$("input[name='jd_app_pic']",$form).val(),
			material_id:material_id,
			size_id:size_id,
			price:price,
			stock:stock,
			cailiao_id:cailiao_id,
			cailiao_info:cailiao_info,
			event_ids:event_ids,
			jd_cate_id:$("select[name='jd_cate_id']",$form).val(),
			jd_style_id:$("select[name='jd_style_id']",$form).val(),
			jd_designer_id:$("select[name='jd_designer_id']",$form).val(),
			jd_design_id:$("select[name='jd_design_id']",$form).val(),
			jd_display_order:$("input[name='jd_display_order']",$form).val(), 		 			
			jd_id:$("input[name='jd_id']",$form).val(),
			recommended_value:recommended_value,
			app_recommended_value:app_recommended_value
		};
		
		//$btn.addClass("disabled"); 
		 $.post('/admin/product_add',submitData,function(data){
			$btn.removeClass("disabled");
			if(data.success=="no"){
				alert('保存失败');
			}else if(data.success=="yes"){
			    
			   window.location.href="/admin/product_list";
				 
			}
			
		},"json");
		return false;			
	}
}); 
  
  $('#new_price').click(function(){
  	var material_id = parseInt($('#jd_material_id').val());
  	var material    = $('#jd_material_id').find("option:selected").text();
  	var size_id = parseInt($('#jd_size_id').val());
  	var size    = $('#jd_size_id').find("option:selected").text();
  	if((size_id == 0)||(material_id == 0)){
  		alert('请选择材质和尺寸');return false;
  	}
  	var append_html = '<div class="material_size_div">';
  	    append_html+='<div class="select_html">'+material+'<input type="hidden" class="product_materials"  name="materials[]" value="'+material_id+'"/></div>';
  	    append_html+='<div class="select_html">'+size+'<input type="hidden" class="product_sizes" name="sizes[]" value="'+size_id+'"/></div>';
  	    append_html+='<input type="text" name="prices[]" style="width:70px;" class="product_prices" placeholder="请输入价格"/><input type="text" name="stocks[]" class="product_stocks" style="width:70px;margin-left:11px;" placeholder="请输入库存"/>';
  	    append_html+='<button type="button" style="margin-left: 15px;" class="btn btn-primary " onclick="remove_price(this)">删除</button></div>';
  	    $('.material_size').append(append_html);
  })

  $('#new_cailiao').click(function(){
  	var cailiao_id = parseInt($('#jd_cailiao_id').val());
  	var cailiao    = $('#jd_cailiao_id').find("option:selected").text(); 
  	if(cailiao_id == 0){
  		alert('请选择材料');return false;
  	}
  	var append_html = '<div class="material_size_div" style="margin-left:180px">';
  	    append_html+='<div class="select_html_cailiao">'+cailiao+'<input type="hidden" class="product_cailiaos" name="cailiaos[]" value="'+cailiao_id+'"/>'; 
  	    append_html+='<input type="text" name="cailiao_infos[]" class="product_cailiao_infos" style="width:270px;margin-left:11px;" placeholder="请输入材料简介"/>';
  	    append_html+='<button type="button" style="margin-left: 15px;" class="btn btn-primary " onclick="remove_price(this)">删除</button></div>';
  	    $('.cailiao_div').append(append_html);
  })

  $('#jd_designer_id').change(function(){
  	   var jd_designer_id = $(this).val();
  	    $.post('/admin/get_design_by_designer_id',{designer_id:jd_designer_id},function(data){
			$btn.removeClass("disabled");
			if(data.success=="no"){
				alert(data.msg);
			}else if(data.success=="yes"){
			    var str = '<option value="0">请选择</option>';
			    var data_length = data.msg.length;
			    for(var i=0;i<data_length;i++){
			    	str+='<option value="'+data.msg[i].js_id+'" >'+data.msg[i].js_name+'</option>';
			    }
			    $('#jd_design_id').html(str);
			}
			
		},"json");
  })
  
});




function remove_price(price){
	$(price).parents('.material_size_div').remove();
}
</script>

</head>
<body>
<div class="main-title">
		<h3>商品管理</h3>
	</div>
<form id="changpwdform" class="form-horizontal" action="#" >	
	<input type="hidden" name="jd_id" value="<?php if(isset($product)){ echo $product->jd_id;} ?>" />
	
	<div class="control-group">
		<label class="control-label"  for="keyword">商品名称<span class="maroon">*</span>：</label>
		<div class="controls">
		  <input type="text" value="<?php if(isset($product)){ echo $product->jd_name;}?>" name="jd_name"/>
		</div>
	</div>
	
	<div class="control-group">
	<label class="control-label"  for="keyword">商品货号<span class="maroon">*</span>：</label>
		<div class="controls">
		 <input type="text" id="jd_no" value="<?php if(isset($product)){echo $product->jd_no; }?>" name="jd_no"/>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">商品首图<span class="maroon">*</span>：</label> 
		<div class="controls">
			<div class="cover-area">
				<div class="cover-hd" >
					<input id="file_upload2" name="file_upload2"  class="file_upload" type="file" />
					<input id="jd_index_pic_hidden" style="width:300px;display: none;" class="cover-input" value="<?php  if (isset($product)){ echo $product->jd_index_pic; }?>" name="jd_index_pic" type="text" />
				</div>
				<p class="img-area cover-bd" >
				  <img src="<?php if (isset($product)){ echo $product->jd_index_pic;}?>" <?php if (!isset($product)){?>style="display:none;"<?php }?> >
				  <a href="javascript:;" <?php if (!isset($product)){ ?>style="display: none;"<?php }?> class="vb cover-del">删除</a>
				</p>
			</div>
		</div>
		</div>
	</div>


	<div class="control-group">
	<label class="control-label"  for="keyword">商品详细图<span class="maroon">*</span>：</label> 
	<div class="controls">
			<div class="cover-area">
				<div class="cover-hd" >
					<input id="jd_detail_pic" name="file_upload2"  class="file_upload multiple_img " type="file" />
					<input id="jd_detail_pic_hidden" style="width:300px;display: none;" class="cover-input" value="<?php  if (isset($product)){ echo $product->jd_detail_pic; }?>" name="jd_detail_pic" type="text" />
				</div>
				<p class="img-area cover-bd" >
				   <?php if (isset($product)){ foreach ($product->jd_detail_pics as $key => $value) {?>
				  <img src="<?php echo $value;?>" >
				  <?php }}else{?>
				  <img src="" >
				  <?php }?>
				  <a href="javascript:;"  <?php if (!isset($product)){ ?>style="display: none;"<?php }?> class="vb cover-del">删除</a>
				</p>
			</div>
		</div>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">商品试戴图：</label> 
	<div class="controls">
			<div class="cover-area">
				<div class="cover-hd" >
					<input id="jd_try_pic" name="jd_try_pic"  class="file_upload" type="file" />
					<input id="jd_try_pic_hidden" style="width:300px;display: none;" class="cover-input" value="<?php  if (isset($product)){ echo $product->jd_try_pic; }?>" name="jd_try_pic" type="text" />
				</div>
				<p class="img-area cover-bd" >
				  <img src="<?php if (isset($product)){ echo $product->jd_try_pic;}?>" <?php if (!isset($product)){?>style="display:none;"<?php }?> >
				  <a href="javascript:;" <?php if (!isset($product)){ ?>style="display: none;"<?php }?> class="vb cover-del">删除</a>
				</p>
			</div>
		</div>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">APP商城图片：</label> 
	<div class="controls">
			<div class="cover-area">
				<div class="cover-hd" >
					<input id="jd_app_pic" name="jd_app_pic"  class="file_upload" type="file" />
					<input id="jd_app_pic_hidden" style="width:300px;display: none;" class="cover-input" value="<?php  if (isset($product)){ echo $product->jd_app_pic; }?>" name="jd_app_pic" type="text" />
				</div>
				<p class="img-area cover-bd" >
				  <img src="<?php if (isset($product)){ echo $product->jd_app_pic;}?>" <?php if (!isset($product)){?>style="display:none;"<?php }?> >
				  <a href="javascript:;" <?php if (!isset($product)){ ?>style="display: none;"<?php }?> class="vb cover-del">删除</a>
				</p>
			</div>
		</div>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">商品价格<span class="maroon">*</span>：</label>
		<div class="controls">
		 <span>材质:</span>
		 <select name="jd_material_id" id="jd_material_id">
		 	<option value="0">请选择</option>
		 	<?php if($materials){
		 			foreach($materials as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jc_id;?>"  ><?php echo $v->jc_field_one;?></option>
		 	<?php }
		 			}?>
		 </select>
		 <span style="margin-left: 10px;">尺码:</span>
		 <select name="jd_size_id" id="jd_size_id">
		 	<option value="0">请选择</option>
		 	<?php if($sizes){
		 			foreach($sizes as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jc_id;?>"><?php echo $v->jc_field_one;?></option>
		 	<?php }
		 			}?>
		 </select>
		 <button type="button" style="margin-left: 10px;" class="btn btn-primary " id="new_price">新增</button>
		</div>
		<div class="material_size"> 
		<?php if(isset($product)){ foreach ($product_price_stocks as $k => $v) {?>
			<div class="material_size_div">
				<div class="select_html"><?php echo $v->material_name;?><input type="hidden" value="<?php echo $v->jp_mid;?>" name="materials[]" class="product_materials"></div>
				<div class="select_html"><?php echo $v->size_name;?><input type="hidden" value="<?php echo $v->jp_sid;?>" name="sizes[]" class="product_sizes"></div>
				<input type="text" placeholder="请输入价格" class="product_prices" style="width:70px;" name="prices[]" value="<?php echo $v->jp_price;?>">
				<input type="text" placeholder="请输入库存" style="width:70px;margin-left:11px;" class="product_stocks" name="stocks[]" value="<?php echo $v->jp_stock;?>">
				<button onclick="remove_price(this)" class="btn btn-primary " style="margin-left: 15px;" type="button">删除</button>
			 </div>
		<?php }}?>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">商品类型<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="jd_cate_id" id="jd_cate_id">
		 	<option value="">请选择</option>
		 	<?php if($cates){
		 			foreach($cates as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jc_id;?>" <?php if(isset($product)&&($product->jd_cate_id == $v->jc_id)){ ?>selected<?php }?> ><?php echo $v->jc_field_one;?></option>
		 	<?php }
		 			}?>
		 </select>
		</div>
	</div>
	
	<div class="control-group">
	<label class="control-label"  for="keyword">商品风格<span class="maroon">*</span>：</label>
		<div class="controls">
		 <select name="jd_style_id" id="jd_style_id">
		 	<option value="">请选择</option>
		 	<?php if($styles){
		 			foreach($styles as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jc_id;?>" <?php if(isset($product)&&($product->jd_style_id == $v->jc_id)){ ?>selected<?php }?> ><?php echo $v->jc_field_one;?></option>
		 	<?php }
		 			}?>
		 </select>
		</div>
	</div>


	<div class="control-group">
	<label class="control-label"  for="keyword">设计师品牌：</label>
		<div class="controls">
		 <select name="jd_designer_id" id="jd_designer_id">
		 	<option value="">请选择</option>
		 	<?php if($designers){
		 			foreach($designers as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jd_id;?>" <?php if(isset($product)&&($product->jd_designer_id == $v->jd_id)){ ?>selected<?php }?> ><?php echo $v->jd_brand;?></option>
		 	<?php }
		 			}?>
		 </select>
		</div>
	</div>

	<div class="control-group">
	<label class="control-label"  for="keyword">设计系列：</label>
		<div class="controls">
		 <select name="jd_design_id" id="jd_design_id">
		 	<option value="0">请选择</option>
		 	<?php if($designs&&isset($product)){
		 			foreach($designs as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->js_id;?>" <?php if(isset($product)&&($product->jd_sub_design_id == $v->js_id)){ ?>selected<?php }?> ><?php echo $v->js_name;?></option>
		 	<?php }
		 			}?>
		 </select>
		</div>
	</div>

	 
<div class="control-group">
	<label class="control-label"  for="keyword">材料简介：</label>
		<div class="controls">
		  <select name="jd_cailiao_id" id="jd_cailiao_id">
		 	<option value="0">请选择</option>
		 	<?php if($cailiaos){
		 			foreach($cailiaos as $k=>$v){
		 	?>
		 		<option value="<?php echo $v->jc_id;?>"  ><?php echo $v->jc_field_one;?></option>
		 	<?php }
		 			}?>
		 </select>
		 <button type="button" style="margin-left: 10px;" class="btn btn-primary " id="new_cailiao">新增</button>
		</div>
		<div class="cailiao_div"> 
			<?php if(isset($product)){ foreach ($product_cailiaos as $k => $v) {?>
			 <div class="material_size_div" style="margin-left: 180px;">
			   <?php echo $v->cailiao_name;?><input type="hidden" value="<?php echo $v->jp_cid;?>" name="cailiaos[]" class="product_cailiaos">
			   <input type="text" placeholder="请输入材料简介" style="width:270px;margin-left:11px;" class="product_cailiao_infos" name="cailiao_infos[]" value="<?php echo $v->jp_cinfo;?>">
			   <button onclick="remove_price(this)" class="btn btn-primary " style="margin-left: 15px;" type="button">删除</button>
			 </div>
			<?php }}?>
		</div>
	</div>

<div class="control-group">
   <input type="hidden" value="content_editor1" id="editor_index">
	<label class="control-label"  for="keyword">商品简介：</label>
		<div class="controls content_editor" id="content_editor1">
		  <script type="text/plain" id="editor" style="width: 498px;"><?php if(isset($product)){echo trim($product->jd_desc);  }?></script>
		</div>
		<button type="button" style="margin-left: 10px;float: left;" class="btn btn-primary new_editors" >编辑</button>
	</div>	
	

<div class="control-group">
	<label class="control-label"  for="keyword">送货时间简介：</label>
		<div class="controls content_editor" id="content_editor2">
		   <?php if(isset($product)){echo trim($product->jd_shipping_time);  }?>
		</div><button type="button" style="margin-left: 10px;float: left;" class="btn btn-primary new_editors" >编辑</button>
	</div>	
  
<div class="control-group">
	<label class="control-label"  for="keyword">所属活动：</label>
		<div class="controls">
		 <?php if($events){ foreach ($events as $key => $value) { echo $value->je_name;?>

		 	 <input type="checkbox"  value="<?php echo $value->je_id; ?>" name="jd_event_ids"  <?php if(isset($product)&&in_array($value->je_id,$event_ids)){?>checked<?php }?>/>&nbsp;&nbsp;
		 <?php }}?>
		
		</div>
</div>	


<div class="control-group">
	<label class="control-label"  for="keyword">排序：</label>
		<div class="controls">
		 <input type="text" id="jd_display_order" value="<?php if(isset($product)){echo $product->jd_display_order; }?>" name="jd_display_order"/>
		</div>
	</div>

<div class="control-group">
	<label class="control-label"  for="keyword">推荐首页：</label>
		<div class="controls">
		 <input type="checkbox" id="jd_recommended" <?php if(isset($product)&&$product->jd_recommended){ ?>checked<?php }?> value="1" name="jd_recommended"/>
		</div>
	</div>
<div class="control-group">
	<label class="control-label"  for="keyword">APP商城轮播：</label>
		<div class="controls">
		 <input type="checkbox" id="jd_app_recommended" <?php if(isset($product)&&$product->jd_app_recommended){ ?>checked<?php }?> value="1" name="jd_app_recommended"/>
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


	 $('.new_editors').click(function(e){
        var $target = $(this).prev('.content_editor');
        var content = $.trim($target.html());
        var currentParnet = ue.container.parentNode.parentNode;
        var currentContent = $.trim(ue.getContent());
        $target.html('');
        $target.append(ue.container.parentNode);
        ue.reset();
        setTimeout(function(){
            ue.setContent(content);
        },200)
        $(currentParnet).html(currentContent);
        $('#editor_index').val($target.attr('id'));
    })
</script>
</body>
</html>