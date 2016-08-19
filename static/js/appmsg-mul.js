$(function() {

	 $('#file_upload').each(function(){
			var $fileInput = $(this);
			var $cont =  $fileInput.closest(".cont");
			var name = $fileInput.attr("name");
			$fileInput.uploadify({
				'swf'      : '/static/swf/uploadify.swf',
				'uploader' : '/uploads.php',
				'onUploadSuccess' : function(file,data,response)  {
					var jsonData = eval("("+data+")");
		        	$(".default-tip",window.appmsg).hide();
		            $(".i-img",window.appmsg).attr("src", jsonData.fileUrl).show();
		            $("#imgArea").show().find(" #img").attr("src", jsonData.fileUrl);
		            $(".cover",window.appmsg).val(jsonData.fileUrl);
		            $(".coverurl",window.appmsg).val(jsonData.fileUrl);

			    }

			});
		});
    $(".msg-editer #title").bind("keyup",function() {
        $(".i-title",window.appmsg).text($(this).val());
        $(".title",window.appmsg).val($(this).val());
    });
    $(".msg-editer #source_url").bind("keyup",function() {
    	$(".sourceurl",window.appmsg).val($(this).val());
    });
    $('#url-block-link').click(function() {
        $('#url-block').show();
        $(this).hide();
    });
    $("#delImg").click(function() {icon18
        $(".default-tip",window.appmsg).show();
        $("#imgArea").hide();
        $(".cover,.coverurl",window.appmsg).val('');
        $(".i-img",window.appmsg).hide();
    });
    $("#cancel-btn").click(function(event) {
        event.stopPropagation();
        location.href = "/main/multiply_materials";
        return;
    });
    $("#appmsgItem1,.sub-msg-item").on({
        mouseover: function() {
            $(this).addClass("sub-msg-opr-show");
        },
        mouseout: function() {
            $(this).removeClass("sub-msg-opr-show");
        }
    });
    $(".sub-add-btn").click(function() {
        var len = $(".sub-msg-item").size();
        if (len >= 7) {
            alert("最多只能加入8条图文信息");
            return;
        }
        var $lastItem = $(".sub-msg-item:last");
        var $newItem = $lastItem.clone();
        $("input,textarea",$newItem).val("");
        $(".i-title",$newItem).text("");
        $(".default-tip",$newItem).css("display","block");
        $(".cover,.coverurl",$newItem).val('');
        $(".i-img",$newItem).hide();
        $(".rid",$newItem).remove();
        $lastItem.after($newItem);
    });
    $(".sub-msg-opr .edit-icon").on("click", function() {
    	// 同步htmleditor的内容
    	//window.appmsg.find(".content").val(window.msg_editor.getContent());

    	var $msgItem = $(this).closest(".appmsgItem");
    	var index = $(".appmsgItem").index($msgItem);
    	window.appmsgIndex = index;
    	window.appmsg = $msgItem;
    	$("#title").val($(".title",$msgItem).val());
    	if($(".coverurl",$msgItem).val() == ""){
    		$("#imgArea").hide();
    	} else{
    		$("#imgArea").show().find("#img").attr("src", $(".coverurl",$msgItem).val());
    	}
    	if($(".sourceurl",$msgItem).val() == ""){
    		$("#url-block-link").show();
    		$("#url-block").hide().find("#source_url").val("");
    	} else {
    		$("#url-block-link").hide();
    		$("#url-block").show().find("#source_url").val($(".sourceurl",$msgItem).val());
    	}
    	window.msg_editor.setContent($(".content",$msgItem).val());
        if (index == 0) {
            $(".msg-editer-wrapper").css("margin-top", "0px");
        } else {
            var top = 110 + $(".sub-msg-item").eq(0).outerHeight(true) * index;
            $(".msg-editer-wrapper").css("margin-top", top + "px");
        }
    });
    $(".sub-msg-opr .del-icon").on("click", function() {
        var len = $(".appmsgItem").size();
        if (len <= 2) {
            alert("无法删除，多条图文至少需要2条消息。");
            return;
        }
        if (confirm("确认删除此消息？")) {
            var $msgItem = $(this).closest(".sub-msg-item");
            if($(".rid",$msgItem).size() > 0){
            	window.delResId.push($(".rid",$msgItem).val());
            }
            $msgItem.remove();
        }
    });
    // 正在编辑的图文的索引
    window.appmsgIndex = 0;
    // 正在编辑的图文
    window.appmsg = $("#appmsgItem1");
    // 被删除的图文ID
    window.delResId = [];

    window.msg_editor = new UE.ui.Editor({
        initialFrameWidth: 498
    });
    window.msg_editor.render('editor');
    window.msg_editor.addListener("contentChange",function(){
    	$(".content",window.appmsg).val(window.msg_editor.getContent());
    });


    $("#save-btn").click(function(){
    	var $btn = $(this);
    	if($btn.hasClass("disabled")) return;
    	// 同步htmleditor的内容
    	window.appmsg.find(".content").val(window.msg_editor.getContent());

    	var valid = true;
    	var $msgItem;
    	var jsonData = [];
    	$(".appmsgItem").each(function(index,msgItem){
    		$msgItem = $(msgItem);
    		var id = $("#m_id").val();
    		var title = $("input.title",$msgItem).val();
    		var cover = $("input.cover",$msgItem).val();
    		var content = $("textarea.content",$msgItem).val();
    		var sourceurl = $("input.sourceurl",$msgItem).val();
            if(index ==0){
        		if(title == ""){
        			alert("标题不能为空");
        			valid = false;
        			return false;
        		}
        		if(cover == ""){
        			alert("必须上传一个封面图片");
        			valid = false;
        			return false;
        		}
        		if(content == ""){
        			alert("正文不能为空");
        			valid = false;
        			return false;
        		}

            }
    		jsonData[index] = {
    			"title":title,
    			"cover":cover,
    			"content":content,
    			"sourceurl":sourceurl
    		};
    		if($(".rid",$msgItem).size() > 0){
    			jsonData[index].rid = $(".rid",$msgItem).val();
    		}
    	});
   		var keyword = $("#keywords").val();
		if(keyword==""){
			alert("请输入关键字!");
			return false;
		}
    	if(!valid){
    		$(".edit-icon",$msgItem).click();
    		return false;
    	}
    	var sumbitData = {
    		"jsonData" : $.toJSON(jsonData),
    		"keywords":keyword,
    		"m_id":$("#m_id").val()
    	};
    	if(window.delResId.length > 0){
    		sumbitData.delResId = $.toJSON(window.delResId);
    	}
    	//$btn.addClass("disabled");
    	$.post("/admin/multiply_material_manage",sumbitData,function(data){
			$btn.removeClass("disabled");
			if (data.success == 'yes') {
                if($("#m_id").val() == 'first_follow'){
                  location.href = "/admin/multiply_material_manage/first_follow";
                }else{

                  location.href = "/admin/multiply_list";
                }
			}  else{

			  alert(data.msg);

			}
    	},"json");
    });
});