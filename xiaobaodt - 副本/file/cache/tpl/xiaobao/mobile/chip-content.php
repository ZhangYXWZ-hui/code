<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if($user_status == 3) { ?>
<?php echo $content;?>
<?php } else if($user_status == 2) { ?>
<?php if($description) { ?><?php echo $description;?><br/><?php } ?>
<div class="pay">
查看详细内容需支付<strong><?php echo $fee;?></strong><?php echo $fee_unit;?><br/>
<?php echo $fee_name;?>余额：<?php if($currency == 'money') { ?><?php echo $_money;?><?php } else { ?><?php echo $_credit;?><?php } ?>
<?php echo $fee_unit;?> <a href="my.php?action=member" class="b">我的账户</a> <br/>
<a href="pay.php?auth=<?php echo encrypt($moduleid.'|'.$itemid.'|'.$currency.'|'.$fee, DT_KEY.'PAY');?>"><div class="btn-green">立即支付</div></a>
<?php } else if($user_status == 1) { ?>
无权查看，请升级会员级别<br/>
<?php if($DT['telephone']) { ?>咨询电话：<a href="tel:<?php echo $DT['telephone'];?>"><?php echo $DT['telephone'];?></a><br/><?php } ?>
<?php } else if($user_status == 0) { ?>
<a href="login.php" class="b" data-transition="slideup">请登录查看</a><br/>
<?php } ?>
