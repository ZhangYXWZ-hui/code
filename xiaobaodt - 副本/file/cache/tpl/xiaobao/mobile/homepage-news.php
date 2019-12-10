<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="<?php echo $HURL;?>&action=type&item=<?php echo $action;?>"><img src="static/img/icon-sort.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($itemid) { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php echo $date;?>&nbsp;&nbsp;点击:<?php echo $hits;?></div>
<div class="content"><?php echo $content;?></div>
</div>
<?php } else { ?>
<?php if($lists) { ?>
<ul class="list-txt">
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<li><span><?php echo $v['date'];?></span><a href="<?php echo $HURL;?>&action=<?php echo $action;?>&itemid=<?php echo $v['itemid'];?>"><?php echo $v['title'];?></a></li>
<?php } } ?>
</ul>
<?php } else { ?>
<?php include template('chip-empty', 'mobile');?>
<?php } ?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer', 'mobile');?>