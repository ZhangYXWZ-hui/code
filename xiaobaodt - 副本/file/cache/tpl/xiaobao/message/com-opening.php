<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","index");?>
<?php $JS=array("js/base.js");?>
<?php include template('header');?>
<div class="w1180">
<div style="padding:20px 300px 20px 50px;line-height:220%;">
&nbsp;<strong class="px16">公司主页正在等待开通</strong><br/>
&nbsp;<span class="px14">您正在访问的公司主页已经注册，将在所属公司完善详细资料后自动开通，请稍后访问...</span><br/>
<?php if($username == $_username) { ?>
<hr size="1"/>
&nbsp;系统检测到您为该公司所属会员，<a href="<?php echo $MODULE['2']['linkurl'];?>edit.php?tab=2" class="f_b">请点这里立即完善公司资料，激活公司主页</a>
<?php } ?>
</div>
</div>
<?php include template('footer');?>