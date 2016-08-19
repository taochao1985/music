<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="stylesheet" href="/resource/css/admin/admin.css" media="screen" /> 
	<script type="text/javascript" src="/resource/js/jquery-1.7.2.min.js"></script>
 <style type="text/css">
   li{
   	width: 30%;float: left;
   	list-style-type: none; 
   	line-height: 30px;
   }
   .btn{
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border-color: #bbbbbb #bbbbbb #a2a2a2;
    border-image: none;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
    padding: 4px 12px;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
    margin-left:10px;
   }
   .btn-primary{
    background-color: #29bd35;
    background-image: linear-gradient(to bottom, #2cbd24, #24bd4f);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #ffffff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
   }
   select{
    background-color: #ffffff;
    border: 1px solid #cccccc;
    width: 100px;
    height: 30px;
    line-height: 30px;
   }
   input{
    height:30px;line-height:30px;border-radius:5px;border:1px solid #e2e2e2;
   }
 </style>
	<script type="text/javascript">
 
$(function(){ 
     $('.btn-primary').click(function(){
         var order_id = $(this).parent('li').attr('data_order_id');
         var prev_status = "<?php echo $order_info->jo_status;?>";
         var next_status = $('.order_deal').val();
         var shipping_no = $('.shipping_no').val();
         var comments = $.trim($(this).parent('li').find('.order_comments').val());
         var submitData = {order_id:order_id,prev_status:prev_status,next_status:next_status,comments:comments,shipping_no:shipping_no};
         $.post('/admin/order_change_status', submitData,function(data) {
          
          if (data.success == 'yes') {
            //  alert(data.msg);
              window.location.reload();
          }  else{
              alert("保存失败");             
          }
        },"json");

     })
});
</script>

</head>
<body>
<div class="main-title">
		<h3>订单详情</h3>
	</div>
<div class="container">

<fieldset>
  <legend>订单基本信息</legend>
  <ul>
    <li>订单号：<?php echo $order_info->jo_ordersn;?></li>
    <li>下单时间：<?php echo $order_info->jo_created;?></li>
    <li>订单状态：<?php echo $this->order_status[$order_info->jo_status];?></li>	
    <li>订单总价：<?php echo $order_info->jo_original_price;?></li>	
    <li>订单支付价：<?php echo $order_info->jo_pay_price;?></li>	    
    <li>订单支付方式：<?php echo $pay_way[$order_info->jo_pay_method];?></li>	
    <li>买家用户名：<?php echo $userinfo[0]->ju_nickname;?></li>
    <li>买家手机号：<?php echo $userinfo[0]->ju_mobile;?></li>
    <li>订单配送方式：<?php if($order_info->jo_shipping_method == 'ziqu'){ echo '自提';}else{echo '快递';}?></li>
    <?php if($order_info->jo_shipping_method){?>
       <li>自提时间：<?php echo $order_info->jo_pick_time;?></li>

    <?php }else{?>
       <li>快递地址：<?php echo $order_info->jo_address;?></li>
       <li>收件人姓名：<?php echo $order_info->jo_receiver;?></li>
       <li>收件人手机：<?php echo $order_info->jo_mobile;?></li>
    <?php }?>

  </ul>
</fieldset>

<fieldset>
  <legend>商品信息</legend>
  <?php foreach ($product_info as $key => $value) {?>
  
  <ul style="clear:both;marign-top:50px;">
    <li>商品名：<?php echo $value['product_info']->jd_name;?></li>
    <li>设计师：<?php echo $value['product_info']->jd_name;?></li>
    <li>设计系列：<?php echo $value['product_info']->jd_name;?></li>
    <li>商品类型：<?php echo $value['product_info']->cate_name;?></li>
    <li>商品材质：<?php echo $value['product_info']->material_name;?></li>	
    <li>商品尺寸：<?php echo $value['product_info']->size_name; if(($value['cart_info']->jc_sid == 43)&&($value['cart_info']->jc_diy_size)){ echo '&nbsp;/&nbsp;'.$value['cart_info']->jc_diy_size;}?></li>	
    <li>商品价格：<?php echo $value['price_stock_info']->jp_price;?></li>	 
    <li style="height:2px; width:100%;background-color:#e2e2e2;"></li>    
  </ul><br/><br/><br/>
 <?php  }?> 
</fieldset>

<fieldset>
  <legend>订单操作</legend>
    <ul>
    <li data_order_id="<?php echo $order_info->jo_ordersn;?>" style="width:100%;height:80px;">
      备注：<input type="text" value="<?php echo $order_info->jo_comments;?>" style="margin-bottom:10px;width:300px;" class="order_comments" /> <br/>
    <?php if($order_info->jo_status == 20){?>
       <select class="order_deal">
          <option value="21">商品准备中</option>
          <option value="40">退款中</option>
        </select>
      <input type="hidden" class="shipping_no" name="shipping_no"/> 
    <?php }else if($order_info->jo_status == 21){?>
        <select class="order_deal">
          <option value="22">正在配送</option> 
        </select>
         <?php if($order_info->jo_shipping_method=='kuaidi'){?>
          快递单号：
           <input type="text" class="shipping_no" name="shipping_no"/>
         <?php }else{?> 
          <input type="hidden" class="shipping_no" name="shipping_no"/>
         <?php }?>
    <?php }else if($order_info->jo_status == 22){?>
           <select class="order_deal">
            <option value="30">已收货</option>
            <option value="50">交易关闭</option>
          </select>
          <input type="hidden" class="shipping_no" name="shipping_no" value="<?php echo $order_info->jo_shipping_no;?>" /> 
    <?php }else if($order_info->jo_status == 40){?>
           <select class="order_deal"> 
            <option value="41">已退款</option>
          </select>
          <input type="hidden" class="shipping_no" name="shipping_no" value="<?php echo $order_info->jo_shipping_no;?>" /> 
    <?php }else if($order_info->jo_status == 41){?>
           <select class="order_deal"> 
            <option value="50">交易关闭</option>
          </select>
          <input type="hidden" class="shipping_no" name="shipping_no" value="<?php echo $order_info->jo_shipping_no;?>" /> 
    <?php }else{?>
          <input type="hidden" class="order_deal" value="<?php echo $order_info->jo_status;?>">
          <input type="hidden" class="shipping_no" name="shipping_no" value="<?php echo $order_info->jo_shipping_no;?>" /> 
    <?php }?>
      <input type="button" value="提交" class="btn-primary btn-small btn">
      <input type="button" onclick="location.href='/admin/order_list'" value="返回" class="btn btn-small"></li>
    </ul>
</fieldset>
</div> 
</body>
</html>