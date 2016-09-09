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
<title>邮件地址设置</title>
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
            name:{required:true},
            chairman:{required:true},
            address:{required:true},
            phone:{required:true}
        },
    messages:{
            name:{required:"分店名必填"},
            chairman:{required:"负责人必填"},
            address:{required:"地址必填"},
            phone:{required:"电话必填"}
     },
    submitHandler: function() {

        var $form = $("#appmsg-form");
        var $btn = $("#save-btn");
        if($btn.hasClass("disabled")) return;

        var submitData = {
                name: $("input[name='name']").val(),
                chairman: $("input[name='chairman']").val(),
                address: $("input[name='address']").val(),
                phone: $("input[name='phone']").val(),
                id : $('#hidden_id').val()
        };
        $btn.addClass("disabled");
        $.post('/admin/store_add', submitData,function(data) {
            $btn.removeClass("disabled");
            if (data.success == 'yes') {
                alert(data.msg);
                location.href = "/admin/store_list";
            }  else{
                    alert("保存失败");
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
                      <input type="hidden" value="<?php if($store){echo $store->id;}?>" id="hidden_id">
                        <div class="control-group">
                        <label class="control-label">分店名</label>
                            <div class="controls">
                                <input type="text" name="name"  value="<?php if($store){echo $store->name;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">负责人</label>
                            <div class="controls">
                                <input type="text" name="chairman"  value="<?php if($store){echo $store->chairman;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">地址</label>
                            <div class="controls">
                                <input type="text" name="address"  value="<?php if($store){echo $store->address;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">电话</label>
                            <div class="controls">
                                <input type="text" name="phone"  value="<?php if($store){echo $store->phone;}?>" style="width:300px;">
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