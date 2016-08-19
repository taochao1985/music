<?php $this->load->view('admin/common_header');?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>微信设置</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  	<div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">AppID（应用ID） <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="field_one" name="field_one" required="required" value="<?php if($config){echo $config->field_one;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_two">AppSecert（应用密钥） <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="field_two" name="field_two" required="required" value="<?php if($config){echo $config->field_two;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">保存</button>
                        <button class="btn btn-primary form_cancel" type="button">返回</button>
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
		var case_count = $("#field_one").val();
		var phone = $('#field_two').val();
		var submitData = {
				content: case_count,
				phone:phone
		};

		$.post('/admin/wechat_config', submitData,function(data) {
			if (data.success == 'yes') {
			    show_stack_modal('success',data.msg);
			}  else{
				show_stack_modal('error','保存失败');
			}
		},"json");
	}
      return false;
    });
  </script>
<?php $this->load->view('admin/common_footer');?>