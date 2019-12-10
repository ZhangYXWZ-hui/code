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
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php echo $date;?>&nbsp;&nbsp;点击:<?php echo $hits;?></div>
<?php if($content) { ?><div class="content"><?php echo $content;?></div><?php } ?>
</div>
<?php } else { ?>
<div class="main">
<div class="title"><strong><?php echo $COM['company'];?></strong></div>
<div class="content">
<?php if($video) { ?>
<center><?php echo video5_player($video, 280, 210);?></center>
<?php } ?>
<?php if($thumb) { ?><center><img src="<?php echo $thumb;?>"/></center><?php } ?>
<?php echo $content;?>
</div>
</div>
<div class="blank-20"></div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="<?php echo $HURL;?>&action=credit">公司档案</a></div></li>
<li><div><a href="<?php echo $HURL;?>&action=contact">联系方式</a></div></li>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<li><div><a href="<?php echo $HURL;?>&action=<?php echo $action;?>&itemid=<?php echo $v['itemid'];?>"><?php echo $v['title'];?></a></div></li>
<?php } } ?>
</ul>
</div>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer', 'mobile');?>