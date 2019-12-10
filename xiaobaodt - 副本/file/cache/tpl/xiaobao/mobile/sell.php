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
<a href="javascript:<?php if($itemid) { ?>Dsheet('<?php if($could_purchase) { ?><a href=&#34;purchase.php?moduleid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&#34;><span>立即购买</span></a>|<?php } ?>
<?php if($could_inquiry) { ?><a href=&#34;message.php?action=send&typeid=1&touser=<?php echo $username;?>&title=<?php echo encrypt('我对您发布的“'.$title.'”很感兴趣', DT_KEY.'SEND');?>&#34; data-transition=&#34;slideup&#34;><span>发送询价</span></a>|<?php } ?>
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
<?php if($thumb) { ?><?php include template('chip-album', 'mobile');?><?php } ?>
<div class="content">
价格:<?php if($price&&$unit) { ?><span class="f_red"><?php echo $DT['money_sign'];?><?php echo $price;?></span>/<?php echo $unit;?><?php } else { ?>未填<?php } ?>
<br/>
<?php if($brand) { ?>品牌:<?php echo $brand;?><br/><?php } ?>
<?php if($n1 && $v1) { ?><?php echo $n1;?>:<?php echo $v1;?><br/><?php } ?>
<?php if($n2 && $v2) { ?><?php echo $n2;?>:<?php echo $v2;?><br/><?php } ?>
<?php if($n3 && $v3) { ?><?php echo $n3;?>:<?php echo $v3;?><br/><?php } ?>
<?php if($minamount) { ?>起订:<?php echo $minamount;?><?php echo $unit;?><br/><?php } ?>
<?php if($amount) { ?>供应:<?php echo $amount;?><?php echo $unit;?><br/><?php } ?>
<?php if($days) { ?>发货:<?php echo $days;?>天内<br/><?php } ?>
<?php if($could_purchase) { ?>
<a href="purchase.php?moduleid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>"><div class="btn-green" style="margin:10px 0;">立即购买</div></a>
<?php } else if($could_inquiry) { ?>
<a href="message.php?action=send&typeid=1&touser=<?php echo $username;?>&title=<?php echo encrypt('我对您发布的“'.$title.'”很感兴趣', DT_KEY.'SEND');?>" data-transition="slideup"><div class="btn-blue" style="margin:10px 0;">发送询价</div></a>
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
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>static/img/nopic-60.png<?php } ?>
" width="60" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><em><?php echo $v['date'];?></em></li>
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
