<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/appmsg.css" media="screen" />
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />
<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/static/js/appmsg.js"></script>
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
<script type="text/javascript">window.UEDITOR_HOME_URL = '/ueditor/';</script>
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<div class="row">
		<div class="x_title">
          <h2>单图文</h2>
        <?php if($keywords == 'first_follow'){?>  <ul class="nav navbar-right panel_toolbox">
            <li><button class="btn btn-success btn-xs" onclick="location.href='/admin/first_follow'">纯文本</button>
            </li>

            <li><button class="btn btn-success btn-xs" onclick="location.href='/admin/multiply_material_manage/first_follow'">多图文</button>
            </li>
          </ul>
        <?php }?>
          <div class="clearfix"></div>
        </div>
		<div class="span5 msg-preview col-md-4 col-sm-4 col-xs-12">
			<div class="msg-item-wrapper">
				<div id="appmsgItem1" class="msg-item">
					<h4 class="msg-t">
						<span class="i-title"><?php if ($material){ echo $material->title;}else{?>标题<?php }?></span>
					</h4>
					<p class="msg-meta">
						<span class="msg-date"><?php if ($material){ echo $material->createtime;}else{?>2013-06-25<?php }?></span>
					</p>
					<div class="cover">
						<p class="default-tip" <?php if ($material){ ?>style="display: none;"<?php }?>>封面图片</p>
						<img class="i-img"  <?php if ($material){ ?>src="<?php echo $material->coverurl;}?>" style="">
					</div>
					<p class="msg-text"><?php if ($material){ echo $material->summary;}?></p>
				</div>
				<div class="msg-hover-mask"></div>
				<div class="msg-mask">
					<span class="dib msg-selected-tip"></span>
				</div>
			</div>
		</div>
		<div class="span7 col-md-8 col-sm-8 col-xs-12">
			<div class="msg-editer-wrapper">
				<div class="msg-editer">
					<form id="appmsg-form" class="form-horizontal form-label-left">
					<div class="item form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="field_one">标题 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="title" name="title" required="required" value="<?php if ($material){ echo $material->title;}?>" class="form-control col-md-4 col-xs-12">
                      </div>
                    </div>
					    <div class="item form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">封面</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="cover-area">
									<div class="cover-hd">
										<input id="file_upload" class="file_upload" name="file_upload" type="file" />
										<input id="coverurl" value="<?php if ($material){ echo $material->coverurl;}?>" name="coverurl" type="hidden" />
									</div>
									<p id="upload-tip" class="upload-tip">大图片建议尺寸：700像素 * 300像素</p>
									<p id="imgArea" class="cover-bd" <?php if(!$material){?>style="display: none;"<?php }?>>
									<img src="<?php if ($material){ echo $material->coverurl;}?>" id="img">
									<a href="javascript:;" class="vb cover-del" id="delImg">删除</a>
									</p>
								</div>
							</div>
						</div>
					  	<div id="desc-block" <?php if ($material){ if (!$material->summary){?> style="display: none;" <?php }}?> class="item form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">摘要</label>
						    <div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="summary" id="summary" class="msg-txta"><?php if ($material){ echo $material->summary;}?></textarea>
							</div>
						</div>


					  	<div class="item form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">正文</label>
						    <div class="col-md-6 col-sm-6 col-xs-12">
								<script type="text/plain" id="editor"><?php if ($material){ echo $material->content;}?></script>
							</div>
						</div>
					  	<div id="url-block" <?php if ($material){ if (!$material->source_url){?>style="display: none;"<?php }}?> class="item form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">来源</label>
						    <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="source_url" class="form-control col-md-4 col-xs-12" value="<?php if ($material){ echo $material->source_url;}?>"  name="source_url" />
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">关键词<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
						    	<input type="text" value="<?php echo $keywords;?>" id="keywords" class="form-control col-md-4 col-xs-12" name="keywords" />
						    </div>
					    </div>
					  	<div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-primary form_go_back" type="button">Back</button>
                      </div>
                    </div>

					    <input id="m_id" name="m_id" type="hidden" value="<?php  echo $m_id; ?>" />
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

});
  </script>
<?php $this->load->view('admin/common_footer');?>