<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/appmsg.css" media="screen" />
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/static/ckeditor/ckeditor.js"></script>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>课程维护</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="course_id" name="course_id" value="<?php if ($course){ echo $course->id; }else{?>0<?php }?>" />

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">姓名(CH)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" value="<?php if($course){echo $course->name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">姓名(EN)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="en_name" name="en_name" required="required" value="<?php if($course){echo $course->en_name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">课程内容(CH)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea id="desc" name="desc"><?php if ($course){ echo $course->desc;}?></textarea>
                            <script type="text/javascript">
                                var desc = CKEDITOR.replace( 'desc');

                            </script>
                        </div>
                    </div>

                    <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">课程内容(EN)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea id="en_desc" name="en_desc"><?php if ($course){ echo $course->en_desc;}?></textarea>
                            <script type="text/javascript">
                               var en_desc = CKEDITOR.replace( 'en_desc' );
                            </script>
                        </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">排序（小的在前）
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="display_order" name="display_order" required="required" value="<?php if($course){echo $course->display_order;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">首页推荐照片(189*189)CN</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="cover-area">
                                <div class="cover-hd">
                                    <input class="file_upload" class="file_upload" name="file_upload" type="file" />
                                    <input class="hidden_input" id="recommand_pic" value="<?php if ($course){ echo $course->recommand_pic;}?>" name="recommand_pic" type="hidden" />
                                </div>
                                <p class="imgArea" class="cover-bd" <?php if(!$course){?>style="display: none;"<?php }?>>
                                <img src="<?php if ($course){ echo $course->recommand_pic;}?>" class="img">
                                <a href="javascript:;" class="vb cover-del" class="delImg">删除</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">首页推荐照片(189*189)EN</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="cover-area">
                                <div class="cover-hd">
                                    <input class="file_upload" class="file_upload" name="file_upload" type="file" />
                                    <input class="hidden_input" id="en_recommand_pic" value="<?php if ($course){ echo $course->en_recommand_pic;}?>" name="en_recommand_pic" type="hidden" />
                                </div>
                                <p class="imgArea" class="cover-bd" <?php if(!$course){?>style="display: none;"<?php }?>>
                                <img src="<?php if ($course){ echo $course->en_recommand_pic;}?>" class="img">
                                <a href="javascript:;" class="vb cover-del" class="delImg">删除</a>
                                </p>
                            </div>
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
    $('.file_upload').each(function(){
            var $fileInput = $(this);
            var $cont =  $fileInput.closest(".cover-area");
            var name = $fileInput.attr("name");
            $fileInput.uploadify({
                'swf'      : '/static/swf/uploadify.swf',
                'uploader' : '/uploads.php',
                'onUploadSuccess' : function(file,data,response)  {
                    var jsonData = eval("("+data+")");
                    $(".cover .i-img").attr("src",jsonData.fileUrl).show();
                    $cont.find(".imgArea").show().find(" #img").attr("src",jsonData.fileUrl);
                    $cond.find(".hidden_input").val(jsonData.fileUrl);
                    $(".default-tip").hide();
                }

            });
        });
     $(".msg-editer #title").bind("keyup",function(){
         $(".i-title").text($(this).val());
     });
     $(".msg-editer #summary").bind("keyup",function(){
         $(".msg-text").text($(this).val());
     });
     $('#desc-block-link').click(function(){
         $('#desc-block').show();
         $(this).hide();
     });
     $('#url-block-link').click(function(){
         $('#url-block').show();
         $(this).hide();
     });
     $(".delImg").click(function(){
         $(".default-tip").show();
         var p = $(this).parents(".cover-area");
         p.find('.imgArea').hide();
         p.find(".hidden_input").val('');
         $(".cover .i-img").hide();
     });
     $("#cancel-btn").click(function(event){
         event.stopPropagation();
         location.href = "/main/materials_index";
         return ;
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
      if($("#coverurl").val() == ''){
            show_stack_modal('error','请上传头像');
            return false;
        }

      var instrument_id='';
      $("input[type='checkbox']:checked").each(function(){
         instrument_id+= $(this).val()+',';
      })
        var submitData={
            name:$("input[name='name']",$form).val(),
            en_name:$("input[name='en_name']",$form).val(),
            username:$("input[name='username']",$form).val(),
            email:$("input[name='email']",$form).val(),
            instrument:instrument_id,
            gender:$("input[name='gender']:checked",$form).val(),
            password:$("input[name='password']",$form).val(),
            mobile:$("input[name='mobile']",$form).val(),
            email:$("input[name='email']",$form).val(),
            thumb:$("input[name='coverurl']", $form).val(),
            lang:$("input[name='lang']", $form).val(),
            desc:$.trim(desc.document.getBody().getHtml()),
            en_desc:$.trim(en_desc.document.getBody().getHtml()),
            id:$("input[name='course_id']",$form).val(),
        };
         $.post('/admin/course_add',submitData,function(data){

            if(data.success=="yes")
            {
               show_stack_modal('success',data.msg);
               common_go_next("/admin/course_list");
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