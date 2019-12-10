<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $MOD['name'];?>分类</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="list-set">
<ul>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<li><div<?php if($k==0) { ?> style="border:none;"<?php } ?>
><a href="<?php if($v['child']) { ?>category.php?moduleid=<?php echo $moduleid;?>&pid=<?php echo $v['catid'];?><?php } else { ?><?php echo mobileurl($moduleid, $v['catid']);?><?php } ?>
"><?php echo $v['catname'];?></a></div></li>
<?php } } ?>
</ul>
</div>
<?php include template('footer', 'mobile');?>