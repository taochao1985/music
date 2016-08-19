<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="/asset/resource/css/admin/tip-skyblue.css" media="screen" />

<title>选课管理</title>
<script>
 $(function(){
 	$("#search_code").click(function(){
		var keywords  = $("#keywords").val();
		var submitData= {
				        keywords:keywords
				        };
		$.post('/admin/student_pick_course/<?php echo $student_id;?>/',submitData,function(data){

			if(data.success=="no")
			{
                alert(data.msg);
			}else{
				window.location.href="/admin/student_pick_course/<?php echo $student_id;?>";
		    }


		},"json");
	});

    $("#reset_code").click(function(){

    	var submitData= {keywords:''};
		$.post('/admin/student_pick_course/<?php echo $student_id;?>',submitData,function(data){

			if(data.success=="no")
			{
                alert(data.msg);
			}else{
				window.location.href="/admin/student_pick_course/<?php echo $student_id;?>";
		    }


		},"json");
	});

	$('.select_course').click(function(){
		var course_id = '';
        $("input[type=checkbox][name=course_id]").each(function(){
            if($(this).prop("checked")){
                course_id += $(this).val()+',';
            }
        });
        if(confirm('确定缺课吗？')){
        	var submitData= {course_id:course_id,student_id:'<?php echo $student_id;?>'};
			$.post('/admin/student_pick_course',submitData,function(data){
				 alert(data.msg);
				if(data.success=="no")
				{
	               return false;
				}else{
					window.location.href="/admin/student_list;?>";
			    }


			},"json");
        }
	})
 })
 </script>
</head>
<body>
	<div class="main-title">
		<h3>选课管理</h3>
	</div>
		<div id="sn_form" class="form-horizontal">
			<div class="control-group">
		    	<div class="controls">
		    	    课程名：<input type="text" name="keywords" id="keywords" value='<?php if($keywords){ echo $keywords;}?>' />
			    	<button class="btn btn-primary" id="search_code">查询</button>
			    	<button class="btn btn-primary" id="reset_code">重置</button>
		    	</div>
		  	</div>
	</div>
	<div class="tb-toolbar">
		<a class="btn btn-small btn-primary select_course" href="javascript:void(0)">选定</a>
	</div>


 <div  >
	<table class="table table-hover table-striped" style="font-size:11px;clear:both;">
		<thead>
			<tr >
			    <th>选择</th>
			    <th>课程名</th>
				<th>学费</th>
				<th>开课时间</th>
				<th>结束时间</th>
				<th>课时</th>
			</tr>
		</thead>
		<tbody id="table_body">
		<?php foreach ($course as $key=>$val){?>
			<tr>
			     <td><input type="checkbox" value="<?php echo $val->id;?>" name="course_id"></td>
				 <td><?php echo $val->name;?></td>
				 <td><?php echo $val->money;?></td>
				 <td><?php echo $val->start_date;?></td>
				 <td><?php echo $val->end_date;?></td>
				 <td><?php echo $val->course_num;?></td>
			 </tr>
		<?php }?>


		</tbody>
	</table>
</div>
</body></html>