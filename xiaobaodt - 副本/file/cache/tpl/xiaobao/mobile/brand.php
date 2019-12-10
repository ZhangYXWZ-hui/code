<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($action != 'ajax') { ?>
<?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<?php if($itemid || $catid || $areaid || $kw) { ?>
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
<?php } else { ?>
<a href="channel.php" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>频道</span></a>
<?php } ?>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:<?php if($itemid) { ?>Dsheet('<?php if($could_message) { ?><a href=&#34;message.php?action=send&typeid=3&touser=<?php echo $username;?>&title=<?php echo encrypt('愿加盟“'.$title.'”品牌', DT_KEY.'SEND');?>&#34; data-transition=&#34;slideup&#34;><span>留言加盟</span></a>|<?php } ?>
<a href=&#34;<?php if($DT_MOB['browser']=='weixin'||$DT_MOB['browser']=='qq') { ?>javascript:share_tips();<?php } else { ?>share.php?moduleid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?><?php } ?>
&#34;  data-transition=&#34;slideup&#34;><span>分享好友</span></a>|<a href=&#34;<?php echo mobileurl($moduleid);?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>|<a href=&#34;channel.php&#34; data-direction=&#34;reverse&#34;><span>频道列表</span></a>', '取消');<?php } else { ?>Dsheet('<a href=&#34;search.php?action=mod<?php echo $moduleid;?>&catid=<?php echo $catid;?>&areaid=<?php echo $areaid;?>&#34;><span><?php echo $MOD['name'];?>搜索</span></a>|<a href=&#34;category.php?moduleid=<?php echo $moduleid;?>&#34;><span>按分类浏览</span></a>|<a href=&#34;area.php?moduleid=<?php echo $moduleid;?>&#34;><span>按地区浏览</span></a>', '取消');<?php } ?>
"><img src="static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php } ?>
<?php if($itemid) { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php echo $editdate;?>&nbsp;&nbsp;点击:<?php echo $hits;?></div>
<div class="content">
<?php if($thumb) { ?><center><img src="<?php echo $thumb;?>" alt="<?php echo $title;?>"/></center><?php } ?>
<?php if($vip) { ?><?php echo VIP;?>:<?php echo $vip;?>级<br/><?php } ?>
<?php if($homepage) { ?>网站:<a href="<?php echo $homepage;?>" target="_blank" rel="external" class="b"><?php echo $homepage;?></a><br/><?php } ?>
<?php if($could_message) { ?>
<a href="message.php?action=send&typeid=3&touser=<?php echo $username;?>&title=<?php echo encrypt('愿加盟“'.$title.'”品牌', DT_KEY.'SEND');?>" data-transition="slideup"><div class="btn-blue" style="margin:10px 0;">留言加盟</div></a>
<?php } ?>
<?php echo $content;?>
</div>
<div class="head bd-b"><strong>联系方式</strong></div>
<div class="contact"><?php include template('chip-contact', 'mobile');?></div>
</div>
<?php if($DT_MOB['browser'] == 'weixin' ||  $DT_MOB['browser'] == 'qq') { ?><?php include template('chip-share', 'mobile');?><?php } ?>
<?php include template('chip-comment', 'mobile');?>
<?php } else { ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img" style="height:60px;">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>image/nopic-120.png<?php } ?>
" width="120" height="40" alt="" onerror="this.src='static/img/nopic-120.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li<?php if($v['vip']) { ?> class="vip" title="<?php echo VIP;?>:<?php echo $v['vip'];?>"<?php } ?>
><a href="index.php?moduleid=4&username=<?php echo $v['username'];?>"><span><?php echo $v['company'];?></span></a></li>
</ul>
</div>
<?php } } ?>
<?php } else { ?>
<?php include template('chip-empty', 'mobile');?>
<?php } ?>
<?php } ?>
<?php if($action != 'ajax') { ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer', 'mobile');?>
<?php } ?>
