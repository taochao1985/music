<?php $this->load->view('admin/common_header');?>
  <link href="/static/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />

 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>试听管理</h2>

                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                    <thead>
                      <tr >
          						  <th>姓名</th>
          							<th>手机</th>
          							<th>乐器</th>
          							<th>操作</th>
          						</tr>
                    </thead>
                    <tbody>
                      <?php foreach ($history as $key=>$val){?>
          							<tr>
          								 <td><?php echo $val->name;?></td>
          								 <td><?php echo $val->mobile;?></td>
          								 <td><?php echo $val->instrument;?></td>
          								 <td>
          								     <a href="javascript:void(0)" class="btn btn-danger btn-xs delete_configs" data_id="<?php echo $val->id;?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a></td>
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
 			var submitData = {id:jd_id,table:'listen_history'};
 			$.post('/admin/data_delete', submitData,function(data) {
					if (data.success == 'yes') {

             			 show_stack_modal('success',data.msg);
						location.href = "/admin/listen_list";
					}  else{
							show_stack_modal('error','操作失败');
					}
				},"json");
 		}
 	})
 })
 </script>
<?php $this->load->view('admin/common_footer');?>
