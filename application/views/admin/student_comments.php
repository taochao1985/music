<?php $this->load->view('admin/common_header');?>
  <link href="/static/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />

 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>学生评价</h2>

                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                    <thead>
                        <tr >
                            <th>班级编号</th>
                            <th>学生姓名(CH)</th>
                            <th>教师姓名(CH)</th>
                            <th>课次</th>
                            <th>评价内容</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($comments as $key=>$val){?>
                            <tr>
                                <td><?php echo $val->numbe;?></td>
                                <td><?php echo $val->student_name;?></td>
                                 <td><?php echo $val->teacher_name;?></td>
                                 <td><?php echo $val->lession_no;?></td>
                                <td><?php echo $val->homework_comment;?></td>

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
      <script src="/static/js/bootstrap.min.js"></script>
      <script src="/static/js/custom.js"></script>
<script>
 $(function(){
    var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });

 })
 </script>


</body>

</html>