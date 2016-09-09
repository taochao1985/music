<link href="/asset/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/asset/css/style.css" rel="stylesheet">
<link href="/asset/css/custom.css" rel="stylesheet">
<link href="/static/css/pnotify.css" rel="stylesheet">
<script src="/static/js/validator/validator.js"></script>
<script src="/static/js/custom.js"></script>
<script type="text/javascript" src="/static/js/notify/pnotify.core.js"></script>

      <div class="modal-body">
        <form class="form-horizontal form-label-left" data-parsley-validate="" id="register-form" novalidate="">
          <div class="form-group item">
            <label for="username" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('username');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="text" class="form-control" id="username" placeholder="<?php echo $this->lang->line('username');?>" required="required">
              <i class="fa fa-user form-control-feedback"></i>
            </div>
          </div>

          <div class="form-group item">
            <label for="name" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('name');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="text" class="form-control" id="name" placeholder="<?php echo $this->lang->line('name');?>" required="required">
              <i class="fa fa-user form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group item">
            <label for="en_name" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('en_name');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="text" class="form-control" id="en_name" placeholder="<?php echo $this->lang->line('en_name');?>" required="required">
              <i class="fa fa-user form-control-feedback"></i>
            </div>
          </div>

          <div class="form-group item">
            <label for="password" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('password');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="password" class="form-control" id="password" placeholder="<?php echo $this->lang->line('password');?>" required="required">
              <i class="fa fa-eye form-control-feedback"></i>
              <div style="color:#999999;padding-top:3px;"><?php echo $this->lang->line('password_format');?></div>
            </div>
          </div>
          <div class="form-group item">
            <label for="repassword" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('repassword');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="password" class="form-control" id="repassword" placeholder="<?php echo $this->lang->line('repassword');?>" required="required">
              <i class="fa fa-eye form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group">
            <label for="gender" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('gender');?></label>
            <div class="col-sm-9 col-xs-8">
              <label class="radio-inline">
                <input type="radio" name="gender" value="0"> <?php echo $this->lang->line('male');?>
              </label>
              <label class="radio-inline">
                <input type="radio" name="gender" value="1"> <?php echo $this->lang->line('female');?>
              </label>
            </div>
          </div>
          <div class="form-group item">
            <label for="age" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('age');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="tel" class="form-control" id="age" placeholder="<?php echo $this->lang->line('age');?>" required="required">
              <i class="fa fa-user form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group item">
            <label for="email" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('email');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('email');?>" required="required">
              <i class="fa fa-envelope form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group item">
            <label for="mobile" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('mobile');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="tel" class="form-control" id="mobile" placeholder="<?php echo $this->lang->line('mobile');?>" required="required">
              <i class="fa fa-mobile form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group item">
            <label for="captcha" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('captcha');?></label>
            <div class="col-sm-5 col-xs-5">
              <input type="text" class="form-control" id="captcha" required="required">

            </div>
            <div class="col-sm-3 col-xs-3" style="padding-left:0;padding-right:6px;cursor:pointer;">
              <div class="form-control" style="padding:6px 0;text-align:center;" id="send_captcha"><?php echo $this->lang->line('send_captcha');?></div>
            </div>
          </div>
          <div class="form-group item">
            <label for="tutor_id" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('tutor_id');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="tel" class="form-control" id="tutor_id" placeholder="<?php echo $this->lang->line('tutor_id');?>" required="required">
              <i class="fa form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group item">
            <label for="class_id" class="col-sm-3 col-xs-4 text-right control-label"><?php echo $this->lang->line('class_id');?></label>
            <div class="col-sm-9 col-xs-8">
              <input type="tel" class="form-control" id="class_id"  placeholder="<?php echo $this->lang->line('class_id');?>" required="required">
              <i class="fa form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group">
            <input type="hidden" id="openid" value="<?php if(isset($openid)){ echo $openid;}?>">
            <input type="hidden" id="student_id" value="<?php if(isset($student_id)){ echo $student_id;}?>">
            <label for="class_id" class="col-sm-7 col-xs-5 text-right control-label"></label>
            <button type="submit" class="btn btn-default col-sm-3 col-xs-2" id="sign_in"><?php echo $this->lang->line('register');?></button>
          </div>
        </form>
      </div>

<script type="text/javascript">
function close_model(){
  $('#registerModal').modal('hide');
}
var send_flag = 1;
function load_time(){
  var seconds = 60;
  var tt = setInterval(function(){
    seconds -= 1;

    $('#send_captcha').html(seconds+'s');
    if(seconds == 0){

       send_flag = 1;
       $('#send_captcha').html("<?php echo $this->lang->line('send_captcha');?>");
       clearInterval(tt);
    }
  },1000);
}
  $(function() {
     /*var seconds = 0;

  */
    $('#send_captcha').click(function(){
      var mobile   = $.trim($('#mobile').val());
      if(send_flag == 1){
          send_flag =0;
          load_time();
          $.post('/front/get_captcha', {mobile:mobile,'type':'register'},function(data) {
            if (data.success == 'yes') {
                show_stack_modal('success',data.msg);
            }else{
                show_stack_modal('error',data.msg);
            }
          },"json");
      }

    });


    $('#register-form').submit(function(e) {

      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }

      if (submit){
        var username = $.trim($('#username').val());
        var en_name  = $.trim($('#en_name').val());
        var name     = $.trim($('#name').val());
        var age      = parseInt($('#age').val());
        var email    = $.trim($('#email').val());
        var mobile   = $.trim($('#mobile').val());
        var tutor_id = $.trim($('#tutor_id').val());
        var class_id = $.trim($('#class_id').val());
        var password = $.trim($('#password').val());
        var openid   = $.trim($('#openid').val());
        var student_id   = $.trim($('#student_id').val());
        var repassword = $.trim($('#repassword').val());
        var gender   = $("input[type='radio']:checked").val();
        var captcha  = $.trim($('#captcha').val());
        if(!captcha){
            show_stack_modal('error',"<?php echo $this->lang->line('password_format');?>");
            return false;
        }
        var password_exec = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
        if(!password.match(password_exec)){
            show_stack_modal('error',"<?php echo $this->lang->line('password_format');?>");
            return false;
        }

        var submitData = {
            username: username,
            en_name: en_name,
            name: name,
            age:age,
            captcha:captcha,
            email:email,
            mobile:mobile,
            tutor_id:tutor_id,
            class_id:class_id,
            gender:gender,
            password:password,
            repassword:repassword,
            openid:openid,
            student_id:student_id
        };
        if(password != repassword){
          show_stack_modal('error',"<?php echo $this->lang->line('wrong_password');?>");
          return false;
        }

        if(gender == undefined){
           show_stack_modal('error',"<?php echo $this->lang->line('gender_empty');?>");
           return false;
        }
        $('#sign_in').attr('type','button');
        $.post('/front/do_register', submitData,function(data) {
          $('#sign_in').attr('type','submit');
          if (data.success == 'yes') {
              show_stack_modal('success',data.msg);
              var success_url = '<?php echo $success_url;?>';
              window.location.href = success_url+data.student_class_id;
          }else{
              show_stack_modal('error',data.msg);
          }
        },"json");
      }
      return false;
    });
  })
</script>

