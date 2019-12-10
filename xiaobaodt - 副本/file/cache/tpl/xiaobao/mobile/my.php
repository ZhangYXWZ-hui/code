<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<?php if($action) { ?>
<div class="head-bar-back">
<a href="my.php" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>我的</span></a>
</div>
<?php } ?>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<?php if($action == 'member') { ?>
<a href="javascript:Dsheet('<a href=&#34;logout.php&#34;><span style=&#34;color:red&#34;>注销登录</span></a>', '取消', '确定要注销本次登录吗？');"><span>注销</span></a>
<?php } else if($action == 'info') { ?>
<a href="channel.php" data-transition="slideup"><span>频道</span></a>
<?php } else if($action == 'home') { ?>
<a href="index.php?moduleid=4&username=<?php echo $_username;?>" data-transition="slideup"><span>预览</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="blank-20"></div>
<?php if($action == 'member') { ?>
<div class="list-set">
<ul>
<li><div style="border:none;"><span><?php echo $_money;?> <?php echo $DT['money_unit'];?></span><a href="<?php echo $MURL;?>record.php" rel="external">我的<?php echo $DT['money_name'];?></a></div></li>
<li><div><span><?php echo $user['deposit'];?> <?php echo $DT['money_unit'];?></span><a href="<?php echo $MURL;?>deposit.php" rel="external">保证金</a></div></li>
<li><div><span><?php echo $_credit;?> <?php echo $DT['credit_unit'];?></span><a href="<?php echo $MURL;?>credit.php" rel="external">我的<?php echo $DT['credit_name'];?></a></div></li>
<?php if($DT['sms'] && $MG['sms']) { ?>
<li><div><span><?php echo $_sms;?> 条</span><a href="<?php echo $MURL;?>sms.php" rel="external">短信余额</a></div></li>
<?php } ?>
</ul>
</div>
<div class="blank-20"></div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="<?php echo $MURL;?>edit.php" rel="external">修改资料</a></div></li>
<?php if($MG['friend_limit']>-1) { ?>
<li><div><a href="<?php echo $MURL;?>friend.php" rel="external">我的商友</a></div></li>
<?php } ?>
<?php if($MG['favorite_limit']>-1) { ?>
<li><div><a href="<?php echo $MURL;?>favorite.php" rel="external">商机收藏</a></div></li>
<?php } ?>
<?php if($MG['alert_limit']>-1) { ?>
<li><div><a href="<?php echo $MURL;?>alert.php" rel="external">贸易提醒</a></div></li>
<?php } ?>
<?php if($MG['sms'] && $DT['sms']) { ?>
<li><div><a href="<?php echo $MURL;?>sms.php" rel="external">手机短信</a></div></li>
<?php } ?>
<?php if($MG['mail']) { ?>
<li><div><a href="<?php echo $MURL;?>mail.php" rel="external">邮件订阅</a></div></li>
<?php } ?>
<?php if($MG['spread']) { ?>
<li><div><a href="<?php echo $MURL;?>spread.php" rel="external">排名推广</a></div></li>
<?php } ?>
<?php if($MG['ad']) { ?>
<li><div><a href="<?php echo $MURL;?>ad.php" rel="external">广告预定</a></div></li>
<?php } ?>
<?php if($MOD['oauth']) { ?>
<li><div><a href="<?php echo $MURL;?>oauth.php" rel="external">一键登录</a></div></li>
<?php } ?>
<?php if($EXT['weixin']) { ?>
<li><div><a href="<?php echo $MURL;?>weixin.php" rel="external">微信关注</a></div></li>
<?php } ?>
<?php if($MG['ask']) { ?>
<li><div><a href="<?php echo $MURL;?>ask.php" rel="external">客服中心</a></div></li>
<?php } ?>
</ul>
</div>
<?php } else if($action == 'info') { ?>
<div class="list-set">
<ul>
<?php if(is_array($MYMODS)) { foreach($MYMODS as $k => $v) { ?>
<?php if($v==-9) { ?>
<li><div><a href="<?php echo $MURL;?><?php echo $DT['file_my'];?>?mid=9&resume=1" rel="external">简历管理</a></div></li>
<?php } else { ?>
<li><div<?php if($k==0) { ?> style="border:none;"<?php } ?>
><a href="<?php echo $MURL;?><?php echo $DT['file_my'];?>?mid=<?php echo $v;?>" rel="external"><?php echo $MODULE[$v]['name'];?>管理</a></div></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<?php } else if($action == 'trade') { ?>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="<?php echo $MURL;?>trade.php" rel="external">我的订单</a></div></li>
<?php if(isset($MODULE['17'])) { ?>
<li><div><a href="<?php echo $MURL;?>group.php" rel="external">团购订单</a></div></li>
<?php } ?>
<li><div><a href="<?php echo $MURL;?>record.php" rel="external"><?php echo $DT['money_name'];?>流水</a></div></li>
<li><div><a href="<?php echo $MURL;?>charge.php?action=record" rel="external">充值记录</a></div></li>
<li><div><a href="<?php echo $MURL;?>deposit.php" rel="external">保证金</a></div></li>
<li><div><a href="<?php echo $MURL;?>cash.php?action=record" rel="external"><?php echo $DT['money_name'];?>提现</a></div></li>
<li><div><a href="<?php echo $MURL;?>credit.php" rel="external"><?php echo $DT['credit_name'];?>管理</a></div></li>
<?php if($MG['address_limit']>-1) { ?>
<li><div><a href="<?php echo $MURL;?>address.php" rel="external">收货地址</a></div></li>
<?php } ?>
</ul>
</div>
<?php } else if($action == 'home') { ?>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="<?php echo $MURL;?>home.php" rel="external">商铺设置</a></li>
<li><div><a href="<?php echo $MURL;?>style.php" rel="external">模板设置</a></div></li>
<?php if(($MG['news_limit']>-1 && $MG['homepage'])) { ?>
<li><div><a href="<?php echo $MURL;?>news.php" rel="external">公司新闻</a></div></li>
<?php } ?>
<?php if(($MG['page_limit']>-1 && $MG['homepage'])) { ?>
<li><div><a href="<?php echo $MURL;?>page.php" rel="external">公司单页</a></div></li>
<?php } ?>
<?php if(($MG['honor_limit']>-1 && $MG['homepage'])) { ?>
<li><div><a href="<?php echo $MURL;?>honor.php" rel="external">荣誉资质</a></div></li>
<?php } ?>
<?php if(($MG['link_limit']>-1 && $MG['homepage'])) { ?>
<li><div><a href="<?php echo $MURL;?>link.php" rel="external">友情链接</a></div></li>
<?php } ?>
</ul>
</div>
<?php } else { ?>
<div class="user-info">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<?php if($_userid) { ?>
<td style="width:100px;height:84px;"><a href="<?php echo $MURL;?>avatar.php" rel="external"><img src="<?php echo useravatar($_username, 'large');?>" style="width:64px;height:64px;margin:0 16px;"/></a></td>
<td><a href="my.php?action=member" style="width:100%;display:block;"><strong><?php echo $_truename;?></strong><br/>
帐号：<?php echo $_username;?></a></td>
<?php } else { ?>
<td style="width:100px;height:84px;"><a href="login.php?forward=my.php" data-transition="slideup"><img src="<?php echo useravatar($_username, 'large');?>"  style="width:64px;height:64px;margin:0 16px;"/></a></td>
<td><a href="login.php?forward=my.php" style="width:100%;display:block;" data-transition="slideup"><strong>未登录</strong><br/>
按此登录或注册</a></td>
<?php } ?>
</tr>
</table>
</div>
<?php if($_userid) { ?>
<div class="blank-20"></div>
<div class="list-set list-set-img">
<ul>
<li><div style="border:none;"><?php if($_message) { ?><em><?php echo $_message;?></em><?php } ?>
<img src="static/img/my-message.png" width="24" height="24"/><a href="message.php">站内信件</a></div></li>
<?php if($DT['im_web']) { ?>
<li><div><?php if($_chat) { ?><em><?php echo $_chat;?></em><?php } ?>
<img src="static/img/my-chat.png" width="24" height="24"/><a href="chat.php">站内交谈</a></div></li>
<?php } ?>
<?php if(isset($MODULE['16'])) { ?>
<li><div><?php if($_cart) { ?><em><?php echo $_cart;?></em><?php } ?>
<img src="static/img/my-cart.png" width="24" height="24"/><a href="cart.php">购物车</a></div></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<div class="blank-20"></div>
<div class="list-set list-set-img">
<ul>
<li><div style="border:none;"><img src="static/img/my-member.png" width="24" height="24"/><a href="my.php?action=member">我的账户</a></div></li>
<li><div><img src="static/img/my-info.png" width="24" height="24"/><a href="my.php?action=info">信息管理</a></div></li>
<li><div><img src="static/img/my-trade.png" width="24" height="24"/><a href="my.php?action=trade">交易管理</a></div></li>
<?php if($MG['homepage'] || !$_userid) { ?>
<li><div><img src="static/img/my-home.png" width="24" height="24"/><a href="my.php?action=home">商铺设置</a></div></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php include template('footer', 'mobile');?>