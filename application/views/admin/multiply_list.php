<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/appmsg.css" media="screen" />
<link rel="stylesheet" href="/static/css/appmsg-mul.css" media="screen" />
 <style type="text/css">
.msg-item-wrapper{
    margin-bottom: 6px;
}
.msg-preview{
    float: left;
}
 </style>
<script>
 $(function(){
    $('.delete_configs').click(function(){
        var jd_id = $(this).attr('data_id');
        if(confirm('您确定要删除此条数据吗？')){
            var submitData = {id:jd_id,table:'materials'};
            $.post('/admin/data_delete', submitData,function(data) {

                    if (data.success == 'yes') {
                        show_stack_modal('success',data.msg);
                        common_go_next('/admin/multiply_list');
                    }  else{
                       show_stack_modal('error','保存失败');
                    }
                },"json");
        }
    })
 })
 </script>
 <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>多图文消息管理</h2>

                  <a class="btn btn-success navbar-right btn-xs" href="/admin/multiply_material_manage">新增</a>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
 <?php foreach ($materials as $key => $value) {$material = $value->content;?>
    <div class="span5 msg-preview col-md-4 col-sm-4 col-xs-12">
            <div class="msg-item-wrapper">
                <div id="appmsgItem1" class="appmsgItem msg-item">
                    <p class="msg-meta">
                        <span class="msg-date"><?php if ($material){ echo $materials[0]->createtime;}?></span>
                    </p>
                    <div class="cover">
                        <p class="default-tip" <?php if ($material){?> style="display:none;"<?php }?>>封面图片</p>
                        <h4 class="msg-t">
                            <span class="i-title"><?php if ($material){ echo $material[0]['title'];}else{?>标题<?php }?></span>
                        </h4>

                        <img class="i-img" <?php if ($material){ ?>src="<?php echo $material[0]['coverurl'];}?>" style="">
                    </div>

                     </div>
     <?php foreach ($material as $key => $val) { if($key >0){?>
            <div class="rel sub-msg-item appmsgItem">
                    <span class="thumb-new">
                    <img src="<?php echo $val['coverurl'];?>" class="i-img">
                    </span>
                    <h4 class="msg-t">
                    <span class="i-title"><?php echo $val['title'];?></span>
                    </h4>

                </div>
     <?php }}?>
            </div>
            <div class="control-group">
                        <div class="controls">
                          <button onclick="location.href='/admin/multiply_material_manage/<?php echo $value->id;?>'" type="button" class="btn btn-success">修改</button>
                          <button data_id = "<?php echo $value->id;?>" type="button" class="delete_configs btn btn-primary">删除</button>
                        </div>
            </div>
        </div>
    <?php }?>
</div>
</div>
</div>

<?php $this->load->view('admin/common_footer');?>
