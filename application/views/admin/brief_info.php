<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/appmsg.css" media="screen" />
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/static/ckeditor/ckeditor.js"></script>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>内容维护</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form class="form-horizontal form-label-left" data-parsley-validate="" id="demo-form" novalidate="">
                  <input type="hidden" id="type" name="type" value="<?php echo $type; ?>" />
                    <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">内容(CH)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea id="desc" name="desc"><?php if ($brief_info){ echo $brief_info->desc;}?></textarea>
                            <script type="text/javascript">
                                var desc = CKEDITOR.replace( 'desc');

                            </script>
                        </div>
                    </div>

                    <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">内容(EN)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea id="en_desc" name="en_desc"><?php if ($brief_info){ echo $brief_info->en_desc;}?></textarea>
                            <script type="text/javascript">
                               var en_desc = CKEDITOR.replace( 'en_desc' );
                            </script>
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
            desc:$.trim(desc.document.getBody().getHtml()),
            en_desc:$.trim(en_desc.document.getBody().getHtml()),
            type:$("input[name='type']",$form).val()
        };
         $.post('/admin/brief_info',submitData,function(data){

            if(data.success=="yes")
            {
               show_stack_modal('success',data.msg);
               common_go_next("/admin/brief_info/<?php echo $type;?>");
            }else
            {
               show_stack_modal('error',data.msg);
            }
        },"json");

        return false;
    }
});
  </script>
<?php $this->load->view('admin/common_footer');?>