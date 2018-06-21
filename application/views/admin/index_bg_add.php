<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>新增首页图片</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">

                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">图片</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
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
                    </div>

                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success btn_save" type="button">保存</button>
                        <button class="btn btn-primary form_go_back" type="button">返回</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

  <script type="text/javascript">
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

  $(".btn_save").click(function(){
      var img_url = $.trim($("#coverurl").val());
      var submitData = {img_url:img_url};
 			$.post('/admin/index_bg_add', submitData,function(data) {

					if (data.success == 'yes') {

              show_stack_modal('success',data.msg);
						window.location.href = "/admin/index_bg_list";
					}  else{
							show_stack_modal('error','操作失败');
					}
				},"json");
  });
  </script>
<?php $this->load->view('admin/common_footer');?>
