<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/resource/css/admin/admin.css" media="screen" />    
<script type="text/javascript" src="/resource/js/jquery-1.7.2.min.js"></script> 
 
  
<title>快递地址管理</title> 
<style>
  .search_time{
  	width: 100px;
  }
</style>
<script>
 $(function(){
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

 
	$("#search_code").click(function(){
			var nickname  = $("#nickname").val();
			var receiver  = $("#receiver").val();
			var receiver_mobile = $('#receiver_mobile').val(); 
			var province = $('#province').val();
			var city = $('#city').val(); 

			var submitData= {
				nickname:nickname,
				receiver:receiver,
				receiver_mobile:receiver_mobile, 
				province:province,  
				city:city

			};
			$.post('/admin/shipping_address_list/1',submitData,function(data){
        	 
				if(data.success=="no")
				{
                    alert(data.msg);
				}else{
					window.location.href='/admin/shipping_address_list/1';
			    } 
			  
				
			},"json");
			 
		});


	  $("#reset_code").click(function(){
		 
			var submitData= {
				nickname:'',
				receiver:'',
				receiver_mobile:'', 
				province:0,  
				city:0

			};
			$.post('/admin/shipping_address_list/1',submitData,function(data){
    	 
				if(data.success=="no")
				{
           	      alert(data.msg);
				}else{
					window.location.href="/admin/shipping_address_list";
			    } 
			  
				
			},"json");
			 
		});	

 	$('.delete_configs').click(function(){
 		var jd_id = $(this).attr('data_id'); 
 		if(confirm('您确定要删除此条数据吗？')){
 			var submitData = {val:jd_id,table:'shipping_address','field':'js_id'};
 			$.post('/admin/data_delete', submitData,function(data) {
					 
					if (data.success == 'yes') {
					    alert(data.msg);
						location.href = "/admin/shipping_address_list";
					}  else{
							alert("删除失败");						 
					}
				},"json");
 		}
 	})
 })
 </script>
</head>
<body>
	<div class="main-title">
		<h3>快递地址管理</h3> 
	</div> 
		 <div id="sn_form" class="form-horizontal">
			<div class="control-group">
		    	<div class="controls">
		    	    昵称：<input type="text" name="nickname" id="nickname" value='<?php if($search_flag){ echo $nickname;}?>' /> 
		    	    收件人：<input type="text" name="receiver" id="receiver" value='<?php if($search_flag){ echo $receiver;}?>' />
		    	    收件手机：<input type="text" name="receiver_mobile" id="receiver_mobile" value='<?php if($search_flag){ echo $receiver_mobile;}?>' /><br/><br/>
		    	    
		    	    省： 
		    	    <select id="province"  class="element_input" name="province" >  
                 <option value="0">请选择</option>
                 <?php foreach($province as $k=>$v){?>
                   <option value="<?php echo $v->province_id;?>" <?php if(($v->province_id == $select_province)&&$search_flag){?>selected<?php }?>><?php echo $v->province;?></option>
                 <?php }?>
              </select>
              	    市：
	              <select id="city"  class="element_input" name="city">  
	                 <option value="0">请选择</option>
	                 <?php if($province){ foreach($citys as $k=>$v){?>
	                   <option value="<?php echo $v->city_id;?>" <?php if(($city == $v->city_id)&&$search_flag){?>selected<?php }?>><?php echo $v->city?></option>
	                 <?php } }?> 
	              </select> 
			    	<button class="btn btn-primary" id="search_code">查询</button>
			    	<button class="btn btn-primary" id="reset_code">重置</button>
		    	</div>
		  	</div>
		</div>	
  
 <div>
	<table class="table table-hover table-striped" style="font-size:11px;clear:both;">
		<thead>
			<tr >
			    <th>用户昵称</th>  
				<th>收件人</th> 
				<th>收件人省市区</th>
				<th>收件人地址</th>
				<th>收件人手机</th> 
				<th>默认地址</th> 
				<th>操作</th>   
			</tr>
		</thead>
		<tbody id="table_body">
		<?php foreach ($address as $key=>$val){?>
			<tr> 
				 <td><?php echo $val->ju_nickname;?></td> 
				 <td><?php echo $val->js_username;?></td>
				 <td><?php echo $val->province.' '.$val->city.' '.$val->area;?></td>
				 <td><?php echo $val->js_address;?></td>
				 <td><?php echo $val->js_mobile;?></td> 
				 <td><?php if($val->js_default_address){ echo '是';}else{echo '否';}?></td> 
				 <td><a href="/admin/shipping_address_edit/<?php echo $val->js_id;?>" class="edit_configs">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" class="delete_configs" data_id="<?php echo $val->js_id;?>">删除</a></td> 
			</tr>
		<?php }?>
			
		
		</tbody>
	</table>
</div>	
<?php echo $this->load->view('admin/pagination',array('current_page'=>$current_page,'total'=>$total,'url'=>'/admin/shipping_address_list/'));?>
</body></html>