<div class="pagination">
  <ul>
  <li><a href="<?php echo $url.'1';?>">首页</a></li>
<?php if($current_page=='1'){?><li class="disabled" ><span>上一页</span></li>
     <?php }else{?>
     <li><a href="<?php echo $url.($current_page-1);if(isset($extra)){ foreach($extra as $k=>$v){ echo '/'.$v;}}?>">上一页</a></li>
     <?php }?>
    <?php if($total <=5){?>
    		<?php for ($i=1;$i<=$total;$i++){?>
		       <?php if($current_page==$i){?>
		       		<li class="active"><span><?php echo $i;?></span></li>
		       <?php }else{?>
		      		 <li><a href="<?php echo $url.$i;if(isset($extra)){ foreach($extra as $k=>$v){ echo '/'.$v;}}?>"><?php echo $i;?></a></li>
		      <?php }?>
		    <?php }?>
    <?php }else{
			if ($current_page <=3) {
				$n=1;
			}else{
				$n = $current_page -2;
			}
	//计算最后一个页数
			if ($n > ($total-5)) {
				$n = $total-4;
			}

			if($n>1){
		?>
			<li><a href="javascript:void(0)">...</a></li>
		<?php 	}
			for($i=$n;$i<$n+5;$i++){
		?>
			    <li <?php if($current_page == $i){?>class="active" <?php }?>>
            	<a href="<?php echo $url.$i;if(isset($extra)){ foreach($extra as $k=>$v){ echo '/'.$v;}}?>"><?php echo $i;?></a>
            </li>
<!-- 大于5页 -->

        <?php }
            if($total>($current_page+2)){?>
            	<li><a href="javascript:void(0)">...</a></li>
            <?php }
            }?>

    <?php if ($current_page==$total){?>
    <li class="disabled"><span>下一页</span></li>
    <?php }else{?>
     <li><a href="<?php echo $url.($current_page+1);if(isset($extra)){ foreach($extra as $k=>$v){ echo '/'.$v;}}?>">下一页</a></li>
     <?php }?>
     <li><a href="<?php echo $url.$total;?>">末页</a></li>
  </ul>
</div>