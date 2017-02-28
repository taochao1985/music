<?php $this->load->view('student/student_header');?>
    <div class="col-sm-10 col-xs-10 music-student-content">
       <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $this->lang->line('my_course');?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('class_numbe');?></th>
                        <th><?php echo $this->lang->line('class_duration_left');?></th>
                        <th><?php echo $this->lang->line('class_location');?></th>
                        <th><?php echo $this->lang->line('class_price');?></th>
                        <th><?php echo $this->lang->line('level_label');?></th>
                        <th><?php echo $this->lang->line('instrument_label');?></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php if($class_course){ foreach($class_course as $k=>$v){?>
                         <tr>
                          <td><?php echo $username;?></td>
                          <td><?php echo $v->numbe;?></td>
                          <td><?php echo $v->left_amount;?></td>
                          <td><?php echo $v->branch_name;?></td>
                          <td><?php echo $v->tuition;?></td>
                          <td><?php echo $v->level_name;?></td>
                          <td><?php echo $v->instrument_name;?></td>

                         </tr>
                       <?php }}?>
                    </tbody>
                  </table>

                </div>
              </div>
    </div>
    <script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
