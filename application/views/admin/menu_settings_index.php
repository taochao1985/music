<?php $this->load->view('admin/common_header');?>
<script>
$(function(){
  $("#update_btn").click(function(){
  $.post('/admin/menu_update','',function(data){
        if(data.success=="yes")
        {
                    alert(data.msg);
        }

      },"json");
  })
})
</script>
 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>自定义菜单</h2>
                   <a class="btn btn-success navbar-right btn-xs" href="/admin/menu_settings_add">新增</a>
                  <a class="btn btn-success navbar-right btn-xs" id="update_btn" href="javascript:void(0)">更新菜单</a>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>菜单</th>
                      <th>菜单关键字</th>
                      <th>子菜单</th>
                      <th>子菜单关键字</th>
                      <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($menu_settings as $key=>$val){?>
                      <tr>
                        <td><?php if($val->tms_main_id!=0){ echo "|-----";} echo $val->tms_main_menu;?></td>
                        <td><?php echo $val->tms_main_key;?></td>
                        <td><?php echo $val->tms_sub_menu;?></td>
                        <td><?php echo $val->tms_sub_key;?></td>
                        <td>
                            <?php if($val->tms_main_id==0){?>
                            <a href="/admin/sub_menu_settings_add/<?php echo $val->id;?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>&nbsp;添加子菜单</a>
                            <a href="/admin/sub_menu_settings_add/<?php echo $val->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>&nbsp;修改</a>
                            <?php }else{?>
                            <a href="/admin/sub_menu_settings_add/<?php echo $val->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>&nbsp;修改</a>
                            <?php }?>
                            <a href="/admin/menu_settings_delete/<?php echo $val->id;?>" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                            </td>


                      </tr>
                     <?php }?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
<?php $this->load->view('admin/common_footer');?>