<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header',$module);?>
<?php if($action == 'check') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、重发邮件</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、邮件验证</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、注册成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">恭喜！会员 <?php echo $username;?> 注册成功，您现在可以<a href="<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode($MOD['linkurl']);?>" class="t">登录网站</a>了</div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一封验证邮件至<?php echo $email;?>，请<a href="goto.php?email=<?php echo $email;?>" class="t" target="_blank">查收邮件</a>获取验证码完成注册</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮件地址</td>
<td class="tr"><input type="text" size="30" name="email" id="email" value="<?php echo $email;?>"/> <span id="demail" class="f_red"></span> <span class="f_gray">请填写您注册时填写的Email地址</span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr">提交后，系统将发送一封验证邮件至您的注册Email，请接收邮件完成验证</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('email').value.length < 7) {
Dmsg('', 'email');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">Dh('side');Dh('side_oh');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'passport') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="Tab0"><a href="?action=<?php echo $action;?>"><span>修改昵称</span></a></td>
</tr>
</table>
</div>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">当前昵称</td>
<td class="tr"><?php echo $_passport;?></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 新昵称</td>
<td class="tr"><input type="text" size="30" name="npassport" id="npassport" onblur="validator();"/> <span id="dnpassport" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr lh18 f_gray">可以使用中文，仅可修改一次</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 修改 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function validator() {
if(Dd('npassport').value.length < 2) return;
$.post(AJPath, 'moduleid=2&action=member&job=passport&value='+Dd('npassport').value+'&userid=<?php echo $_userid;?>', function(data) {
$('#dnpassport').html('<img src="<?php echo DT_SKIN;?>image/check_'+(data ? 'error' : 'right')+'.gif" align="absmiddle"/> '+data);
});
}
function check() {
if(Dd('npassport').value.length < 2) {
Dmsg('请填写新昵称', 'npassport');
return false;
}
if(Dd('dnpassport').innerHTML.indexOf('error') != -1) {
Dmsg('请填写正确的昵称', 'npassport');
return false;
}
return confirm('确定要修改昵称为'+Dd('npassport').value+'吗？修改后将不可再更改');
}
s('edit');
</script>
<?php } else if($action == 'payword') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、支付密码</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、邮件验证</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">支付密码修改成功</div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一封验证邮件至<?php echo $email;?>，请<a href="goto.php?email=<?php echo $email;?>" class="t" target="_blank">查收邮件</a>获取验证码</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新支付密码</td>
<td class="tr"><input type="password" size="20" name="npassword" id="npassword" autocomplete="off"/> <span id="dnpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 重复新密码</td>
<td class="tr"><input type="password" size="20" name="cpassword" id="cpassword" autocomplete="off"/>&nbsp;<span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 登录密码</td>
<td class="tr f_red"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr lh18 f_gray">系统将发送一封验证邮件至<?php echo $email;?>，请接收邮件完成验证<br/>如果没有修改过支付密码，支付密码默认和注册时设置的登录密码相同<br/>登录密码请填写当前登录密码，以便系统验证当前操作为本人</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('npassword').value.length > <?php echo $MOD['maxpassword'];?> || Dd('npassword').value.length < <?php echo $MOD['minpassword'];?>) {
Dmsg('密码长度应为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>字符', 'npassword');
return false;
}
if(Dd('npassword').value != Dd('cpassword').value) {
Dmsg('两次输入的密码不一致', 'cpassword');
return false;
}
if(Dd('password').value.length < 6) {
Dmsg('请填写登录密码', 'password');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">s('edit');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'email') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、修改邮件</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、邮件验证</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">邮件地址修改成功，新邮件地址为：<?php echo $email;?></div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一封验证邮件至<?php echo $email;?>，请<a href="goto.php?email=<?php echo $email;?>" class="t" target="_blank">查收邮件</a>获取验证码</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新Email</td>
<td class="tr"><input type="text" size="30" name="email" id="email" value="<?php echo $email;?>"/> <span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 登录密码</td>
<td class="tr f_red"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr lh18 f_gray">提交后，系统将发送一封验证邮件至新Email地址，请接收邮件完成验证<br/>登录密码请填写当前登录密码，以便系统验证当前操作为本人<br/>当前Email地址为：<?php echo $_email;?></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('email').value.length < 7) {
Dmsg('请填写新Email地址', 'email');
return false;
}
if(Dd('email').value == '<?php echo $_email;?>') {
Dmsg('新Email地址不能与当前Email地址相同', 'email');
return false;
}
if(Dd('password').value.length < 6) {
Dmsg('请填写登录密码', 'password');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">s('edit');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'mobile') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、修改手机</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、验证手机</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">手机号码修改成功，新手机号码为：<?php echo $mobile;?></div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 短信验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一条验证短信至<?php echo $mobile;?>，请查收短信获取验证码</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&mobile=<?php echo $mobile;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的短信验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新手机号</td>
<td class="tr"><input type="text" size="30" name="mobile" id="mobile" value="<?php echo $mobile;?>" class="inp"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 登录密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr lh18 f_gray">提交后，系统将发送一条验证短信至您的手机号码，请注意接收<br/>登录密码请填写当前登录密码，以便系统验证当前操作为本人<br/>当前手机号码为：<?php echo $_mobile;?></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('mobile').value.length < 11) {
Dmsg('请填写新手机号码', 'mobile');
return false;
}
if(Dd('mobile').value == '<?php echo $_mobile;?>') {
Dmsg('新手机号码不能与当前号码相同', 'mobile');
return false;
}
if(Dd('password').value.length < 6) {
Dmsg('请填写登录密码', 'password');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">s('edit');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'contact') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=index"><span>找回密码</span></a></td>
<td class="tab_on" id="Tab1"><a href="?action=index"><span>人工申诉</span></a></td>
</tr>
</table>
</div>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">提示信息</td>
<td class="tr">请联系网站客服，并提供相关信息，由客服人工协助找回</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="button" value=" 联系客服 " class="btn_g" onclick="Go('<?php echo $url;?>');"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="Go('?action=index');"/></td>
</tr>
</table>
<script type="text/javascript">Dh('side');Dh('side_oh');</script>
<?php } else if($action == 'sms') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>找回密码</span></a></td>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、填写手机</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、验证短信</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">会员 <?php echo $username;?> 密码找回成功，请使用新密码<a href="<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode($MOD['linkurl']);?>" class="t">登录网站</a></div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新登录密码</td>
<td class="tr"><input type="password" size="20" name="password" id="password" autocomplete="off"/> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 重复新密码</td>
<td class="tr"><input type="password" size="20" name="cpassword" id="cpassword" autocomplete="off"/>&nbsp;<span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 短信验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一条验证短信至<?php echo $mobile;?>，请查收短信获取验证码</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&mobile=<?php echo $mobile;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('password').value.length > <?php echo $MOD['maxpassword'];?> || Dd('password').value.length < <?php echo $MOD['minpassword'];?>) {
Dmsg('密码长度应为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>字符', 'password');
return false;
}
if(Dd('password').value != Dd('cpassword').value) {
Dmsg('两次输入的密码不一致', 'cpassword');
return false;
}
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的短信验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 手机号码</td>
<td class="tr"><input type="text" size="20" name="mobile" id="mobile" value="<?php echo $mobile;?>"/> <span id="dmobile" class="f_red"></span> <span class="f_gray">请填写您已经认证的手机号码</span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr">提交后，系统将发送一条验证短信至您的手机，请接收短信完成验证</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g" id="send_code"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="Go('?action=index');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('mobile').value.length < 11) {
Dmsg('', 'mobile');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
<?php if($seconds) { ?>
Dd('send_code').disabled = true;
var i = <?php echo $seconds;?>;
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('send_code').value = '下一步';
Dd('send_code').disabled = false;
clearInterval(interval);
} else {
Dd('send_code').value = '下一步('+i+'秒)';
i--;
}
},
1000);
<?php } ?>
</script>
<?php } ?>
<script type="text/javascript">Dh('side');Dh('side_oh');m('Tab<?php echo $step;?>');</script>
<?php } else if($action == 'mail') { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab"><a href="?action=index"><span>找回密码</span></a></td>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、填写邮件</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、验证邮件</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">会员 <?php echo $username;?> 密码找回成功，请使用新密码<a href="<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode($MOD['linkurl']);?>" class="t">登录网站</a></div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新登录密码</td>
<td class="tr"><input type="password" size="20" name="password" id="password" autocomplete="off"/> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 重复新密码</td>
<td class="tr"><input type="password" size="20" name="cpassword" id="cpassword" autocomplete="off"/>&nbsp;<span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一封验证邮件至<?php echo $email;?>，请<a href="goto.php?email=<?php echo $email;?>" class="t" target="_blank">查收邮件</a>获取验证码</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('password').value.length > <?php echo $MOD['maxpassword'];?> || Dd('password').value.length < <?php echo $MOD['minpassword'];?>) {
Dmsg('密码长度应为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>字符', 'password');
return false;
}
if(Dd('password').value != Dd('cpassword').value) {
Dmsg('两次输入的密码不一致', 'cpassword');
return false;
}
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮件地址</td>
<td class="tr"><input type="text" size="30" name="email" id="email" value="<?php echo $email;?>"/> <span id="demail" class="f_red"></span> <span class="f_gray">请填写您注册时填写的Email地址</span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr">提交后，系统将发送一封验证邮件至您的注册Email，请接收邮件完成验证</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g" id="send_code"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="Go('?action=index');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('email').value.length < 7) {
Dmsg('', 'email');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
<?php if($seconds) { ?>
Dd('send_code').disabled = true;
var i = <?php echo $seconds;?>;
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('send_code').value = '下一步';
Dd('send_code').disabled = false;
clearInterval(interval);
} else {
Dd('send_code').value = '下一步('+i+'秒)';
i--;
}
},
1000);
<?php } ?>
</script>
<?php } ?>
<script type="text/javascript">Dh('side');Dh('side_oh');m('Tab<?php echo $step;?>');</script>
<?php } else { ?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab_on" id="Tab0"><a href="?action=index"><span>找回密码</span></a></td>
</tr>
</table>
</div>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl">请选择找回方式</td>
<td class="tr">
<div style="line-height:40px;font-size:14px;padding-left:10px;">
<?php if($could_email) { ?>
<a href="?action=mail" class="t">通过电子邮件找回</a><br/>
<?php } ?>
<?php if($could_mobile) { ?>
<a href="?action=sms" class="t">通过手机短信找回</a><br/>
<?php } ?>
<a href="?action=contact" class="t">联系客服人工申诉</a>
</div>
</td>
</tr>
</table>
<script type="text/javascript">
Dh('side');Dh('side_oh');
</script>
<?php } ?>
<?php include template('footer',$module);?>