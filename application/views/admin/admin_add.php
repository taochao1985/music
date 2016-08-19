<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/appmsg.css" media="screen" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/operamasks-ui.min.js"></script>
<title>店长设置</title>
<style>
label{
    display: inline-block;
}
.help-inline{
    vertical-align: top;
}
.row{
    padding-top: 20px;
    padding-bottom: 20px;
}
</style>
</head>
<script>
 $(function(){
var validator = $("#appmsg-form").validate({
        rules:{
            username:{required:true},
            mobile:{required:true}
        },
    messages:{
            username:{required:'用户名必填'},
            mobile:{required:'手机必填'}
     },
    submitHandler: function() {

        var $form = $("#appmsg-form");
        var $btn = $("#save-btn");
        if($btn.hasClass("disabled")) return;

        var submitData = {
                username: $("input[name='username']").val(),
                password: $("input[name='password']").val(),
                level: $("select[name='level']").val(),
                mobile: $("input[name='mobile']").val(),
                store_id: $("select[name='store_id']").val(),
                id : $('#hidden_id').val()
        };
        $btn.addClass("disabled");
        $.post('/admin/admin_add', submitData,function(data) {
            $btn.removeClass("disabled");
              alert(data.msg);
            if (data.success == 'yes') {

                location.href = "/admin/admin_list";
            }
        },"json");
        return false;
    }
});
 })
</script>
<body>
    <div class="row">

        <div class="span7">
            <div class="msg-editer-wrapper">
                <div class="msg-editer">
                    <form id="appmsg-form" class="form">
                      <input type="hidden" value="<?php if($admin){echo $admin->id;}?>" id="hidden_id">
                        <div class="control-group">
                        <label class="control-label">用户名</label>
                            <div class="controls">
                                <input type="text" name="username"  value="<?php if($admin){echo $admin->username;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">密码</label>
                            <div class="controls">
                                <input type="password" name="password"  value="<?php if($admin){echo $admin->password;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">手机号</label>
                            <div class="controls">
                                <input type="text" name="mobile"  value="<?php if($admin){echo $admin->mobile;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">级别</label>
                            <div class="controls">
                                <select name="level">
                                   <option value="1" <?php if($admin && ($admin->level == 1)){?>selected<?php }?>>店长</option>
                                   <option value="2" <?php if($admin && ($admin->level == 2)){?>selected<?php }?>>工作人员</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">分店</label>
                            <div class="controls">
                                <select name="store_id">
                                    <?php foreach($store as $k=>$v){?>
                                   	<option value="<?php echo $v->id;?>" <?php if($admin && ($v->id == $admin->store_id)){?>selected<?php }?>><?php echo $v->name;?></option>
                                   <?php }?>
                                </select>
                            </div>
                        </div>
                         <div class="control-group">
                            <div class="controls">
                              <button id="save-btn" type="submit" class="btn btn-primary btn-large">保存</button>
                              <button id="cancel-btn" type="button" class="btn btn-large">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
                <span class="abs msg-arrow a-out" style="margin-top: 0px;"></span>
                <span class="abs msg-arrow a-in" style="margin-top: 0px;"></span>
            </div>
        </div>
    </div>
</body>
</html>