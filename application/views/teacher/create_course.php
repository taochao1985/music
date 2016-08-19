<?php $this->load->view('teacher/teacher_header');?>

<link rel="stylesheet" href="/static/css/appmsg-mul.css" media="screen" />
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script src="/static/js/validator/validator.js"></script>
<script src="/asset/js/typeahead.bundle.min.js"></script>
<script src="/asset/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
<style type="text/css">
  .ui-pnotify-closer{
    display: none;
  }
  .ui-pnotify-sticker{
    display: none;
  }
  .text-left{
    padding:0;
    text-align: left;
  }

</style>
    <div class="col-sm-10 col-xs-8 ">
       <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $this->lang->line('course_prepare');?></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form class="form-horizontal form-label-left" id="course_form">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('class_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_single form-control required" tabindex="-1" name="class_id" id="class_id">

                          <?php foreach($class as $k=>$v){?>
                            <option value="<?php echo $v->class_id;?>" <?php if(($course_class_teacher_id || $exist_old)&&($course_class_id == $v->class_id)){?>selected = true <?php }?>><?php echo $v->class_numbe;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('s_content_time');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="lession_no" class="form-control"  name="lession_no" value="<?php if(($course_class_teacher_id || $exist_old) &&(!$copy_flag)){echo $lession_no; }else { echo $last_course_no;}?>" disabled=true>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('su_content_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea name="course_content" class="col-md-12  text-left"><?php if(($course_class_teacher_id || $exist_old)){echo $course_class->course_content;} ?></textarea>
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('c_content_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea name="course_subject" class="col-md-12  text-left"><?php if(($course_class_teacher_id || $exist_old)){echo $course_class->course_subject;} ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('m_content_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12 ">
                      <textarea name="course_material" class="col-md-12 text-left"><?php if(($course_class_teacher_id || $exist_old)){echo $course_class->course_material;} ?></textarea>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('h_content_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         <input id="tags_1" type="text" class="tags form-control" value="<?php if(($course_class_teacher_id || $exist_old)){echo $course_class->course_homework;} ?>" name="course_homework" />
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('s_content_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_multiple form-control" multiple="multiple" id="id_label_multiple" name="course_suggest_song">
                          <?php foreach($course_suggest_song as $k=>$v){?>
                            <option label="<?php echo $v->name;?>" value="<?php echo $v->id;?>" <?php if(($course_class_teacher_id || $exist_old) &&in_array($v->id,$course_suggest_song_selected)){?>selected = true <?php }?> >
                            <?php echo $v->name.$v->level_name.$v->instrument_name;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('s_v_content_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_multiple form-control" multiple="multiple" id="id_label_multiple" name="course_suggest_video">
                          <?php foreach($course_suggest_video as $k=>$v){?>
                            <option label="<?php echo $v->name;?>" value="<?php echo $v->id;?>" <?php if(($course_class_teacher_id || $exist_old) &&in_array($v->id,$course_suggest_video_selected)){?>selected = true <?php }?> >
                            <?php echo $v->name.$v->level_name.$v->instrument_name;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('s_f_content_label');?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="cover-area">
                          <div class="cover-hd">
                            <input id="file_upload" name="file_upload" type="file" />
                            <input id="fileurl" value="<?php if(($course_class_teacher_id || $exist_old)){ echo $course_class->course_suggest_files_url;}?>" name="coverurl" type="hidden" />
                          </div>
                          <p id="imgArea" class="cover-bd" style="display: none;">
                          <div id="upload_files">
                          <?php if(($course_class_teacher_id || $exist_old)){ echo $course_class->course_suggest_file_name;}?>
                          </div>
                          <a href="javascript:;" class="vb cover-del <?php if(($course_class_teacher_id || $exist_old)){ }else {?>hidden <?php }?>" id="delImg">删除</a>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
    </div>
<script>
$(document).ready(function() {
  $('#file_upload').each(function(){
      var $fileInput = $(this);
      var $cont =  $fileInput.closest(".cont");
      var name = $fileInput.attr("name");
      $fileInput.uploadify({
        'swf'      : '/static/swf/uploadify.swf',
        'uploader' : '/uploads.php',
        'onUploadSuccess' : function(file,data,response)  {
                var jsonData = eval("("+data+")");

                $(".default-tip",window.appmsg).hide();
                var temp_upload_file  = $.trim($('#upload_files').html());
                var temp_upload_value = $.trim($('#fileurl').val());

                    temp_upload_file += jsonData.fileName + '<br/>';
                    temp_upload_value+= jsonData.fileUrl+=';';
                    $('#upload_files').html(temp_upload_file);
                    $('#fileurl').val(temp_upload_value);
                $('#delImg').removeClass('hidden');
          }

      });
    });

    $("#delImg").click(function() {
        $("#delImg").addClass("hidden");
        $("#fileurl").val('');
        $("#upload_files").html('');
    });

  $('#tags_1').tagsInput({
        width: 'auto'
      });
  $(".select2_single").select2({
    placeholder: "Select one",
    allowClear: true
  });

  function template_diy(data, container) {
    return data.element.label;
  }

  $(".select2_multiple").select2({
    //maximumSelectionLength: 4,
    placeholder: "Select some",
    allowClear: true,
    templateSelection: template_diy
  });


  var stack_modal = {"dir1": "down", "dir2": "right", "push": "top", "modal": true, "overlay_close": true};
  function show_stack_modal(type,msg) {
            var opts = {
                title: "Over Here",
                text: "Check me out. I'm in a different stack.",
                addclass: "stack-modal",
                stack: stack_modal,
                delay:1000
            };
            switch (type) {
                case 'error':
                    opts.title = msg;
                    opts.text = "";
                    opts.type = "error";
                    break;
                case 'info':
                    opts.title = msg;
                    opts.text = "";
                    opts.type = "info";
                    break;
                case 'success':
                    opts.title = msg;
                    opts.text = "";
                    opts.type = "success";
                    break;
            }
            new PNotify(opts);
};

  $(function() {

    $('#course_form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit){
        var class_id    = $.trim($("select[name='class_id']").val());
        var lession_no    = $.trim($("input[name='lession_no']").val());
        var course_content = $.trim($("textarea[name='course_content']").val());
        var course_subject = $.trim($("textarea[name='course_subject']").val());
        var course_material = $.trim($("textarea[name='course_material']").val());
        var course_suggest_song = $.trim($("select[name='course_suggest_song']").val());
        var course_homework = $.trim($("input[name='course_homework']").val());
        var course_suggest_video = $.trim($("select[name='course_suggest_video']").val());
        var course_suggest_files = $.trim($('#fileurl').val());

        if(!class_id){
          show_stack_modal('error',"<?php echo $this->lang->line('class_required');?>");
          return false;
        }

        if(!lession_no){
          show_stack_modal('error',"<?php echo $this->lang->line('course_time_required');?>");
          return false;
        }

        /*if(!course_content){
          show_stack_modal('error',"<?php echo $this->lang->line('c_content_required');?>");
          return false;
        }
        if(!course_material){
          show_stack_modal('error',"<?php echo $this->lang->line('m_content_required');?>");
          return false;
        }

        if(!course_homework){
          show_stack_modal('error',"<?php echo $this->lang->line('h_content_required');?>");
          return false;
        }

        if(!course_suggest_song){
          show_stack_modal('error',"<?php echo $this->lang->line('s_content_required');?>");
          return false;
        }*/
        var submitData = {
            class_id: class_id,
            lession_no :lession_no,
            course_content: course_content,
            course_material:course_material,
            course_homework:course_homework,
            course_subject:course_subject,
            course_suggest_song:course_suggest_song,
            course_suggest_video:course_suggest_video,
            course_suggest_files_url:course_suggest_files,
            course_suggest_file_name:$('#upload_files').html(),
            teacher_id:'<?php echo $teacher_id;?>',
            id:'<?php if($copy_flag){echo 0;}else{ echo $course_class_teacher_id;}?>'
        };
        $.post('/teacher/create_course', submitData,function(data) {
          if (data.success == 'yes') {
              show_stack_modal('success',data.msg);
              window.location.href="/teacher/index";
          } else{
              show_stack_modal('error',data.msg);
          }
        },"json");
      }
      return false;
    });
  })

});
</script>
    </body>
</html>
