<?php $this->load->view('admin/common_header');?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>新增菜单</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="main_id" name="main_id" value="<?php if (isset($menu_settings)){ echo $menu_settings->id; }else{?>0<?php }?>" />
                  	<div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">按钮名称 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="main_menu" name="main_menu" required="required" value="<?php if(isset($menu_settings)){echo $menu_settings->tms_main_menu;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_two">按钮类型 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="main_type" class="select2_single form-control" tabindex="-1">
          						     <option value="click" <?php if (isset($menu_settings)){ if($menu_settings->tms_main_type=='click'){?> selected<?php } }?> >触发关键词</option>
          						     <option value="view" <?php if (isset($menu_settings)){ if($menu_settings->tms_main_type=='view'){?> selected<?php } }?>>跳转网页</option>
          					   </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">关键词
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="main_key" name="main_key"  value="<?php if(isset($menu_settings)){echo $menu_settings->tms_main_key;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">跳转URL
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="main_url" name="main_url"  value="<?php if(isset($menu_settings)){echo $menu_settings->tms_main_url;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">保存</button>
                        <button class="btn btn-primary form_go_back" type="button">返回</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

  <script type="text/javascript">
$(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
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
			main_type:$("select[name='main_type']",$form).val(),
			main_url:$("input[name='main_url']",$form).val(),
		};
		 $.post('/admin/menu_settings_add',submitData,function(data){

			if(data.success=="token"){
				show_stack_modal('error','此菜单已经被使用过');
			}else if(data.success=="yes")
			{
			   show_stack_modal('success',data.msg);
			   common_go_next("/admin/menu_settings_index");
			}else
			{
			   show_stack_modal('error','修改失败错误的填写信息');
			}
		},"json");

		return false;
	}
});
  </script>
<?php $this->load->view('admin/common_footer');?>