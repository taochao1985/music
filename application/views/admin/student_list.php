<?php $this->load->view('admin/common_header');?>
  <link href="/static/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />

 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>学生管理</h2>


                </div>

                <div class="x_content">
                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                    <thead>
                      	<tr >
						    <th>用户名</th>
                <th>姓名(CH)</th>
							<th>性别</th>
							<th>年龄</th>
              <th>乐器</th>
              <th>班级编号</th>
							<th>电子邮箱</th>
							<th>联系电话</th>
							<th>操作</th>
						</tr>
                    </thead>
                    <tbody>
                      <?php foreach ($students as $key=>$val){?>
							<tr>
								 <td><?php echo $val->username;?></td>
                 <td><?php echo $val->name;?></td>
								 <td><?php echo $val->gender?'男':'女';?></td>
								 <td><?php echo $val->age;?></td>
                 <td><?php echo $val->instrument_name;?></td>
                 <td><?php echo $val->class_numbe;?></td>
								 <td><?php echo $val->email;?></td>
								 <td><?php echo $val->mobile;?></td>
								 <td><a href="/admin/student_add/<?php echo $val->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>&nbsp;修改</a>
								 <a href="javascript:void(0)" class="btn btn-danger btn-xs delete_configs" data_id="<?php echo $val->id;?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                 <a class="btn btn-success btn-xs" href="/admin/student_roll_call/<?php echo $val->id;?>/<?php echo $val->class_id;?>" >点名记录</a>

                 </td>
							</tr>
						<?php }?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    <script src="/static/js/datatables/jquery.dataTables.min.js"></script>

    <script src="/static/js/datatables/dataTables.bootstrap.js"></script>
    <script src="/static/js/datatables/dataTables.fixedHeader.min.js"></script>
<script>
 $(function(){
 	var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
 	$('.delete_configs').click(function(){
 		var jd_id = $(this).attr('data_id');
 		if(confirm('您确定要删除此条数据吗？')){
 			var submitData = {id:jd_id,table:'student'};
 			$.post('/admin/data_delete', submitData,function(data) {
					if (data.success == 'yes') {

            show_stack_modal('success',data.msg);
						location.href = "/admin/student_list";
					}  else{
							show_stack_modal('error','操作失败');
					}
				},"json");
 		}
 	})
 })
 </script>



  <script src="/static/js/bootstrap.min.js"></script>
  <script src="/static/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="/static/js/icheck/icheck.min.js"></script>
  <script src="/static/js/custom.js"></script>
  <script type="text/javascript" src="/static/js/notify/pnotify.core.js"></script>
  <script type="text/javascript" src="/static/js/notify/pnotify.buttons.js"></script>
  <script type="text/javascript" src="/static/js/notify/pnotify.nonblock.js"></script>
</body>

</html>