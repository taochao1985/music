<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/appmsg.css" media="screen" />
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/static/ckeditor/ckeditor.js"></script>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>教学点维护</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="branch_id" name="branch_id" value="<?php if ($branch){ echo $branch->id; }else{?>0<?php }?>" />
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">校名(CH)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" value="<?php if($branch){echo $branch->name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">校名(EN)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="en_name" name="en_name" required="required" value="<?php if($branch){echo $branch->en_name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group" <?php if(!$branch){?> style="display:none" <?php }?>>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">编号
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
                          <?php echo $branch->numbe;?>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_two">地址(CH)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="address" name="address" value="<?php if($branch){echo $branch->address;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">地址(EN)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="en_address" name="en_address" value="<?php if($branch){echo $branch->en_address;}?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">手机
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="mobile" name="mobile" value="<?php if($branch){echo $branch->mobile;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">邮箱
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="email" value="<?php if($branch){echo $branch->email;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">座机
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="phone" name="phone"  value="<?php if($branch){echo $branch->phone;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">图片</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="cover-area">
                                    <div class="cover-hd">
                                        <input id="file_upload" class="file_upload" name="file_upload" type="file" />
                                        <input id="coverurl" value="<?php if ($branch){ echo $branch->pics;}?>" name="coverurl" type="hidden" />
                                    </div>
                                    <p id="imgArea" class="cover-bd" <?php if(!$branch){?>style="display: none;"<?php }?>>
                                    <img src="<?php if ($branch){ echo $branch->pics;}?>" id="img">
                                    <a href="javascript:;" class="vb cover-del" id="delImg">删除</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">简介(CH)</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea id="desc" name="desc"><?php if ($branch){ echo $branch->desc;}?></textarea>
                                <script type="text/javascript">
                                    var desc = CKEDITOR.replace( 'desc');

                                </script>
                            </div>
                        </div>

                        <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">简介(EN)</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea id="en_desc" name="en_desc"><?php if ($branch){ echo $branch->en_desc;}?></textarea>
                                <script type="text/javascript">
                                   var en_desc = CKEDITOR.replace( 'en_desc' );
                                </script>
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
                    $(".cover .i-img").attr("src",jsonData.fileUrl).show();
                    $("#imgArea").show().find(" #img").attr("src",jsonData.fileUrl);
                    $("#coverurl").val(jsonData.fileUrl);
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
     $("#delImg").click(function(){
         $(".default-tip").show();
         $("#imgArea").hide();
         $("#coverurl").val('');
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
            show_stack_modal('error','请上传学校图片');
            return false;
        }

        var submitData={
            name:$("input[name='name']",$form).val(),
            en_name:$("input[name='en_name']",$form).val(),
            phone:$("input[name='phone']",$form).val(),
            email:$("input[name='email']",$form).val(),
            address:$("input[name='address']",$form).val(),
            en_address:$("input[name='en_address']",$form).val(),
            mobile:$("input[name='mobile']",$form).val(),
            pics:$("input[name='coverurl']", $form).val(),
            desc:$.trim(desc.document.getBody().getHtml()),
            en_desc:$.trim(en_desc.document.getBody().getHtml()),
            id:$("input[name='branch_id']",$form).val(),
        };
         $.post('/admin/branch_add',submitData,function(data){

            if(data.success=="yes")
            {
               show_stack_modal('success',data.msg);
               common_go_next("/admin/branch_list");
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