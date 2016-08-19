<?php $this->load->view('admin/common_header');?>
 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>基础信息管理</h2>

                  <a class="btn btn-success navbar-right btn-xs" href="/admin/base_info_add/<?php echo $type;?>">新增</a>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>中文名</th>
                      <th>英文名</th>
                      <th>排序</th>
                      <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($instrument as $key=>$val){?>
                      <tr>
                        <td><?php echo $val->name;?></td>
                        <td><?php echo $val->en_name;?></td>
                        <td><?php echo $val->display_order;?></td>
                        <td>
                            <a href="/admin/base_info_add/<?php echo $type;?>/<?php echo $val->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>&nbsp;修改</a>

                            <a href="javascript:void(0)" class="btn btn-danger btn-xs delete_configs" data_id="<?php echo $val->id;?>" ><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                            </td>
                      </tr>
                     <?php }?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

<script>
 $(function(){
  $('.delete_configs').click(function(){
    var jd_id = $(this).attr('data_id');
    if(confirm('您确定要删除此条数据吗？')){
      var submitData = {id:jd_id,table:'base_info'};
      $.post('/admin/data_delete', submitData,function(data) {
          if (data.success == 'yes') {

            show_stack_modal('success',data.msg);
            location.href = "/admin/base_info_list/<?php echo $type;?>";
          }  else{
              show_stack_modal('error','操作失败');
          }
        },"json");
    }
  })
 })
 </script>
<?php $this->load->view('admin/common_footer');?>