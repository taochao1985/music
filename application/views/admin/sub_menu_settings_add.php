<?php $this->load->view('admin/common_header');?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>新增子菜单</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">

						<input type="hidden" id="me_id" name="me_id" value="<?php echo $me_id; ?>" />
						<input type="hidden" id="main_id" name="main_id" value="<?php echo $main_id; ?>" />
                  	<div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">按钮名称
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="main_menu" type="text" readonly="" value="<?php if (isset($main_menu_settings)){ echo $main_menu_settings->tms_main_menu; }?>"  name="main_menu">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">按钮关键字
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="main_key" type="text" readonly="" value="<?php if (isset($main_menu_settings)){ echo $main_menu_settings->tms_main_key; }?>"  name="main_key">
                      </div>
                    </div>

                  	<div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">子按钮名称 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="sub_menu" name="sub_menu" required="required" value="<?php if(isset($menu_settings)){echo $menu_settings->tms_sub_menu;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_two">子按钮类型 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="sub_type" class="form-control">
          						     <option value="click" <?php if (isset($menu_settings)){ if($menu_settings->tms_sub_type=='click'){?> selected<?php } }?> >触发关键词</option>
          						     <option value="view" <?php if (isset($menu_settings)){ if($menu_settings->tms_sub_type=='view'){?> selected<?php } }?>>跳转网页</option>
          					   </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">关键词
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="sub_key" name="sub_key"  value="<?php if(isset($menu_settings)){echo $menu_settings->tms_sub_key;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">跳转URL
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="sub_url" name="sub_url"  value="<?php if(isset($menu_settings)){echo $menu_settings->tms_sub_url;}?>" class="form-control col-md-7 col-xs-12">
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
      $form = $('#demo-form');
      if (submit){
		var submitData={
			main_menu:$("input[name='main_menu']",$form).val(),
			main_key:$("input[name='main_key']",$form).val(),
			main_id:$("input[name='main_id']",$form).val(),
			me_id:$("input[name='me_id']",$form).val(),
			sub_menu:$("input[name='sub_menu']",$form).val(),
		    sub_key:$("input[name='sub_key']",$form).val(),
		    sub_url:$("input[name='sub_url']",$form).val(),
		    sub_type:$("select[name='sub_type']",$form).val()
		};
		 $.post('/admin/sub_menu_settings_add',submitData,function(data){

			if(data.success=="token"){
				show_stack_modal('error','此菜单已经被使用过');
			}else if(data.success=="yes")
			{
			   show_stack_modal('success',data.msg);
			   common_go_next("/admin/menu_settings_index");
			}

			else
			{
			   show_stack_modal('error','修改失败错误的填写信息');
			}
		},"json");

		return false;
	}
});
  </script>
<?php $this->load->view('admin/common_footer');?>