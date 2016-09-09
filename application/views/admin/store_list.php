<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>


<title>分店管理</title>
<style>
  .search_time{
  	width: 100px;
  }
</style>
<script>
 $(function(){
  	$('.delete_configs').click(function(){
 		var config_id = $(this).attr('data_id');
 		if(confirm('您确定要删除此条数据吗？')){
 			var submitData = {table:'store',id:config_id};
 			$.post('/admin/data_delete', submitData,function(data) {

					if (data.success == 'yes') {
					    alert(data.msg);
						location.href = "/admin/store_list";
					}  else{
							alert("保存失败");
					}
				},"json");
 		}
 	})
 })
 </script>
</head>
<body>
	<div class="main-title">
		<h3>分店管理</h3>
	</div>
<div class="tb-toolbar" <?php if($admin->level){?>style="display:none;"<?php }?>>
		<a class="btn btn-small btn-primary" href="/admin/store_add">新增</a>
	</div>
 <div  >
	<table class="table table-hover table-striped" style="font-size:11px;clear:both;">
		<thead>
			<tr >
				<th>店名</th>
				<th>负责人</th>
				<th>座机</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody id="table_body">
		<?php foreach ($store as $key=>$val){?>
			<tr>
				 <td><?php echo $val->name;?></td>
				 <td><?php echo $val->chairman;?></td>
				 <td><?php echo $val->phone;?></td>

				 <td><a href="/admin/store_add/<?php echo $val->id;?>">修改</a>
				 <?php if(!$admin->level){?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" class="delete_configs" data_id="<?php echo $val->id;?>">删除</a>
				 <?php }?>
				</td>
			</tr>
		<?php }?>


		</tbody>
	</table>
</div>
<?php  if(!$admin->level){$this->load->view('admin/pagination',array('current_page'=>$current_page,'total'=>$total,'url'=>'/admin/store_list/'));}?>

</body></html>