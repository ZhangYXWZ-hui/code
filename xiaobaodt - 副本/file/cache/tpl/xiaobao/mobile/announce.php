<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">网站公告</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($itemid) { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<?php if($islink) { ?>
<div class="info"><?php echo $adddate;?></div>
<div class="content"><a href="<?php echo $linkurl;?>" rel="external" class="b"><?php echo $linkurl;?></a><br/></div>
<?php } else { ?>
<div class="info"><?php echo $adddate;?>&nbsp;&nbsp;点击:<?php echo $hits;?></div>
<div class="content"><?php echo $content;?></div>
<?php } ?>
</div>
<?php } else { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img" style="height:60px;padding:0 20px;">
<ul>
<li><a href="announce.php?itemid=<?php echo $v['itemid'];?>"><strong><?php echo $v['title'];?></a></strong></li>
<li><span><?php echo $v['date'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php } ?>
<?php include template('footer', 'mobile');?>