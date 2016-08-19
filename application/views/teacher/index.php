<?php $this->load->view('teacher/teacher_header');?>
    <div class="col-sm-10 col-xs-8 ">
       <div class="x_panel">
                <div class="x_title music_div">
                  <h2><?php echo $this->lang->line('course_prepare');?></h2>
                        <select class="select2_single " tabindex="-1" name="class_id" id="class_id_select">

                          <?php foreach($class as $k=>$v){?>
                            <option value="<?php echo $v->class_id;?>" data_level="<?php echo $v->instrument_id;?>"><?php echo $v->class_numbe;?></option>
                          <?php }?>
                        </select>
                  <a href="/teacher/create_course/0/0/<?php echo $first_class_id;?>" id="add_url" class="music-btn btn-success navbar-right btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th><?php echo $this->lang->line('s_content_time');?></th>
                        <th><?php echo $this->lang->line('class_time');?></th>
                        <th><?php echo $this->lang->line('deal_label');?></th>
                      </tr>
                    </thead>
                    <tbody class="course_class_body">
                       <?php if($class_course){ foreach($class_course as $k=>$v){?>
                         <tr class="class_numbe_<?php echo $v->class_id;?> <?php if($v->class_numbe != $first_numbe){ ?>hidden<?php }?>" >
                           <td><?php echo $v->lession_no;?></td>
                           <td><?php echo $v->class_week.'-'.$v->class_start_time.'-'.$v->class_end_time;?></td>
                           <td>
                            <a href="/teacher/create_course/<?php echo $v->id;?>/copy/<?php echo $v->class_id;?>" class="btn-success btn-xs btn-extra"><i class="fa fa-copy"></i>&nbsp;<?php echo $this->lang->line('copy_label');?></a>
                            <a href="/teacher/create_course/<?php echo $v->id;?>/0/<?php echo $v->class_id;?>" class="btn-info btn-xs btn-extra"><i class="fa fa-pencil"></i>&nbsp;<?php echo $this->lang->line('edit_label');?></a>

                            <a href="javascript:void(0)" class="btn-danger btn-xs delete_configs btn-extra" data_id="<?php echo $v->id;?>"><i class="fa fa-trash-o"></i>&nbsp;<?php echo $this->lang->line('delete_label');?></a>
                            <a href="/teacher/course_roll_call/<?php echo $v->id;?>" style="margin-left:20px;" class="btn-warning btn-extra"><i class="fa fa-child"></i>&nbsp;<?php echo $this->lang->line('roll_call');?></a>
                           </td>
                         </tr>
                       <?php }}?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div>
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

  $(".select2_single").select2({
    placeholder: "Select one",
    allowClear: true
  });
  function isOwnEmpty(obj)
{
    for(var name in obj)
    {
        if(obj.hasOwnProperty(name))
        {
            return false;
        }
    }
    return true;
};
  $('#class_id_select').change(function(){
      var class_num = $(this).val();
      var target_tr = '.class_numbe_'+class_num;
      $(".course_class_body").children('tr').addClass('hidden');
      $(target_tr).removeClass('hidden');
      var class_level = $(this).children('option:selected').attr('data_level');
      var submitData = {instrument_id:class_level};
      $.post('/teacher/ajax_get_class_map_plan', submitData,function(data) {
          if (data.success == 'yes') {
              var temp_msg = data.msg;
              if(!isOwnEmpty(temp_msg.map)){
                $('#teacher_class_map a').attr('href','<?php echo base_url();?>'+temp_msg.map.url).html('Map: '+temp_msg.map.file_name).removeClass('hidden');
              }else{
                $('#teacher_class_map a').addClass('hidden');
              }
              $('#add_url').attr('href','/teacher/create_course/0/0/'+class_num);

             if(!isOwnEmpty(temp_msg.plan)){
                $('#teacher_class_plans a').attr('href','<?php echo base_url();?>'+temp_msg.plan.url).html('Plan: '+temp_msg.plan.file_name).removeClass('hidden');
                console.log($('#teacher_class_plans a').html());
              }else{
                $('#teacher_class_plans a').addClass('hidden');
              }
              if(!isOwnEmpty(temp_msg.intro)){
                $('#teacher_class_intro a').attr('href','<?php echo base_url();?>'+temp_msg.intro.url).html('Intro: '+temp_msg.intro.file_name).removeClass('hidden');
              }else{
                $('#teacher_class_intro a').addClass('hidden');
              }

          }
        },"json");
  });
  $('.delete_configs').click(function(){
      var id = $(this).attr('data_id');
      var submitData = {id:id};
      $.post('/teacher/ajax_delete_data', submitData,function(data) {
          if (data.success == 'yes') {
            show_stack_modal('success',data.msg);
          }else{
            show_stack_modal('error',"<?php echo $this->lang->line('has_class_call');?>");
          }
          window.location.reload();
        },"json");
  })
</script>
    </body>
</html>
