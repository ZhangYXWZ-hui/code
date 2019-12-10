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
<?php if($itemid) { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info"><?php echo $editdate;?>&nbsp;&nbsp;点击:<?php echo $hits;?></div>
<div class="content">
<?php if(!$username) { ?><span style="color:red;">非会员信息</span><br/><?php } ?>
<?php if($vip) { ?><?php echo VIP;?>:<?php echo $vip;?>级<br/><?php } ?>
行业:<?php echo $CATEGORY[$parentid]['catname'];?><br/>
职位:<?php echo $CATEGORY[$catid]['catname'];?><br/>
部门:<?php echo $department;?><br/>
人数:<?php if($total) { ?><?php echo $total;?>人<?php } else { ?>若干<?php } ?>
<br/>
地区:<?php echo area_pos($areaid, '');?><br/>
性质:<?php echo $TYPE[$type];?><br/>
性别:<?php echo $GENDER[$gender];?><br/>
婚姻:<?php echo $MARRIAGE[$marriage];?><br/>
学历:<?php echo $EDUCATION[$education];?><br/>
经验:<?php if($experience) { ?><?php echo $experience;?>年以上<?php } else { ?>不限<?php } ?>
<br/>
年龄:<?php if($minage && $maxage) { ?><?php echo $minage;?>-<?php echo $maxage;?>岁<?php } else if($minage) { ?><?php echo $minage;?>岁以上<?php } else if($maxage) { ?><?php echo $maxage;?>岁以内<?php } else { ?>不限年龄<?php } ?>
<br/>
待遇:<?php if($minsalary && $maxsalary) { ?><?php echo $minsalary;?>-<?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月<?php } else if($minsalary) { ?><?php echo $minsalary;?><?php echo $DT['money_unit'];?>/月以上<?php } else if($maxsalary) { ?><?php echo $maxsalary;?><?php echo $DT['money_unit'];?>/月以内<?php } else { ?>面议<?php } ?>
<br/>
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
