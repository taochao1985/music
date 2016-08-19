<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/asset/bootstrap/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/admin.css" media="screen" />
<link rel="stylesheet" href="/asset/resource/css/admin/appmsg.css" media="screen" />
<link rel="stylesheet" href="/asset/jquery-ui/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
<link rel="stylesheet" href="/asset/resource/css/plugin/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="/asset/resource/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/asset/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/asset/jquery-ui/js/jquery-ui-1.10.0.custom.min.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/timepicker/jquery-ui-timepicker-zh-CN.js"></script>
<script type="text/javascript" src="/asset/resource/js/plugin/timepicker/jquery-ui-sliderAccess.js"></script>
<title>课程设置</title>
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
    $('#start_date').datepicker();
    $('#end_date').datepicker();
var validator = $("#appmsg-form").validate({
        rules:{
            name:{required:true},
            start_date:{required:true},
            end_date:{required:true},
            money:{required:true},
            course_num:{required:true},
        },
    messages:{
            name:{required:"课程名必填"},
            start_date:{required:"开课日期必填"},
            end_date:{required:"结束日期必填"},
            money:{required:"学费必填"},
            course_num:{required:"课时必填"}
     },
    submitHandler: function() {

        var $form = $("#appmsg-form");
        var $btn = $("#save-btn");
        if($btn.hasClass("disabled")) return;
        var store_id = '';
        $("input[type=checkbox][name=store_id]").each(function(){
                        if($(this).prop("checked")){
                            store_id += $(this).val()+',';
                        }
                    });
        var submitData = {
                name: $("input[name='name']").val(),
                start_date: $("input[name='start_date']").val(),
                end_date: $("input[name='end_date']").val(),
                money: $("input[name='money']").val(),
                course_num: $("input[name='course_num']").val(),
                remark: $("#remark").val(),
                store_id:store_id,
                id : $('#hidden_id').val()
        };
        $btn.addClass("disabled");
        $.post('/admin/course_add', submitData,function(data) {
            $btn.removeClass("disabled");
            if (data.success == 'yes') {
                alert(data.msg);
                location.href = "/admin/course_list";
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
                      <input type="hidden" value="<?php if($course){echo $course->id;}?>" id="hidden_id">
                        <div class="control-group">
                        <label class="control-label">课程名</label>
                            <div class="controls">
                                <input type="text" name="name"  value="<?php if($course){echo $course->name;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">分店</label>
                            <div class="controls">
                                <?php if($store){ foreach ($store as $key => $value) {?>
                                    <?php echo $value->name;?>&nbsp;<input type="checkbox" name="store_id" <?php if($course&&(in_array($value->id,$store_id))){?>checked<?php }?> value="<?php echo $value->id?>" >&nbsp;&nbsp;&nbsp;
                                <?php }}?>

                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">开课时间</label>
                            <div class="controls">
                                <input type="text" name="start_date" id="start_date"  value="<?php if($course){echo $course->start_date;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">结束时间</label>
                            <div class="controls">
                                <input type="text" name="end_date" id="end_date" value="<?php if($course){echo $course->end_date;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">学费</label>
                            <div class="controls">
                                <input type="text" name="money"  value="<?php if($course){echo $course->money;}?>" style="width:300px;">
                            </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">课时</label>
                            <div class="controls">
                                <input type="text" name="course_num"  value="<?php if($course){echo $course->course_num;}?>" style="width:300px;">
                            </div>
                        </div>

                        <div class="control-group">
                        <label class="control-label">备注</label>
                            <div class="controls">
                                <textarea name="remark" id="remark"></textarea>
                            </div>
                        </div>

                         <div class="control-group">
                            <div class="controls">
                              <button id="save-btn" type="submit" class="btn btn-primary btn-large">保存</button>
                              <button id="cancel-btn" type="button" class="btn btn-large">返回</button>
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