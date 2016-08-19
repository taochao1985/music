<?php $this->load->view('admin/common_header');?>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>推荐视频维护</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="class_id" name="class_id" value="<?php if ($class){ echo $class->id; }else{?>0<?php }?>" />

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
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">名字
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" value="<?php if($class){echo $class->name;}?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">第几节课
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="lesson_num" name="lesson_num" required="required" value="<?php if($class){echo $class->lesson_num;}?>">
                      </div>
                    </div>


                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">Link
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="link" name="link" required="required" value="<?php if($class){echo $class->link;}?>" class="form-control col-md-7 col-xs-12">
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
            level_id:$("select[name='level_id']",$form).val(),
            instrument_id:$("select[name='instrument_id']",$form).val(),
            name:$("input[name='name']",$form).val(),
            lesson_num:$("input[name='lesson_num']",$form).val(),
            link:$("input[name='link']",$form).val(),
            id:$("input[name='class_id']",$form).val(),
        };
         $.post('/admin/suggest_video_add',submitData,function(data){

            if(data.success=="yes")
            {
               show_stack_modal('success',data.msg);
               common_go_next("/admin/suggest_video_list");
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