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
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">是否置顶
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" id="is_top" name="is_top" <?php if($course&&$course->is_top){?> checked="checked" <?php }?> >
                      </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">首页推荐照片(189*189)CN</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="cover-area">
                                <div class="cover-hd">
                                    <input class="file_upload" name="file_upload" type="file" id="recommand_pic"/>
                                    <input class="hidden_input" id="recommand_pic_input" value="<?php if ($course){ echo $course->recommand_pic;}?>" name="recommand_pic" type="hidden" />
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
                                    <input class="file_upload" name="file_upload" type="file" id="en_recommand_pic"/>
                                    <input class="hidden_input" id="en_recommand_pic_input" value="<?php if ($course){ echo $course->en_recommand_pic;}?>" name="en_recommand_pic" type="hidden" />
                                </div>
                                <p class="imgArea" class="cover-bd" <?php if(!$course){?>style="display: none;"<?php }?>>
                                <img src="<?php if ($course){ echo $course->en_recommand_pic;}?>" class="img">
                                <a href="javascript:;" class="vb cover-del" class="delImg">删除</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">下载PDF(CN)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="cover-area">
                                <div class="cover-hd">
                                    <input class="file_upload" name="pdf_upload" type="file" id="pdf"/>
                                    <input class="hidden_input" id="pdf_input" value="<?php if ($course){ echo $course->recommand_pic;}?>" name="pdf" type="hidden" />
                                    <input class="file_name" id="pdf_input_name" value="<?php if ($course){ echo $course->pdf_name;}?>" name="pdf_name" type="hidden" />
                                </div>
                                <div class="imgArea" class="cover-bd" <?php if(!$course){?>style="display: none;"<?php }?>>
                                  <div class="name_div pull-left"><?php if ($course){ echo $course->pdf_name;}?></div>
                                  <a href="javascript:;" class="vb cover-del pull-left delImg">删除</a>
                                  <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">下载PDF(EN)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="cover-area">
                                <div class="cover-hd">
                                    <input class="file_upload" name="pdf_upload" type="file" id="en_pdf"/>
                                    <input class="hidden_input" id="en_pdf_input" value="<?php if ($course){ echo $course->en_recommand_pic;}?>" name="en_pdf" type="hidden" />
                                    <input class="file_name" id="en_pdf_input_name" value="<?php if ($course){ echo $course->en_pdf_name;}?>" name="en_pdf_name" type="hidden" />
                                </div>
                                <div class="imgArea" class="cover-bd" <?php if(!$course){?>style="display: none;"<?php }?> >
                                  <div class="name_div  pull-left"><?php if ($course){ echo $course->en_pdf_name;}?></div>
                                  <a href="javascript:;" class="vb cover-del pull-left delImg">删除</a>
                                  <div class="clearfix"></div>
                                </div>
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

                    $cont.find(".hidden_input").val(jsonData.fileUrl);
                    $cont.find(".file_name").val(jsonData.fileName);
                    $(".default-tip").hide();
                    if(name == 'pdf_upload'){
                      $cont.find(".imgArea").show().find(".name_div").html(jsonData.fileName);
                    }else{
                      $cont.find(".imgArea").show().find("img").attr("src",jsonData.fileUrl);
                    }
                }
            });
        });

     $(".delImg").click(function(){
         $(".default-tip").show();
         var p = $(this).parents(".cover-area");
         p.find('.imgArea').hide();
         p.find(".hidden_input,.file_name").val('');
         $(".cover .i-img").hide();
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
        var is_top = 0;
          if($("#is_top").prop('checked')){
            is_top = 1;
          }
        var submitData={
            name:$("input[name='name']",$form).val(),
            en_name:$("input[name='en_name']",$form).val(),
            display_order:$("input[name='display_order']",$form).val(),
            recommand_pic:$("input[name='recommand_pic']",$form).val(),
            en_recommand_pic:$("input[name='en_recommand_pic']",$form).val(),
            pdf:$("input[name='pdf']",$form).val(),
            pdf_name:$("input[name='pdf_name']",$form).val(),
            en_pdf:$("input[name='en_pdf']",$form).val(),
            en_pdf_name:$("input[name='en_pdf_name']",$form).val(),
            desc:$.trim(desc.document.getBody().getHtml()),
            en_desc:$.trim(en_desc.document.getBody().getHtml()),
            id:$("input[name='course_id']",$form).val(),
            is_top : is_top
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