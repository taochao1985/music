<?php $this->load->view('admin/common_header');?>
<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/static/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>活动维护</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="event_id" name="event_id" value="<?php if ($event){ echo $event->id; }else{?>0<?php }?>" />
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">活动类型
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="event_type" name="event_type" class="form-control">
                            <option value="0" <?php if($event &&($event->event_type == 0)){?>selected<?php }?>>近期活动</option>
                            <option value="1" <?php if($event &&($event->event_type == 1)){?>selected<?php }?>>往期活动</option>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12">活动照片</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="cover-area">
                          <div class="cover-hd">
                            <input id="file_upload" class="file_upload" name="file_upload" type="file" />
                            <input id="event_url" value="<?php if ($event){ echo $event->event_img;}?>" name="event_url" type="hidden" />
                          </div>
                          <div id="imgArea" class="cover-bd" <?php if(!$event){?>style="display: none;"<?php }?>>
                              <?php if($event && $event->event_img){ $imgs = explode(';',$event->event_img); foreach($imgs as $k=>$v){ if($v){?>
                              <div style='width:100px;float:left;margin:0 10px 10px 0;text-align:center;' class='event_img'>
                                <img src="<?php echo $v;?>" class="img" width='100' height='100'>
                              <br/><a href='javascript:void(0)' data_url='<?php echo $v;?>' class='delete_img'>删除</a></div>
                              <?php }} }?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">活动名(CH)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" value="<?php if($event){echo $event->name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">活动名(EN)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="en_name" name="en_name" required="required" value="<?php if($event){echo $event->en_name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">课程内容(CH)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea id="desc" name="desc"><?php if ($event){ echo $event->desc;}?></textarea>
                            <script type="text/javascript">
                                var desc = CKEDITOR.replace( 'desc');

                            </script>
                        </div>
                    </div>

                    <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">课程内容(EN)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea id="en_desc" name="en_desc"><?php if ($event){ echo $event->en_desc;}?></textarea>
                            <script type="text/javascript">
                               var en_desc = CKEDITOR.replace( 'en_desc' );
                            </script>
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">排序（小的在前）
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="display_order" name="display_order" required="required" value="<?php if($event){echo $event->display_order;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">保存</button>
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
          var event_url = $("#event_url").val();
          var img = "<div style='width:100px;float:left;margin:0 10px 10px 0;text-align:center;' class='event_img'><img src='"+jsonData.fileUrl+"' width='100' height='100' /><br/><a href='javascript:void(0)' data_url='"+jsonData.fileUrl+"' class='delete_img'>删除</a></div>";
            if(event_url){
              $("#event_url").val(event_url+';'+jsonData.fileUrl);
              $("#imgArea").append(img);
            }else{
              $("#imgArea").show().append(img);
              $("#event_url").val(jsonData.fileUrl);
            }
          }

      });
    });

    $(document).on("click", ".delete_img", function() {
     var url = $(this).attr('data_url');
     var event_url = $("#event_url").val();
     event_url = event_url.replace(url+';','');
     event_url = event_url.replace(url,'');
     $("#event_url").val(event_url);
     $(this).parents('.event_img').remove();
   });

    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      $form = $('#demo-form');
      if (submit){
        var submitData={
            event_type:$("select[name='event_type']",$form).val(),
            name:$("input[name='name']",$form).val(),
            event_url:$("input[name='event_url']",$form).val(),
            en_name:$("input[name='en_name']",$form).val(),
            display_order:$("input[name='display_order']",$form).val(),
            desc:$.trim(desc.document.getBody().getHtml()),
            en_desc:$.trim(en_desc.document.getBody().getHtml()),
            id:$("input[name='event_id']",$form).val()
        };
         $.post('/admin/event_add',submitData,function(data){

            if(data.success=="yes")
            {
               show_stack_modal('success',data.msg);
               common_go_next("/admin/event_list");
            }else
            {
               show_stack_modal('error',data.msg);
            }
        },"json");

        return false;
    }
});
  </script>
<?php $this->load->view('admin/common_footer');?>