<?php $this->load->view('student/student_header');?>
<style type="text/css">
  .btn{
    min-width: 75px;
    margin-right:40px;
  }
  .title,.project_files{
    padding-left:5px !important;
    padding-right:5px !important;
  }
  .homework_song,.homework_video,.homework_file,.homework_song_label,.homework_video_label{
    float:right;
    margin-right:20px;
  }
  #student_comment{
    width:70%;
    height:50px;
    line-height: 25px;
  }
  .ui-pnotify-closer,.ui-pnotify-sticker{
    display: none;
  }
</style>
    <div class="col-sm-10 col-xs-10 music-student-content">
       <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $this->lang->line('course_detail');?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="course_detail">
            <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('name');?></td>
                    <td class="col-sm-6 col-md-2 text-left"><?php echo $course_detail->numbe;?></td>
                    <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('class_id');?></td>
                    <td class="col-sm-6 col-md-2 text-left"><?php echo $course_detail->numbe;?></td>
                    <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('class_time');?></td>
                    <td class="col-sm-6 col-md-2 text-left"><?php echo $course_detail->class_week.'-'.$course_detail->class_start_time.'-'.$course_detail->class_end_time;?></td>
                  </tr>
                  <tr>

                    <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('instrument_label');?></td>
                    <td class="col-sm-6 col-md-2 text-left"><?php echo $instrument_name;?></td>
                    <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('level_label');?></td>
                    <td class="col-sm-6 col-md-2 text-left"><?php echo $level_name;?></td>
                    <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('s_content_time');?></td>
                    <td class="col-sm-6 col-md-2 text-left"><?php echo $course_detail->lession_no;?></td>

                  </tr>
                  <tr>
                      <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('c_content_label');?></td>
                      <td colspan="5"><?php echo $course_detail->course_subject;?></td>
                  </tr>
                  <tr>
                      <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('su_content_label');?></td>
                      <td colspan="5"><?php echo $course_detail->course_content;?></td>
                  </tr>
                  <tr>
                      <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('teacher_comment');?></td>
                      <td colspan="5"><?php echo $course_detail->comment;?></td>
                  </tr>
                  <tr>
                      <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('course_detail');?></td>
                      <td colspan="5">
                          <?php if($course_detail->course_homework){?>
                            <span class="title col-sm-6 col-md-2 text-left"><?php echo $this->lang->line('course_homework');?></span>
                            <div class="col-sm-6 col-md-10 text-left" style="padding-left:5px;">
                                <?php echo $course_detail->course_homework;?>
                            </div>
                          <?php }?>
                          <?php if($suggest_song){?>
                          <span class="title col-sm-6 col-md-2 text-left"><?php echo $this->lang->line('s_content_label');?></span>
                          <ul class="list-unstyled project_files col-sm-6 col-md-10 text-left">
                              <?php foreach($suggest_song as $k=>$v){?>
                              <li>
                                <a href="<?php echo $v->link;?>" target="_blank"><i class="fa fa-download"></i>&nbsp;&nbsp;<?php echo $v->name;?></a>
                              <?php if(!$course_detail->homework_flag){?>
                                <input type="checkbox" value="<?php echo $k;?>" <?php if($homework_song_status && in_array($k,$homework_song_status)){?>checked = true <?php }?> class="homework_song" />
                              <?php }else{?>
                                 <span class="homework_song_label"><?php echo $this->lang->line('course_detail_finish');?></span>
                              <?php }?>
                              </li>
                              <?php }?>
                          </ul>
                          <?php }?>

                           <?php if($suggest_video){?>
                          <span class="title col-sm-6 col-md-2 text-left"><?php echo $this->lang->line('s_v_content_label');?></span>
                          <ul class="list-unstyled project_files col-sm-6 col-md-10 text-left">
                              <?php foreach($suggest_video as $k=>$v){?>
                              <li>
                                  <a href="<?php echo $v->link;?>" target="_blank"><i class="fa fa-download"></i>&nbsp;&nbsp;<?php echo $v->name;?></a>
                                <?php if(!$course_detail->homework_flag){?>
                                  <input type="checkbox" <?php if($homework_video_status && in_array($k,$homework_video_status)){?>checked = true <?php }?> value="<?php echo $k;?>" class="homework_video" />
                                <?php }else{?>
                                  <span class="homework_video_label"><?php echo $this->lang->line('course_detail_finish');?></span>
                                <?php }?>
                              </li>
                              <?php }?>
                          </ul>
                          <?php }?>

                          <?php if($files_url){?>
                          <span class="title col-sm-6 col-md-2 text-left"><?php echo $this->lang->line('s_f_content_label');?></span>
                          <ul class="list-unstyled project_files col-sm-6 col-md-10 text-left">
                              <?php foreach($files_url as $k=>$v){?>
                              <li>
                                <a href="<?php echo $v;?>" target="_blank"><i class="fa fa-download"></i>&nbsp;&nbsp;<?php echo $files_name[$k];?></a>
                              <?php if(!$course_detail->homework_flag){?>
                                <input type="checkbox" <?php if($homework_file_status && in_array($k,$homework_file_status)){?>checked = true <?php }?> value="<?php echo $k;?>" class="homework_file" />
                              <?php }else{ ?>
                                <span class="homework_video_label"><?php echo $this->lang->line('course_detail_finish');?></span>
                              <?php }?>
                              </li>
                              <?php }?>
                          </ul>
                          <?php }?>
                      </td>
                  </tr>
                  <tr>
                      <td class="col-sm-6 col-md-2 text-right"><?php echo $this->lang->line('your_comments');?></td>
                      <td colspan="5">
                      <?php if(!$course_detail->homework_flag){?>
                         <input id="student_comment" name="student_comment" title="<?php echo $this->lang->line('comment_holder');?>" />
                         <p style="padding-top:5px;color:#999;"><?php echo $this->lang->line('comment_holder');?></p>
                      <?php }else{ echo $course_detail->homework_comment;?>

                      <?php }?>
                      </td>
                  </tr>
                </tbody>
              </table>


              <div class="text-center mtop20">
                <a class="btn btn-sm btn-default" href="javascript:void(0)" onclick="history.go(-1)"><?php echo $this->lang->line('back_label');?></a>
                <?php if(!$course_detail->homework_flag){?>
                  <a class="btn btn-sm btn-success" id="btn-success" data_id = "<?php echo $course_detail->call_id;?>" href="javascript:void(0)" ><?php echo $this->lang->line('finish_label');?></a>
                <?php }?>
              </div>

            </div>
          </div>
        </div>
    </div>
    <script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/modernizr.js"></script>
        <script type="text/javascript" src="/asset/plugins/isotope/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/jquery.backstretch.min.js"></script>
        <script type="text/javascript" src="/asset/plugins/jquery.appear.js"></script>

        <!-- Custom Scripts -->
        <script type="text/javascript" src="/asset/js/custom.js"></script>
        <script>
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
         $(document).ready(function(){
            $('#btn-success').click(function(){
                var call_id = $(this).attr('data_id');

                var finish_flag = 1;
                var song = '',video='',file='',student_comment = '';
                $('input[type="checkbox"]').each(function(){
                    if($(this).prop('checked') == false){
                      finish_flag = 0;
                      show_stack_modal('error',"<?php echo $this->lang->line('not_finish_homework');?>");
                      return false;
                    }else{
                      var name = $(this).prop('class');
                      if(name == 'homework_song'){
                        song += $(this).val()+';';
                      }

                      if(name == 'homework_video'){
                        video += $(this).val()+';';
                      }

                      if(name == 'homework_file'){
                        file += $(this).val()+';';
                      }
                    }
                })

                student_comment = $.trim($("#student_comment").val());
                if(!student_comment){
                  show_stack_modal('error',"<?php echo $this->lang->line('your_comments_re');?>");
                  return false;
                }

                var login_param = {
                  call_id:call_id,
                  finish_flag:finish_flag,
                  song : song,
                  video: video,
                  file : file,
                  student_comment:student_comment
                }
                $.post("/student/ajax_homework_status", login_param, function(data) {
                    if (data.success == 'yes') {
                            window.location.reload();
                    } else {
                    }
                  }, "json");
            })
         })
        </script>
    </body>
</html>
