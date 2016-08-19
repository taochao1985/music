<?php $this->load->view('admin/common_header');?>
<link rel="stylesheet" href="/static/css/appmsg.css" media="screen" />
<link rel="stylesheet" href="/static/css/appmsg-mul.css" media="screen" />
<link rel="stylesheet" href="/static/css/uploadify.css" media="screen" />

<script type="text/javascript" src="/static/js/operamasks-ui.min.js"></script>
<script type="text/javascript" src="/static/js/appmsg-mul.js"></script>
<script type="text/javascript" src="/static/js/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.json-2.4.min.js"></script>
<script type="text/javascript">window.UEDITOR_HOME_URL = '/ueditor/';</script>
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
<div class="row">
		<div class="x_title">
          <h2>多图文</h2>
        <?php if($keywords == 'first_follow'){?>  <ul class="nav navbar-right panel_toolbox">
            <li><button class="btn btn-success btn-xs" onclick="location.href='/admin/first_follow'">纯文本</button>
            </li>

            <li><button class="btn btn-success btn-xs" onclick="location.href='/admin/single_material_manage/first_follow'">单图文</button>
            </li>
          </ul>
        <?php }?>
          <div class="clearfix"></div>
        </div>
        <div class="span5 msg-preview col-md-4 col-sm-4 col-xs-12">
			<div class="msg-item-wrapper">
				<div id="appmsgItem1" class="appmsgItem msg-item">
					<p class="msg-meta">
						<span class="msg-date"><?php if ($material){ echo $createtime;}?></span>
					</p>
					<div class="cover">
						<p class="default-tip" <?php if ($material){?> style="display:none;"<?php }?>>封面图片</p>
						<h4 class="msg-t">
							<span class="i-title"><?php if ($material){ echo $material[0]['title'];}else{?>标题<?php }?></span>
						</h4>
						<ul class="abs tc sub-msg-opr">
							<li class="b-dib sub-msg-opr-item">
								<a href="javascript:;" class="th opr-icon edit-icon">编辑</a>
							</li>
						</ul>
						<img class="i-img" <?php if ($material){ ?>src="<?php echo $material[0]['coverurl'];}?>" style="">
					</div>


					<input type="hidden" value="<?php if ($material){ echo $material[0]['title'];}?>" class="title" />
					<input type="hidden" value="<?php if ($material){ echo $material[0]['coverurl'];}?>"  class="cover" />
					<input type="hidden" value="<?php if ($material){ echo $material[0]['coverurl'];}?>"  class="coverurl" />
					<textarea style="display: none;" class="content">
						<?php if ($material){ echo $material[0]['content'];}?>
					</textarea>

					<input type="hidden" value="<?php if ($material){ echo $material[0]['source_url'];}?>"  class="sourceurl" />
				</div>
     <?php if($material){foreach ($material as $key => $value) { if($key >0){?>
     		<div class="rel sub-msg-item appmsgItem">
					<span class="thumb-new">
					<img src="<?php echo $value['coverurl'];?>" class="i-img">
					</span>
					<h4 class="msg-t">
					<span class="i-title"><?php echo $value['title'];?></span>
					</h4>
					<ul class="abs tc sub-msg-opr">
						<li class="b-dib sub-msg-opr-item">
							<a href="javascript:;" class="th opr-icon edit-icon">编辑</a>
						</li>
						<li class="b-dib sub-msg-opr-item">
							<a href="javascript:;" class="th opr-icon del-icon">删除</a>
						</li>
					</ul>
					<input type="hidden" class="title" value="<?php echo $value['title'];?>" />
					<input type="hidden" class="cover" value="<?php echo $value['coverurl'];?>" />
					<input type="hidden" class="coverurl" value="<?php echo $value['coverurl'];?>"/>
					<textarea style="display: none;" class="content">
						<?php echo $value['content'];?>
					</textarea>
					<input type="hidden" class="sourceurl" value="<?php echo $value['source_url'];?>" />
				</div>
     <?php }}}?>
				<div class="rel sub-msg-item appmsgItem">
					<span class="thumb-new">
					<span class="default-tip" style="">缩略图</span>
					<img src="" class="i-img" style="display:none">
					</span>
					<h4 class="msg-t">
					<span class="i-title">标题</span>
					</h4>
					<ul class="abs tc sub-msg-opr">
						<li class="b-dib sub-msg-opr-item">
							<a href="javascript:;" class="th opr-icon edit-icon">编辑</a>
						</li>
						<li class="b-dib sub-msg-opr-item">
							<a href="javascript:;" class="th opr-icon del-icon">删除</a>
						</li>
					</ul>
					<input type="hidden" class="title" />
					<input type="hidden" class="cover" />
					<input type="hidden" class="coverurl" />
					<input type="hidden" class="content" />
					<input type="hidden" class="sourceurl" />
				</div>

				<div class="sub-add">
				<a href="javascript:;" class="block tc sub-add-btn">
				<span class="vm dib sub-add-icon"></span>增加一条</a>
				</div>
			</div>
		</div>
		<div class="span7 col-md-8 col-sm-8 col-xs-12">
			<div class="msg-editer-wrapper">
				<div class="msg-editer">
				<form id="appmsg-form" class="form-horizontal form-label-left">
					<div class="item form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">标题 <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
					    	<input type="text" value="<?php if ($material){ echo $material[0]['title'];}?>" id="title" class="form-control col-md-4 col-xs-12"  name="title" required="required"/>
					    </div>
				    </div>
				    <div class="item form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">封面</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="cover-area">
								<div class="cover-hd">
									<input id="file_upload" name="file_upload" type="file" />
									<input id="coverurl" value="" name="coverurl" type="hidden" />
								</div>
								<p id="upload-tip" class="upload-tip">大图片建议尺寸：700像素 * 300像素</p>
								<p id="imgArea" class="cover-bd" style="display: none;">
								<img src="" id="img">
								<a href="javascript:;" class="vb cover-del" id="delImg">删除</a>
								</p>
							</div>
						</div>
					</div>
				  	<div class="item form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12">正文</label>
					    <div class="col-md-6 col-sm-6 col-xs-12">
							<script type="text/plain" id="editor"></script>
						</div>
					</div>
				  	<div id="url-block" class="item form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">来源</label>
					    <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="source_url" class="form-control col-md-4 col-xs-12" value=""  name="source_url" />
						</div>
					</div>
					<div class="item form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12">关键词</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
						    	<input type="text" value="<?php echo $keywords;?>" id="keywords" class="form-control col-md-4 col-xs-12" name="keywords" />
						    </div>
					    </div>
				  <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit" id="save-btn">保存</button>
                        <button class="btn btn-primary form_go_back" type="button">返回</button>
                      </div>
                    </div>
				    <input id="m_id" name="m_id" type="hidden" value="<?php  echo $m_id; ?>" />
				</div>
				</form>
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