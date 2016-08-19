<?php $this->load->view('teacher/teacher_header');?>
    <div class="col-sm-10 col-xs-8 ">
       <div class="x_panel">
                <div class="x_title music_div">
                  <h2><?php echo $this->lang->line('s_v_content_label');?></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th><?php echo $this->lang->line('instrument_label');?></th>
                        <th><?php echo $this->lang->line('level_label');?></th>
                        <th><?php echo $this->lang->line('name_label');?></th>
                        <th><?php echo $this->lang->line('s_content_time');?></th>
                      </tr>
                    </thead>
                    <tbody class="course_class_body">
                       <?php if($suggest_video){ foreach($suggest_video as $k=>$val){?>
                         <tr >
                           <td><?php echo $val->instrument;?></td>
                           <td><?php echo $val->level_name;?></td>
                           <td><a href="<?php echo $val->link;?>" target="_blank"><?php echo $val->name;?></a></td>
                           <td><?php echo $val->lesson_num;?></td>
                         </tr>
                       <?php }}?>
                    </tbody>
                  </table>
                </div>
              </div>
    </div>
    </body>
</html>
