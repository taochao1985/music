<link href="/asset/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/asset/css/style.css" rel="stylesheet">
<link href="/asset/css/custom.css" rel="stylesheet">
<link href="/static/css/pnotify.css" rel="stylesheet">
<script src="/static/js/validator/validator.js"></script>
<script src="/static/js/custom.js"></script>
<script type="text/javascript" src="/static/js/notify/pnotify.core.js"></script>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document" id="login_div">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('login');?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" data-parsley-validate="" id="login-form" novalidate="">

          <div class="form-group item">
            <label for="username" class="col-sm-2 col-xs-3 text-right control-label"><?php echo $this->lang->line('username');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="text" class="form-control"  name="username" placeholder="<?php echo $this->lang->line('username');?>" required="required">
              <i class="fa fa-user form-control-feedback"></i>
            </div>
          </div>

          <div class="form-group item">
            <label for="password" class="col-sm-2 col-xs-3 text-right control-label"><?php echo $this->lang->line('password');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="password" class="form-control"  name="password" placeholder="<?php echo $this->lang->line('password');?>" required="required">
              <i class="fa fa-eye form-control-feedback"></i>
            </div>
          </div>

          <div class="form-group item">
            <label for="password" class="col-sm-2 col-xs-3 text-right control-label"></label>
            <div class="col-sm-9 col-xs-8">
              <input type="radio" class="" name="member_type" checked value="student" />&nbsp;&nbsp;<?php echo $this->lang->line('student_info');?>
              <input type="radio" class="" name="member_type" value="teacher" />&nbsp;&nbsp;<?php echo $this->lang->line('teacher_info');?>
            </div>
          </div>

          <div class="form-group">
            <label for="class_id" class="col-sm-4 col-xs-3 text-right control-label"></label>
            <button type="submit" class="btn btn-default col-sm-2 col-xs-2" id="sign_in"><?php echo $this->lang->line('login');?></button>
            <div id="forget_password"  class="btn  col-sm-2 col-xs-2"><?php echo $this->lang->line('find_password');?></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="findpasswordModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document" id="find_password_div">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('find_password');?></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" data-parsley-validate="" id="find-passsword-form" novalidate="">

          <div class="form-group item">
            <label for="mobile" class="col-sm-2 col-xs-3 text-right control-label"><?php echo $this->lang->line('mobile');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="text" class="form-control"  name="mobile"  required="required">
              <i class="fa fa-mobile form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group item">
            <label for="captcha" class="col-sm-2 col-xs-3 text-right control-label"><?php echo $this->lang->line('captcha');?></label>
            <div class="col-sm-5 col-xs-5">
              <input type="text" class="form-control" id="captcha" name="captcha" required="required">

            </div>
            <div class="col-sm-3 col-xs-3" style="padding-left:0;padding-right:6px;cursor:pointer;">
              <div class="form-control" style="padding:6px 0;text-align:center;" id="send_captcha2"><?php echo $this->lang->line('send_captcha');?></div>
            </div>
          </div>
          <div class="form-group item">
            <label for="password" class="col-sm-2 col-xs-3 text-right control-label"><?php echo $this->lang->line('new_password');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="password" class="form-control"  name="find_password" id="password" placeholder="<?php echo $this->lang->line('password');?>" required="required">
              <i class="fa fa-eye form-control-feedback"></i>
            </div>
          </div>

          <div class="form-group item">
            <label for="password" class="col-sm-2 col-xs-3 text-right control-label"></label>
            <div class="col-sm-9 col-xs-8">
              <input type="radio" class="" name="member_type2" checked value="student" />&nbsp;&nbsp;<?php echo $this->lang->line('student_info');?>
              <input type="radio" class="" name="member_type2" value="teacher" />&nbsp;&nbsp;<?php echo $this->lang->line('teacher_info');?>
            </div>
          </div>


          <div class="form-group">
            <label for="class_id" class="col-sm-4 col-xs-3 text-right control-label"></label>
            <button type="submit" class="btn btn-default col-sm-2 col-xs-2" id="sign_in"><?php echo $this->lang->line('confirm_label');?></button>
            <div id="login_button"  class="btn  col-sm-2 col-xs-2"><?php echo $this->lang->line('login');?></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function login_success(){
     var member_type = $("input[name='member_type']:checked").val();

     window.location.href="/"+member_type+"/index";
  }


  $("#forget_password").click(function(){
    $("#loginModal").modal('hide');
    $("#findpasswordModal").modal('show');

  });

  $("#login_button").click(function(){
    $("#loginModal").modal('show');
    $("#findpasswordModal").modal('hide');

  });

  var send_flag = 1;
function load_time(){
  var seconds = 60;
  var tt = setInterval(function(){
    seconds -= 1;

    $('#send_captcha2').html(seconds+'s');
    if(seconds == 0){

       send_flag = 1;
       $('#send_captcha2').html("<?php echo $this->lang->line('send_captcha');?>");
       clearInterval(tt);
    }
  },1000);
}

  $(function() {
    $('#send_captcha2').click(function(){
      var mobile   = $.trim($("input[name='mobile']").val());
      if(send_flag == 1){
          send_flag =0;
          load_time();
          $.post('/front/get_captcha', {mobile:mobile,'type':'edit_password'},function(data) {
            if (data.success == 'yes') {
                show_stack_modal('success',data.msg);
            }else{
                show_stack_modal('error',data.msg);
            }
          },"json");
      }

    });

    $('#login-form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit){
        var username    = $.trim($("input[name='username']").val());
        var password    = $.trim($("input[name='password']").val());
        var member_type = $("input[name='member_type']:checked").val();
        var submitData = {
            username: username,
            password: password,
            member_type:member_type
        };
        $.post('/front/do_login', submitData,function(data) {
          if (data.success == 'yes') {
             // show_stack_modal('success',data.msg);
              setTimeout(login_success,2000);
          }  else{
              show_stack_modal('error',data.msg);
          }
        },"json");
      }
      return false;
    });

    $('#find-passsword-form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit){
        var mobile    = $.trim($("input[name='mobile']").val());
        var captcha    = $.trim($("input[name='captcha']").val());
        var password    = $.trim($("input[name='find_password']").val());
        var member_type = $("input[name='member_type2']:checked").val();
        var submitData = {
            mobile: mobile,
            captcha: captcha,
            password:password,
            member_type:member_type
        };
        var password_exec = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
        if(!password.match(password_exec)){
            show_stack_modal('error',"<?php echo $this->lang->line('password_format');?>");
            return false;
        }

        $.post('/front/reset_password', submitData,function(data) {
          if (data.success == 'yes') {
              show_stack_modal('success',data.msg);
              setTimeout(login_success,2000);

          }  else{
              show_stack_modal('error',data.msg);
          }
        },"json");
      }
      return false;
    });
  })
</script>