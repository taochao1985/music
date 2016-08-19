<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="/asset/resource/css/admin/tip-skyblue.css" media="screen" />

<title>上课管理</title>
<script>
 $(function(){

	$('.btn-primary').click(function(){
		var student_course_id = $(this).attr('data_id');
		var course_num = $.trim($(this).prev('input').val());
        if(confirm('确定操作吗？')){
        	var submitData= {
        		course_num:course_num,
        		student_course_id:student_course_id,
        		student_id:'<?php echo $student_id;?>'
        	};
			$.post('/admin/student_get_course',submitData,function(data){
				 alert(data.msg);
				if(data.success=="no")
				{
	               return false;
				}else{
					window.location.href="/admin/student_list";
			    }


			},"json");
        }
	})
 })
 </script>
</head>
<body>
	<div class="main-title">
		<h3>上课管理----姓名：<?php if($data){ echo $data[0]->name;}?></h3>
	</div>
<div class="tb-toolbar">
		<a class="btn btn-small btn-normal" href="javascript:void(0)" onclick="history.go(-1);">返回</a>
	</div>
 <div  >
 <div>
	<table class="table table-hover table-striped" style="font-size:11px;clear:both;">
		<thead>
			<tr >
			    <th>课程名</th>
				<th>学费</th>
				<th>开课时间</th>
				<th>结束时间</th>
				<th>总课时</th>
				<th>剩余课时</th>
				<th>选课时间</th>
				<td>操作</td>
			</tr>
		</thead>
		<tbody id="table_body">
		<?php if($data){foreach ($data as $key=>$val){?>
			<tr>
				 <td><?php echo $val->course_name;?></td>
				 <td><?php echo $val->money;?></td>
				 <td><?php echo $val->start_date;?></td>
				 <td><?php echo $val->end_date;?></td>
				 <td><?php echo $val->course_num;?></td>
				 <td><?php echo $val->left_num;?></td>
				 <td><?php echo $val->created;?></td>
				 <td>课时:&nbsp;&nbsp;<input type="input" style="width:30px;text-align:center;" value="1" name="course_num" >&nbsp;&nbsp;&nbsp;&nbsp;
				 <button  class="btn btn-primary btn-small" data_id="<?php echo $val->id;?>" type="button" >保存</button></td>
			 </tr>
		<?php }}else{?>
		 <tr><td colspan="8" align="center">暂未选任何课程</td></tr>
		<?php }?>


		</tbody>
	</table>
</div>
</body></html>