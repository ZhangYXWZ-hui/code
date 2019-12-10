<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on"><a href="?action=index"><span>帐户详情</span></a></td>
<td class="tab"><a href="edit.php"><span>修改资料</span></a></td>
</tr>
</table>
</div>
<table cellspacing="1" cellpadding="10" class="tb">
<?php if($user['truename']) { ?>
<tr>
<td class="tl">姓名</td>
<td class="tr"><?php echo $user['truename'];?> （<?php if($user['gender']==1) { ?>先生<?php } else { ?>女士<?php } ?>
）</td>
</tr>
<?php } ?>
<?php if($_groupid > 5) { ?>
<tr>
<td class="tl">公司名称</td>
<td class="tr">
<?php if($MG['homepage']) { ?>
<a href="<?php echo $linkurl;?>" target="_blank" class="l"><?php echo $company;?></a>
<?php } else { ?>
<?php echo $company;?>
<?php } ?>
</td>
</tr>
<?php } ?>
<?php if($support) { ?>
<tr>
<td class="tl">客服专员</td>
<td class="tr"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/support.gif" align="absmiddle"/><a href="support.php" class="l">点击联系</a></td>
</tr>
<?php } ?>
<tr>
<td class="tl">会员名</td>
<td class="tr"><?php echo $username;?></td>
</tr>
<tr>
<td class="tl">昵称</td>
<td class="tr"><?php echo $passport;?></td>
</tr>
<tr>
<td class="tl">会员组</td>
<td class="tr"><?php echo $MG['groupname'];?></td>
</tr>
<tr>
<td class="tl">会员ID</td>
<td class="tr"><?php echo $userid;?></td>
</tr>
<tr>
<td class="tl">上次登录</td>
<td class="tr"><?php echo timetodate($logintime, 5);?><?php if($DT['login_log']==2) { ?>&nbsp;&nbsp;<a href="record.php?action=login" class="l">登录记录</a><?php } ?>
</td>
</tr>
<tr>
<td class="tl">注册时间</td>
<td class="tr"><?php echo timetodate($regtime, 5);?></td>
</tr>
<?php if($vip) { ?>
<tr>
<td class="tl"><?php echo VIP;?>级别</td>
<td class="tr"><a href="vip.php"><img src="<?php echo DT_SKIN;?>image/vip_<?php echo $vip;?>.gif" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $vip;?>级"/></a></td>
</tr>
<tr>
<td class="tl">服务时段</td>
<td class="tr"><?php echo timetodate($fromtime, 3);?> 至 <?php echo timetodate($totime, 3);?></td>
</tr>
<tr>
<td class="tl">剩余时间</td>
<td class="tr"><strong><?php echo $havedays;?></strong> 天&nbsp;&nbsp;<a href="vip.php?action=renew" class="l">续费</a></td>
</tr>
<?php } else if($groupid>4) { ?>
<tr>
<td class="tl">会员升级</td>
<td class="tr">&nbsp;<a href="grade.php"><span class="f_red">立即升级</span></a></td>
</tr>
<?php } ?>
</table>
<?php include template('footer', $module);?>