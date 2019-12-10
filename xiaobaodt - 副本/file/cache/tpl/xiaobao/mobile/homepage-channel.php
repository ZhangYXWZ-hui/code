<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<?php if($action == 'mall' || $action == 'sell') { ?>
<div class="head-bar-right">
<a href="<?php echo $HURL;?>&action=type&item=<?php echo $action;?>"><img src="static/img/icon-sort.png" width="24" height="24"/></a>
</div>
<?php } ?>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<?php if($action == 'mall') { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>static/img/nopic-60.png<?php } ?>
" width="60" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li class="price"><?php echo $DT['money_sign'];?><?php echo $v['price'];?></li>
<li><em><?php echo $v['date'];?></em></li>
</ul>
</div>
<?php } else if($action == 'sell') { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>static/img/nopic-60.png<?php } ?>
" width="60" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><em><?php echo $v['date'];?></em></li>
<li><span><?php echo $v['introduce'];?></span></li>
</ul>
</div>
<?php } else if($action == 'buy') { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>static/img/nopic-60.png<?php } ?>
" width="60" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><em><?php echo $v['date'];?></em></li>
<li><span><?php echo $v['introduce'];?></span></li>
</ul>
</div>
<?php } else if($action == 'job') { ?>
<div class="list-img">
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li class="f_orange px12">
<?php if($v['minsalary'] && $v['maxsalary']) { ?>
<?php echo $v['minsalary'];?>-<?php echo $v['maxsalary'];?><?php echo $DT['money_unit'];?>/月
<?php } else if($v['minsalary']) { ?>
<?php echo $v['minsalary'];?><?php echo $DT['money_unit'];?>/月以上
<?php } else if($v['maxsalary']) { ?>
<?php echo $v['maxsalary'];?><?php echo $DT['money_unit'];?>/月以内
<?php } else { ?>
面议
<?php } ?>

</li>
<li><em><?php echo $v['date'];?></em></li>
</ul>
</div>
<?php } else if($action == 'photo') { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>image/nopic-80.png<?php } ?>
" width="80" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><span><?php echo $v['items'];?> 张图片</span></li>
<li><em><?php echo $v['date'];?></em></li>
</ul>
</div>
<?php } else if($action == 'info') { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>static/img/nopic-60.png<?php } ?>
" width="60" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><em><?php echo $v['date'];?></em></li>
<li><span><?php echo $v['introduce'];?></span></li>
</ul>
</div>
<?php } else if($action == 'brand') { ?>
<div class="list-img" style="height:60px;">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>image/nopic-120.png<?php } ?>
" width="120" height="40" alt="" onerror="this.src='static/img/nopic-120.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><em><?php echo $v['date'];?></em></li>
</ul>
</div>
<?php } else if($action == 'video') { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>image/nopic-80.png<?php } ?>
" width="80" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><span><?php echo $v['hits'];?> 次播放</span></li>
<li><em><?php echo $v['date'];?></em></li>
</ul>
</div>
<?php } ?>
<?php } } ?>
<?php } else { ?>
<?php include template('chip-empty', 'mobile');?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer', 'mobile');?>