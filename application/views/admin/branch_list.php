<?php $this->load->view('admin/common_header');?>
  <link href="/static/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />

 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>教学点管理</h2>

                  <a class="btn btn-success navbar-right btn-xs" href="/admin/branch_add">新增</a>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                    <thead>
                      <tr >
          						  <th>中文名</th>
          							<th>英文名</th>
          							<th>中文地址</th>
          							<th>英文地址</th>
          							<th>联系电话</th>
          							<th>操作</th>
          						</tr>
                    </thead>
                    <tbody>
                      <?php foreach ($branchs as $key=>$val){?>
							<tr>
								 <td><?php echo $val->name;?></td>
								 <td><?php echo $val->en_name;?></td>
								 <td><?php echo $val->address;?></td>
								 <td><?php echo $val->en_address;?></td>
								 <td><?php echo $val->mobile;?></td>
								 <td><a href="/admin/branch_add/<?php echo $val->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>&nbsp;修改</a>
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
 			var submitData = {id:jd_id,table:'branch'};
 			$.post('/admin/data_delete', submitData,function(data) {
					if (data.success == 'yes') {

             			 show_stack_modal('success',data.msg);
						location.href = "/admin/branch_list";
					}  else{
							show_stack_modal('error','操作失败');
					}
				},"json");
 		}
 	})
 })
 </script>
<?php $this->load->view('admin/common_footer');?>