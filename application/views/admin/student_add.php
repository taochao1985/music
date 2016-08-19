<?php $this->load->view('admin/common_header');?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>学生维护</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="student_id" name="student_id" value="<?php if ($student){ echo $student->id; }else{?>0<?php }?>" />
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">用户名
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <input type="text" id="username" name="username" required="required" value="<?php if($student){echo $student->username;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">姓名(CH)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="name" name="name" required="required" value="<?php if($student){echo $student->name;}?>" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">姓名(EN)
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="en_name" name="en_name" required="required" value="<?php if($student){echo $student->en_name;}?>" class="form-control col-md-7 col-xs-12">

                      </div>
                    </div>

                    <div class="item form-group" <?php if(!$student){?> style="display:none" <?php }?>>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">学号
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
                          <?php echo $student->numbe;?>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_two">性别
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:8px;">
                         <input type="radio" value="0" name="gender" <?php if($student&&$student->gender == 0){?>checked=true<?php }?> /> 男
                         <input type="radio" value="1" name="gender" <?php if($student&&$student->gender == 1){?>checked=true<?php }?>  /> 女
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">密码
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="password" name="password"   class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">手机
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="mobile" name="mobile" required="required" value="<?php if($student){echo $student->mobile;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">邮箱
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="email" name="email" required="required" value="<?php if($student){echo $student->email;}?>" class="form-control col-md-7 col-xs-12">
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
            username:$("input[name='username']",$form).val(),
            en_name:$("input[name='en_name']",$form).val(),
            name:$("input[name='name']",$form).val(),
            gender:$("input[name='gender']:checked",$form).val(),
            password:$("input[name='password']",$form).val(),
            mobile:$("input[name='mobile']",$form).val(),
            email:$("input[name='email']",$form).val(),
            id:$("input[name='student_id']",$form).val(),
        };
         $.post('/admin/student_add',submitData,function(data){

            if(data.success=="yes")
            {
               show_stack_modal('success',data.msg);
               common_go_next("/admin/student_list");
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