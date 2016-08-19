<?php $this->load->view('teacher/teacher_header');?>
<link href="/asset/css/green.css" rel="stylesheet">
 <script src="/asset/js/icheck.min.js"></script>
 <style type="text/css">
 .select2-container{
  min-width: 300px;
 }
 .select2-selection__clear{
  line-height: 30px;
 }
 .to_do li{
  min-height:55px;
  line-height: 60px;
 }
 .to_do input{
  line-height: 30px;
 }
.select2-selection__rendered{
  text-align: left;
 }
 .select2-container{
  min-width: 250px !important;
 }
 </style>
<script type="text/javascript">
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
</script>

    <div class="col-sm-10 col-xs-8 ">
       <div class="x_panel">
              <div class="x_title">
                <h2><?php echo $this->lang->line('roll_call');?> <?php if($student){ ?><small><?php echo $student[0]->numbe.'---'.$this->lang->line('s_content_time').': '.$student[0]->lession_no;?></small><?php }?></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="">
                <?php if($student){ ?>
                  <ul class="to_do">
                      <li>
                         <div class="col-md-2 text-left "><?php echo $this->lang->line('student_info');?></div>
                         <div class="col-md-10 text-center">
                            <div class="col-md-6">
                                <?php echo $this->lang->line('select_comment');?>
                            </div>
                            <div class="text-center">
                                <?php echo $this->lang->line('custom_comment');?>
                            </div>
                         </div>
                      </li>
                    <?php foreach($student as $k=>$v){?>
                      <li data_student_id="<?php echo $v->id;?>" data_instrument_id="<?php echo $v->instrument_id;?>">
                          <div class="col-md-2 text-left">
                            <img src="/asset/images/ripple.gif" class="pull-left music_ripple hidden " id="ripple_<?php echo $v->id;?>" />
                            <input type="checkbox" class="flat pull-left" value="<?php echo $v->id;?>" <?php if($v->call_flag){ ?>checked<?php }?> > <?php echo $v->name;?>
                          </div>
                          <div class="pull-right col-md-10 text-left">

                            <select class="comment_select select2_single col-md-5">
                                <?php if($comment_select){ foreach($comment_select as $key=>$val){?>
                                   <option value="<?php echo $val->id;?>" <?php if($v->comment_id == $val->id){?>selected<?php }?>><?php echo $val->comment;?></option>
                                <?php }}?>
                            </select>
                              <input type="text" name="comment_input" />
                              <input type="button" class="btn-success btn-xs roll_call_save" value="<?php echo $this->lang->line('save_label');?>" />
                              <?php if($v->homework_flag){?>
                                <span class="btn-success"><?php echo $this->lang->line('finish_label');?></span>
                              <?php }else{?>
                                <span class="btn-warning"><?php echo $this->lang->line('not_finish_label');?></span>
                              <?php }?>
                          </div>
                      </li>
                    <?php }?>

                  </ul>
                  <?php }?>
                </div>
              </div>
            </div>
    </div>
<script type="text/javascript">
  $(".select2_single").select2({
    placeholder: "Select one",
    allowClear: true
  });
// iCheck
if ($("input.flat")[0]) {
    $(document).ready(function () {
        $('input').on('ifChecked', function(e){
          var student_id = e.target.value;
          var submitData = {
            student_id:student_id,
            course_class_teacher_id:'<?php echo $course_class_teacher_id;?>',
            type:'check'
          }
          var target_img = '#ripple_'+student_id;
          $(target_img).removeClass('hidden');
          $.post('/teacher/do_roll_call', submitData,function(data) {
            if (data.success == 'yes') {
              $(target_img).addClass('hidden');
            }
          },"json");
        });
        $('input').on('ifUnchecked', function(e){
          var student_id = e.target.value;
          var submitData = {
            student_id:student_id,
            course_class_teacher_id:'<?php echo $course_class_teacher_id;?>',
            type:'uncheck'
          }
          var target_img = '#ripple_'+student_id;
          $(target_img).removeClass('hidden');
          $.post('/teacher/do_roll_call', submitData,function(data) {
            if (data.success == 'yes') {
              $(target_img).addClass('hidden');
            }
          },"json");
        });
        $('input.flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
}
  function login_success(){
     window.location.reload();
  }

$(document).ready(function(){
    $('.roll_call_save').click(function(){
        var comment_select = $(this).parents('.pull-right').find('select').val();
        var comment_input  = $.trim($(this).prev('input').val());
        var student_id     = $(this).parents('li').attr('data_student_id');
        var instrument_id  = $(this).parents('li').attr('data_instrument_id');
        var submitData = {
            comment_select: comment_select,
            comment_input : comment_input,
            student_id    : student_id,
            instrument_id : instrument_id,
            course_class_teacher_id:'<?php echo $course_class_teacher_id;?>'
        };
        $.post('/teacher/update_roll_call_data', submitData,function(data) {
            if (data.success == 'yes') {
              show_stack_modal('success',data.msg);
              setTimeout(login_success,2000);
            }
          },"json");

    })
})

</script>
    </body>
</html>
