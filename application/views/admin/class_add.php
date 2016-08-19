<?php $this->load->view('admin/common_header');?>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>班级维护</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="class_id" name="class_id" value="<?php if ($class){ echo $class->id; }else{?>0<?php }?>" />
                    <div class="item form-group" <?php if(!$class){?> style="display:none" <?php }?>>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">编号
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
                          <?php echo $class->numbe;?>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">分类
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select id="category_id" name="category_id" class="required" >
                         	<option value="">请选择</option>
                         	<?php if($category){ foreach($category as $k=>$v){?>
                         	  	<option value="<?php echo $v->id;?>" <?php if($class&&($class->category_id == $v->id)) {?>selected = true<?php }?>><?php echo $v->name;?></option>
                         	<?php }}?>
                         </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">级别
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="level_id" name="level_id"  class="required">
                         	<option value="">请选择</option>
                         	<?php if($level){ foreach($level as $k=>$v){?>
                         	  	<option value="<?php echo $v->id;?>" <?php if($class&&($class->level_id == $v->id)) {?>selected = true<?php }?>><?php echo $v->name;?></option>
                         	<?php }}?>
                         </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">教学点
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="branch_id" name="branch_id"  class="required">
                         	<option value="">请选择</option>
                         	<?php if($branch){ foreach($branch as $k=>$v){?>
                         	  	<option value="<?php echo $v->id;?>" <?php if($class&&($class->branch_id == $v->id)) {?>selected = true<?php }?>><?php echo $v->name;?></option>
                         	<?php }}?>
                         </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">乐器
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="instrument_id" name="instrument_id"  class="required">
                          <option value="">请选择</option>
                          <?php if($instrument){ foreach($instrument as $k=>$v){?>
                              <option value="<?php echo $v->id;?>" <?php if($class&&($class->instrument_id == $v->id)) {?>selected = true<?php }?>><?php echo $v->name;?></option>
                          <?php }}?>
                         </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">上课时间
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="class_start_time" name="class_start_time" required="required" value="<?php if($class){echo $class->class_start_time;}?>" >
                        -
                        <input type="text" id="class_end_time" name="class_end_time" required="required" value="<?php if($class){echo $class->class_end_time;}?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">上课星期
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="class_week" name="class_week" required="required" placeholder="请输入星期英文简称" value="<?php if($class){echo $class->class_week;}?>"  class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">费用
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="tuition" name="tuition" required="required" value="<?php if($class){echo $class->tuition;}?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">周期
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="duration" name="duration" required="required" value="<?php if($class){echo $class->duration;}?>" class="form-control col-md-7 col-xs-12">
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
    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      $form = $('#demo-form');
      if (submit){
        var submitData={
          	category_id:$("select[name='category_id']",$form).val(),
            level_id:$("select[name='level_id']",$form).val(),
            branch_id:$("select[name='branch_id']",$form).val(),
            instrument_id:$("select[name='instrument_id']",$form).val(),
            tuition:$("input[name='tuition']",$form).val(),
            class_start_time:$("input[name='class_start_time']",$form).val(),
            class_end_time:$("input[name='class_end_time']",$form).val(),
            class_week:$("input[name='class_week']",$form).val(),
            duration:$("input[name='duration']",$form).val(),
            id:$("input[name='class_id']",$form).val(),
        };
         $.post('/admin/class_add',submitData,function(data){

            if(data.success=="yes")
            {
               show_stack_modal('success',data.msg);
               common_go_next("/admin/class_list");
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