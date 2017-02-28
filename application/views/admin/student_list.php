<?php $this->load->view('admin/common_header');?>
  <link href="/static/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="/static/js/jQuery.print.js"></script>
<style>
.no-border{
  border:0 !important;
}
.student_print{
  position: absolute;
  z-index: -1;
}
</style>
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
							<tr data_student_num = "<?php echo $val->numbe;?>">
								 <td><?php echo $val->username;?></td>
                 <td><?php echo $val->name;?></td>
								 <td><?php echo $val->gender?'男':'女';?></td>
								 <td><?php echo $val->age;?></td>
                 <td><?php echo $val->instrument_name;?></td>
                 <td><?php echo $val->class_numbe;?></td>
								 <td><?php echo $val->email;?></td>
								 <td><?php echo $val->mobile;?></td>
								 <td><a href="javascript:void(0)" class="btn btn-info btn-xs export_students"><i class="fa fa-print"></i>&nbsp;打印</a><a href="/admin/student_add/<?php echo $val->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>&nbsp;修改</a>
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
<div class="student_print"  id="print_table">
  <h1 class="text-center" style="margin-bottom:50px;">Rolling Music热迷音乐教育课程服务协议</h1>
  <h4>学生编号：<span id="student_num"></span></h4>
  <table class="table table-bordered">
      <tr>
        <td class="col-md-2">姓名</td>
        <td id="realname" class="col-md-4"></td>
        <td class="col-md-2">性别</td>
        <td id="sex" class="col-md-4"></td>
      </tr>
      <tr>
        <td>年龄</td>
        <td id="age"></td>
        <td>手机</td>
        <td id="mobile"></td>
      </tr>
      <tr>
        <td>乐器</td>
        <td id="instrument"></td>
        <td>班级编号</td>
        <td id="class_numbe"></td>
      </tr>
      <tr>
        <td colspan="4">
          本人确认，我已经阅读了“Rolling Music学生管理公约”全部内容，同时对于课程内容和形式，我已经有了充分的认识和了解，同意我本人或孩子参与并遵守课程和公约内容。
        </td>
      </tr>
      <tr>
        <td class="no-border">RM代表</td>
        <td  class="no-border"></td>
        <td  class="no-border">您的签名</td>
        <td  class="no-border"></td>
      </tr>
      <tr>
        <td  class="no-border">签订日期</td>
        <td  class="no-border">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</td>
        <td  class="no-border">签订日期</td>
        <td  class="no-border">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</td>
      </tr>
  </table>
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

  $(".export_students").click(function(){
    var $this = $(this).parents('tr');
    $("#student_num").html($this.attr('data_student_num'));
    $("#realname").html($this.children("td:eq(1)").html());
    $("#sex").html($this.children("td:eq(2)").html());
    $("#age").html($this.children("td:eq(3)").html());
    $("#mobile").html($this.children("td:eq(7)").html());
    $("#instrument").html($this.children("td:eq(4)").html());
    $("#class_numbe").html($this.children("td:eq(5)").html());
    $('#print_table').removeClass('hidden').print();
  });

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
