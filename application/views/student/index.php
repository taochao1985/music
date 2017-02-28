<?php $this->load->view('student/student_header');?>
    <div class="col-sm-10 col-xs-11 music-student-content">
       <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $this->lang->line('course_homework');?></h2>

                  <a class="<?php if($flag == 2){?>btn-success<?php }?> navbar-right btn-xs btn-extra" href="/student/index/2"><?php echo $this->lang->line('old_label');?></a>
                  <a class="<?php if($flag == 1){?>btn-success<?php }?> navbar-right btn-xs btn-extra" href="/student/index/1" style="margin-right:10px;"><?php echo $this->lang->line('new_label');?></a>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th><?php echo $this->lang->line('su_content_label');?></th>
                        <th><?php echo $this->lang->line('s_content_time');?></th>
                        <th><?php echo $this->lang->line('deal_label');?></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php if($class_log){ foreach($class_log as $k=>$v){?>
                         <tr>
                           <td><?php echo $v->instrument_name.'-----'.$v->homework_flag;?>
                             <?php if($v->homework_flag==0){?>
                             <div class="ui-ribbon-wrapper">
                                <div class="ui-ribbon">
                                  new
                                </div>
                              </div>
                              <?php }?>
                          </td>
                           <td><?php echo $v->lession_no;?></td>

                            <td>
                                <a href="/student/course_detail/<?php echo $v->course_id;?>" class="btn-info btn-xs btn-extra"><i class="fa fa-search"></i>&nbsp;<?php echo $this->lang->line('detail_label');?></a>
                            </td>

                         </tr>
                       <?php }}?>
                    </tbody>
                  </table>

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
    </body>
</html>
