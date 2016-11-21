<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
  <link href="/static/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="/static/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>首页背景图管理</h2>

        <button class="btn btn-success navbar-right btn-xs" data-toggle="modal" data-target="#newImgModal">新增</button>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <table id="datatable-fixed-header" class="table table-striped table-bordered">
          <thead>
            	<tr >
    							<th>图片</th>
    							<th>操作</th>
  						</tr>
          </thead>
          <tbody>
            <?php foreach ($imgs as $key=>$val){?>
							<tr>
								 <td><img src="<?php echo $val->field_one;?>" width="50"></td>
								 <td>
                 <a href="javascript:void(0)" class="btn btn-danger btn-xs delete_configs" data_id="<?php echo $val->id;?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a></td>
							</tr>
						<?php }?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="newImgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">新增图片</h4>
      </div>
      <div class="modal-body">
        <div class="cover-area">
          <div class="cover-hd">
            <input id="file_upload" class="file_upload" name="file_upload" type="file" />
            <input id="coverurl" value="" name="coverurl" type="hidden" />
          </div>
          <p id="imgArea" class="cover-bd" style="display: none;">
          <img src="" id="img" style="width:50px;">
          <a href="javascript:;" class="vb cover-del" id="delImg">删除</a>
          </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary btn_save">保存</button>
      </div>
    </div>
  </div>
</div>

    <script src="/static/js/datatables/jquery.dataTables.min.js"></script>

    <script src="/static/js/datatables/dataTables.bootstrap.js"></script>
    <script src="/static/js/datatables/dataTables.fixedHeader.min.js"></script>
<script>
 $(function(){
   $('#file_upload').each(function(){
     var $fileInput = $(this);
     var $cont =  $fileInput.closest(".cont");
     var name = $fileInput.attr("name");
     $fileInput.uploadify({
       'swf'      : '/static/swf/uploadify.swf',
       'uploader' : '/uploads.php',
       'onUploadSuccess' : function(file,data,response)  {
         var jsonData = eval("("+data+")");
         $(".cover .i-img").attr("src",jsonData.fileUrl).show();
           $("#imgArea").show().find(" #img").attr("src",jsonData.fileUrl);
           $("#coverurl").val(jsonData.fileUrl);
           $(".default-tip").hide();
         }

     });
   });

   $("#delImg").click(function(){
     $(".default-tip").show();
     $("#imgArea").hide();
     $("#coverurl").val('');
     $(".cover .i-img").hide();
   });
 	var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });

  $(".btn_save").click(function(){
      var img_url = $.trim($("#coverurl").val());
      var submitData = {img_url:img_url};
 			$.post('/admin/save_index_bg', submitData,function(data) {

					if (data.success == 'yes') {

              show_stack_modal('success',data.msg);
						location.href = "/admin/index_bg_list";
					}  else{
							show_stack_modal('error','操作失败');
					}
				},"json");
  });

 	$('.delete_configs').click(function(){
 		var jd_id = $(this).attr('data_id');
 		if(confirm('您确定要删除此条数据吗？')){
 			var submitData = {id:jd_id,table:'configs'};
 			$.post('/admin/data_delete', submitData,function(data) {

					if (data.success == 'yes') {

              show_stack_modal('success',data.msg);
						location.href = "/admin/index_bg_list";
					}  else{
							show_stack_modal('error','操作失败');
					}
				},"json");
 		}
 	})
 })
 </script>
<?php $this->load->view('admin/common_footer');?>
