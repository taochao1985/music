<xml>
<ToUserName><![CDATA[<?=$to?>]]></ToUserName>
<FromUserName><![CDATA[<?=$from?>]]></FromUserName>
<CreateTime><?=time()?></CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount><?php echo count($data);?></ArticleCount>
<Articles>
<?php foreach($data as $k=>$v){?>
<item>
<Title><![CDATA[<?php echo $v['title'];?>]]></Title>
<Description><![CDATA[<?php echo $v['summary'];?>]]></Description>
<PicUrl><![CDATA[<?php echo $v['img'];?>]]></PicUrl>
<Url><![CDATA[<?php echo $v['url'];?>]]></Url>
</item>
<?php }?>
</Articles>
</xml>