<?php $this->load->view('admin/common_header');?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>纯文本内容</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><button class="btn btn-success btn-xs" onclick="location.href='/admin/single_material_manage/first_follow'">单图文</button>
                    </li>

                    <li><button class="btn btn-success btn-xs" onclick="location.href='/admin/multiply_material_manage/first_follow'">多图文</button>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  	<div class="form-group">
                      <label class="control-label col-md-1 col-sm-1 col-xs-12">具体内容 <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea placeholder="请输入文本" rows="3" class="form-control" id="field_one"><?php if($config){echo $config->field_one;}?></textarea>
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
    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this))) {
        submit = false;
      }
      if (submit){
		var $form = $("#demo-form");
		var case_count = $("#field_one").val();
		if( case_count == ''){
			show_stack_modal('error','文本内容必填');
			return false;
		}
		var submitData = {
				content: case_count
		};
		$.post('/admin/first_follow', submitData,function(data) {
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