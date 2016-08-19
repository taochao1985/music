<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/resource/css/admin/admin.css" media="screen" />   
<link rel="stylesheet" href="/resource/css/plugin/jquery-ui-timepicker-addon.css" media="screen" />
<script type="text/javascript" src="/resource/js/jquery-1.7.2.min.js"></script> 
<link rel="stylesheet" href="/resource/css/admin/tip-skyblue.css" media="screen" /> 
  
<title>系统消息管理</title> 
 
</head>
<body>
	<div class="main-title">
		<h3>系统消息管理</h3>
	</div>
	<div class="tb-toolbar"> 
		<a class="btn btn-small btn-primary" href="/admin/system_messages_add">新增</a>		 
	</div>
		 
  
 <div  >
	<table class="table table-hover table-striped" style="font-size:11px;clear:both;">
		<thead>
			<tr >
			    <th>标题</th>
				<th>发送用户</th>    
				<th>发送时间</th>   
			</tr>
		</thead>
		<tbody id="table_body">
		<?php foreach ($messages as $key=>$val){?>
			<tr> 
				 <td><?php echo $val->js_title;?></td> 
				 <td><?php echo $user_level[$val->js_user_type];?></td>
				 <td><?php echo $val->js_created;?></td> 
			</tr>
		<?php }?>
			
		
		</tbody>
	</table>
</div>	
<?php echo $this->load->view('admin/pagination',array('current_page'=>$current_page,'total'=>$total,'url'=>'/admin/system_messages/'));?> 
</body></html>