<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="/asset/resource/css/admin/tip-skyblue.css" media="screen" />

<title>设计师管理</title>
<script>
 $(function(){
 	$('.delete_configs').click(function(){
 		var jd_id = $(this).attr('data_id');
 		if(confirm('您确定要删除此条数据吗？')){
 			var submitData = {id:jd_id,table:'course'};
 			$.post('/admin/data_delete', submitData,function(data) {

					if (data.success == 'yes') {
					    alert(data.msg);
						location.href = "/admin/course_list";
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
		<h3>课程管理</h3>
	</div>
	<?php if($admin->level <2 ){?><div class="tb-toolbar">
		<a class="btn btn-small btn-primary" href="/admin/course_add">新增</a>
	</div>
	<?php }?>


 <div  >
	<table class="table table-hover table-striped" style="font-size:11px;clear:both;">
		<thead>
			<tr >
			    <th>课程名</th>
				<th>学费</th>
				<th>开课时间</th>
				<th>结束时间</th>
				<th>课时</th>
				<?php if($admin->level <2 ){?>
				<th>操作</th>
				<?php }?>
			</tr>
		</thead>
		<tbody id="table_body">
		<?php foreach ($course as $key=>$val){?>
			<tr>
				 <td><?php echo $val->name;?></td>
				 <td><?php echo $val->money;?></td>
				 <td><?php echo $val->start_date;?></td>
				 <td><?php echo $val->end_date;?></td>
				 <td><?php echo $val->course_num;?></td>
				 <?php if($admin->level <2 ){?>
				 <td><a href="/admin/course_add/<?php echo $val->id;?>" class="edit_configs">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:void(0)" class="delete_configs" data_id="<?php echo $val->id;?>">删除</a></td>
				 <?php }?>
			</tr>
		<?php }?>


		</tbody>
	</table>
</div>
<?php  $this->load->view('admin/pagination',array('current_page'=>$current_page,'total'=>$total,'url'=>'/admin/course_list/'));?>
</body></html>