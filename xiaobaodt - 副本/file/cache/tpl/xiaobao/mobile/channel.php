<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<style type="text/css">
.home-search {text-align:center;padding:10px;}
.home-search div {height:28px;line-height:28px;background:#FFFFFF;border-radius:4px;}
.home-search img {width:16px;height:16px;vertical-align:top;padding-top:6px;padding-right:8px;}
.home-search span {color:#8E8E93;font-size:14px;font-weight:normal;}
</style>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-title">频道</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="home-search">
<div><a href="search.php"><img src="static/img/ico-search.png"/><span>输入关键词搜索</span></a></div>
</div>
<div class="list-set">
<ul>
<?php if(is_array($MOB_MODULE)) { foreach($MOB_MODULE as $i => $m) { ?>
<li><div<?php if($i==0) { ?> style="border:none;"<?php } ?>
><a href="<?php echo mobileurl($m['moduleid']);?>"><?php echo $m['name'];?></a></div></li>
<?php } } ?>
</ul>
</div>
<?php include template('footer', 'mobile');?>