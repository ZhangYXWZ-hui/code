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
<?php if($itemid) { ?>
<div class="main">
<div class="content">
<?php if($islink) { ?>
<a href="<?php echo $linkurl;?>" rel="external" class="b"><?php echo $linkurl;?></a><br/>
<?php } else { ?>
<?php echo $content;?>
<?php } ?>
</div>
</div>
<?php } else { ?>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<li><div<?php if($k==0) { ?> style="border:none;"<?php } ?>
><a href="about.php?itemid=<?php echo $v['itemid'];?>"><?php echo $v['title'];?></a></div></li>
<?php } } ?>
</ul>
</div>
<?php } ?>
<?php include template('footer', 'mobile');?>