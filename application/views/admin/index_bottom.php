<?php $this->load->view('admin/common_header');?>

<script type="text/javascript">window.UEDITOR_HOME_URL = '/ueditor/';</script>
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>首页底部内容配置</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  	<div class="form-group">
                      <label class="control-label col-md-1 col-sm-1 col-xs-12">具体内容 <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <script type="text/plain" id="editor"><?php if ($config){ echo $config->field_one;}?></script>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-primary form_cancel" type="button">Cancel</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
  <script type="text/javascript">
  window.msg_editor = new UE.ui.Editor({initialFrameWidth:498});
  window.msg_editor.render('editor');
    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }
      if (submit){
		var $form = $("#demo-form");
    var editorContent = msg_editor.getContent();
		var submitData = {
				content: editorContent
		};
		$.post('/admin/index_bottom', submitData,function(data) {
			if (data.success == 'yes') {
			    show_stack_modal('error','data.msg');
				window.location.reload();
			}  else{
				alert("");
				show_stack_modal('error','保存失败');
			}
		},"json");
		return false;
	}
});
  </script>
<?php $this->load->view('admin/common_footer');?>
