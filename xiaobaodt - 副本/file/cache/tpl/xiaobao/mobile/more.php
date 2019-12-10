<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-title">更多</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($DT['city']) { ?>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<li><div style="border:none;"><span><?php echo $city_name;?></span><a href="city.php">切换分站</a></div></li>
</ul>
</div>
<?php } ?>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="about.php" class="my-link">关于网站</a></div></li>
<li><div><a href="announce.php">最新公告</a></div></li>
<?php if($DT['telephone']) { ?>
<li><div><a href="tel:<?php echo $DT['telephone'];?>">客服电话</a></div></li>
<?php } ?>
</ul>
</div>
<div class="blank-35"></div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="guestbook.php">意见反馈</a></div></li>
<li><div><a href="tips.php">技巧提示</a></div></li>
<?php if(!in_array($DT_MOB['browser'], array('app', 'b2b', 'screen'))) { ?>
<li><div><a href="mobile.php?action=pc" rel="external">电脑版</a></div></li>
<?php } ?>
<?php if($app) { ?>
<li><div><a href="<?php echo $app;?>" rel="external">安装APP</a></div></li>
<?php } ?>
</ul>
</div>
<div class="blank-35"></div>
<?php include template('footer', 'mobile');?>