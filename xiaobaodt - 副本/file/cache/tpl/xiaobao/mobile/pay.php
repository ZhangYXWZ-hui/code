<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback('index.php?moduleid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">信息支付</div>
<div class="head-bar-right">
<a href="index.php?moduleid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>" data-direction="reverse"><span>取消</span></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div style="background:#FFFFFF;padding:20px 10px;">
<form action="pay.php" method="post" onsubmit="return Dpay();">
<input type="hidden" name="auth" value="<?php echo $auth;?>"/>
<div style="border:#D8D8D8 1px solid;margin:0 20px;padding:2px 6px;border-radius:4px;"><input name="password" id="password" type="password" style="width:100%;height:28px;line-height:28px;border:none;font-size:14px;padding:0;" placeholder="请输入支付密码" onblur="window.scrollTo(0,0);"/></div>
<input type="submit" value="立即支付" style="-webkit-appearance:none;background:#77C019;color:#FFFFFF;font-size:16px;width:100%;height:34px;border:none;border-radius:4px;"/>
</form>
</div>
<script type="text/javascript">
function Dpay() {
if(Dd('password').value.length < 5) {
Dtoast('请输入支付密码');
return false;
}
}
</script>
<?php include template('footer', 'mobile');?>