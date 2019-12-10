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
<a href="javascript:<?php if($itemid) { ?>Dsheet('<a href=&#34;<?php if($DT_MOB['browser']=='weixin'||$DT_MOB['browser']=='qq') { ?>javascript:share_tips();<?php } else { ?>share.php?moduleid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?><?php } ?>
&#34;  data-transition=&#34;slideup&#34;><span>分享好友</span></a>|<a href=&#34;<?php echo mobileurl($moduleid);?>&#34; data-direction=&#34;reverse&#34;><span><?php echo $MOD['name'];?>首页</span></a>|<a href=&#34;channel.php&#34; data-direction=&#34;reverse&#34;><span>频道列表</span></a>', '取消');<?php } else { ?>Dsheet('<a href=&#34;search.php?action=mod<?php echo $moduleid;?>&catid=<?php echo $catid;?>&areaid=<?php echo $areaid;?>&#34;><span><?php echo $MOD['name'];?>搜索</span></a>|<a href=&#34;category.php?moduleid=<?php echo $moduleid;?>&#34;><span>按分类浏览</span></a>|<a href=&#34;area.php?moduleid=<?php echo $moduleid;?>&#34;><span>按地区浏览</span></a>', '取消');<?php } ?>
"><img src="static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php } ?>
<?php if($userid) { ?>
<?php if($action=='introduce') { ?>
<div class="content">
<?php if($thumb) { ?><center><img src="<?php echo $thumb;?>"/></center><?php } ?>
<?php echo $content;?>
</div>
<?php } else if($action=='news') { ?>
<?php if($itemid) { ?>
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info">日期:<small><?php echo $adddate;?></small>&nbsp;&nbsp;点击:<?php echo $hits;?></div>
<div class="content"><?php echo $content;?></div>
<?php } else { ?>
<?php if($MTYPE) { ?>
<div class="content">
<a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $username;?>&action=<?php echo $action;?>"<?php if($typeid==0) { ?> class="f_b"<?php } ?>
>全部</a>
<?php if(is_array($MTYPE)) { foreach($MTYPE as $t) { ?>
&nbsp;|&nbsp;<a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $username;?>&action=<?php echo $action;?>&typeid=<?php echo $t['typeid'];?>"<?php if($typeid==$t['typeid']) { ?> class="f_b"<?php } ?>
><?php echo $t['typename'];?></a>
<?php } } ?>
</div>
<?php } ?>
<ul class="list-txt">
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<li><span class="f_r px11 f_gray">&nbsp;<?php echo timetodate($v['addtime'], 3);?></span><a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $username;?>&action=<?php echo $action;?>&itemid=<?php echo $v['itemid'];?>"><?php echo $v['title'];?></a></li>
<?php } } ?>
</ul>
<?php } ?>
<?php } else if($action=='sell') { ?>
<?php if($MTYPE) { ?>
<div class="content">
<a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $username;?>&action=<?php echo $action;?>"<?php if($typeid==0) { ?> class="f_b"<?php } ?>
>全部</a>
<?php if(is_array($MTYPE)) { foreach($MTYPE as $t) { ?>
&nbsp;|&nbsp;<a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $username;?>&action=<?php echo $action;?>&typeid=<?php echo $t['typeid'];?>"<?php if($typeid==$t['typeid']) { ?> class="f_b"<?php } ?>
><?php echo $t['typename'];?></a>
<?php } } ?>
</div>
<?php } ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<a href="index.php?moduleid=5&itemid=<?php echo $v['itemid'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>static/img/nopic-60.png<?php } ?>
" width="60" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li><a href="index.php?moduleid=5&itemid=<?php echo $v['itemid'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<li><em><?php echo $v['date'];?></em></li>
<li<?php if($v['vip']) { ?> class="vip" title="<?php echo VIP;?>:<?php echo $v['vip'];?>"<?php } ?>
><a href="index.php?moduleid=4&username=<?php echo $v['username'];?>"><span><?php echo $v['company'];?></span></a></li>
</ul>
</div>
<?php } } ?>
<?php } else if($action=='contact') { ?>
<div class="content">
<?php if($could_contact) { ?>
<?php if($truename) { ?>姓名:<?php echo $truename;?>(<?php if($gender==1) { ?>先生<?php } else { ?>女士<?php } ?>
)<br/><?php } ?>
<?php if($department) { ?>部门:<?php echo $department;?><br/><?php } ?>
<?php if($career) { ?>职务:<?php echo $career;?><br/><?php } ?>
<?php if($mobile) { ?>手机:<?php echo $mobile;?><br/><?php } ?>
<?php if($telephone) { ?>电话:<?php echo $telephone;?><br/><?php } ?>
<?php if($fax) { ?>传真:<?php echo $fax;?><br/><?php } ?>
<?php if($address) { ?>地址:<?php echo $address;?><br/><?php } ?>
<?php if($postcode) { ?>邮编:<?php echo $postcode;?><br/><?php } ?>
<?php if($mail) { ?>邮件:<?php echo $mail;?><br/><?php } ?>
<?php if($homepage) { ?>网址:<?php echo $homepage;?><br/><?php } ?>
<?php if($qq && $DT['im_qq']) { ?>QQ:<?php echo $qq;?><br/><?php } ?>
<?php if($ali && $DT['im_ali']) { ?>阿里旺旺:<?php echo $ali;?><br/><?php } ?>
<?php if($msn && $DT['im_msn']) { ?>MSN:<?php echo $msn;?><br/><?php } ?>
<?php if($skype && $DT['im_skype']) { ?>Skype:<?php echo $skype;?><br/><?php } ?>
发信:<a href="index.php?moduleid=2&action=message_send&touser=<?php echo $username;?>" class="b">点此发送</a><br/>
<?php } else { ?>
无权查看，请升级<br/>
<?php } ?>
</div>
<?php } else { ?>
<div class="content">
<?php if($vip) { ?>级别:<?php echo VIP;?> <?php echo $vip;?><br/><?php } ?>
<?php if($areaid) { ?>所在地区:<?php echo area_pos($areaid, '/');?><br/><?php } ?>
<?php if($type) { ?>公司类型:<?php echo $type;?><?php if($mode) { ?>(<?php echo $mode;?>)<?php } ?>
<br/><?php } ?>
<?php if($regyear) { ?>成立时间:<?php echo $regyear;?><br/><?php } ?>
<?php if($capital) { ?>注册资本:<?php echo $capital;?>万<?php echo $regunit;?><br/><?php } ?>
<?php if($business) { ?>经营范围:<?php echo $business;?><br/><?php } ?>
</div>
<?php $tags=tag("moduleid=5&condition=status=3 and elite>0 and username='$username'&pagesize=5&length=$len&order=edittime desc&template=null");?>
<?php if($tags) { ?>
<div class="box_head"><span class="f_r px12"><a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $username;?>&action=sell">更多&raquo;</a></span><strong>推荐产品</strong></div>
<ul class="list-txt">
<?php if(is_array($tags)) { foreach($tags as $v) { ?>
<li><span class="f_r px11 f_gray">&nbsp;&nbsp;<?php echo timetodate($v['edittime'], 3);?></span><a href="index.php?moduleid=5&itemid=<?php echo $v['itemid'];?>"><strong><?php echo $v['title'];?></strong></a></li>
<?php } } ?>
</ul>
<?php } ?>
<?php } ?>
<?php } else { ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $v['username'];?>"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?>static/img/nopic-60.png<?php } ?>
" width="60" height="60" alt="" onerror="this.src='static/img/nopic-60.png';"/></a>
<ul>
<li<?php if($v['vip']) { ?> class="vip" title="<?php echo VIP;?>:<?php echo $v['vip'];?>"<?php } ?>
><a href="index.php?moduleid=<?php echo $moduleid;?>&username=<?php echo $v['username'];?>"><strong><?php echo $v['company'];?></strong></a></li>
<li><span>主营：<?php echo $v['business'];?></span></li>
<li><span><?php echo area_pos($v['areaid'], '', 2);?><?php if($v['mode']) { ?>&nbsp;&nbsp;(<?php echo $v['mode'];?>)<?php } ?>
&nbsp;&nbsp;<?php if($v['validated']) { ?>[已核实]<?php } else { ?>[未核实]<?php } ?>
</span></li>
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
