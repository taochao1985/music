<?php $this->load->view('admin/common_header');?>
  <link href="/static/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />

 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>学生上课记录管理</h2>

                </div>

                <div class="x_content">
                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                    <thead>
                        <tr >
                            <th>学生姓名</th>
                            <th>乐器</th>
                            <th>上课时间</th>
                            <th>是否出勤</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($class_record as $key=>$val){?>
                            <tr>
                                 <td><?php echo $student_name;?></td>
                                 <td><?php echo $instrument_name;?></td>
                                 <td><?php echo $class_info->class_week.'-'.$class_info->class_start_time.'-'.$class_info->class_end_time;?></td>
                                 <td><?php if($val->roll_flag){echo '是';}else{echo '否';}?></td>
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