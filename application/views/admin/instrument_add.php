<?php $this->load->view('admin/common_header');?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>乐器设置</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                    <input type="hidden" id="id" value="<?php if($instrument){echo $instrument->id;}?>">
                  	<div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">中文名 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" required="required" value="<?php if($instrument){echo $instrument->name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="en_name">英文名 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="en_name" name="en_name" required="required" value="<?php if($instrument){echo $instrument->en_name;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="display_order">排序 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="display_order" name="display_order" required="required" value="<?php if($instrument){echo $instrument->display_order;}?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-primary form_cancel" type="button">Back</button>
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
		var display_order = $("#display_order").val();
		var name = $('#name').val();
		var en_name = $('#en_name').val();
		var id = $('#id').val();
		var submitData = {
				id: id,
				name:name,
				en_name:en_name,
				display_order:display_order,
		};

		$.post('/admin/instrument_add', submitData,function(data) {
			if (data.success == 'yes') {
			    show_stack_modal('success',data.msg);
			    location.href = "/admin/instrument_list";
			}  else{
				show_stack_modal('error','保存失败');
			}
		},"json");
	}
      return false;
    });
  </script>
<?php $this->load->view('admin/common_footer');?>