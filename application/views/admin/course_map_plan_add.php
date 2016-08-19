<?php $this->load->view('admin/common_header');?>

<link rel="stylesheet" href="/static/css/appmsg.css" media="screen" />
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
<style type="text/css">
  #file_name_upload{
    height: 30px;
    width: auto;
  }
  .cover-bd{
    font-size:14px;
  }
</style>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $title;?>设置</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                    <input type="hidden" id="id" value="<?php if($instrument){echo $instrument->id;}?>">


                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">乐器 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="instrument_id" id="instrument_id">
                           <?php foreach($instruments as $k=>$v){ ?>
                              <option value="<?php echo $v->id;?>" <?php if($instrument && ($instrument->instrument_id == $v->id)){ ?> selected<?php }?>><?php echo $v->name;?></option>
                           <?php }?>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">文件 <span class="required">*</span>
                      </label>
                      <div class="cover-area col-md-6 col-sm-6 col-xs-12">
                        <div class="cover-hd ">
                          <input id="file_upload" class="file_upload" name="file_upload" type="file" />
                          <input id="coverurl" value="<?php if ($instrument){ echo $instrument->url;}?>" name="coverurl" type="hidden" />
                          <input id="file_name" value="<?php if ($instrument){ echo $instrument->file_name;}?>" name="file_name" type="hidden" />
                        </div>
                        <div id="imgArea" class="cover-bd" <?php if(!$instrument){?>style="display: none;"<?php }?>>
                         <div id="file_name_upload"></div>
                          <a href="javascript:;" class="vb cover-del" id="delImg">删除</a>
                        </div>
                      </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">保存</button>
                        <button class="btn btn-primary form_cancel" type="button">返回</button>
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
            $('#imgArea').show();
            $('#file_name').val(jsonData.fileName);
            $("#file_name_upload").html(jsonData.fileName).show();
            $("#coverurl").val(jsonData.fileUrl);
          }
      });
    });

   $("#delImg").click(function(){
    $('#imgArea').hide();
     $("#file_name_upload").html('');
     $("#coverurl").val('');
   });

    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit){
        var coverurl = $("#coverurl").val();
        var instrument_id = $('#instrument_id').val();
        var file_name = $('#file_name').val();
        var id = $('#id').val();
        var submitData = {
                id: id,
                coverurl:coverurl,
                instrument_id:instrument_id,
                file_name:file_name,
                type: '<?php echo $type;?>'
        };

        $.post('/admin/course_map_plan_add', submitData,function(data) {
            if (data.success == 'yes') {
                show_stack_modal('success',data.msg);
                location.href = "/admin/course_map_plan_list/<?php echo $type;?>";
            }  else{
                show_stack_modal('error','保存失败');
            }
        },"json");
    }
      return false;
    });
  </script>
<?php $this->load->view('admin/common_footer');?>