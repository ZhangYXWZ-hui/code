<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($_TYPE) { ?>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="<?php echo $HURL;?>&action=<?php echo $item;?>">全部分类</a></div></li>
<?php if(is_array($_TP['0'])) { foreach($_TP['0'] as $k0 => $v0) { ?>
<li><div><a href="<?php echo $HURL;?>&action=<?php echo $item;?>&typeid=<?php echo $v0['typeid'];?>"><?php echo $v0['typename'];?></a></div></li>
<?php if(isset($_TP['1'][$v0['typeid']])) { ?>
<?php if(is_array($_TP['1'][$v0['typeid']])) { foreach($_TP['1'][$v0['typeid']] as $v1) { ?>
<li><div><a href="<?php echo $HURL;?>&action=<?php echo $item;?>&typeid=<?php echo $v1['typeid'];?>">&nbsp;&nbsp;- <?php echo $v1['typename'];?></a></div></li>
<?php } } ?>
<?php } ?>
<?php } } ?>
</ul>
</div>
<?php } else { ?>
<div class="list-empty">暂无分类</div>
<?php } ?>
<?php include template('footer', 'mobile');?>