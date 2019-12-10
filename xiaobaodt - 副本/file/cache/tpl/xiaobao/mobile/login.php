<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback();" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">会员登录</div>
<div class="head-bar-right">
<a href="register.php"><span>注册</span></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main">
<div style="padding:0 16px 16px 16px;">
<form action="login.php" method="post" id="form-login">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="auth" value="<?php echo $auth;?>"/>
<input type="hidden" name="ok" value="1"/>
<div style="width:100%;height:44px;" class="bd-b"><input type="text" name="username" id="login-username" value="<?php echo $username;?>" placeholder="用户名/Email/已认证手机" onblur="window.scrollTo(0,0);" style="width:98%;height:24px;line-height:24px;border:none;padding:0;margin:10px 0 0 0;font-size:16px;"/></div>
<div style="width:100%;height:44px;" class="bd-b"><input type="password" name="password" id="login-password" placeholder="请填写密码" onblur="window.scrollTo(0,0);" style="width:98%;height:24px;line-height:24px;border:none;padding:0;margin:10px 0 0 0;font-size:16px;"/></div>
<?php if($MOD['captcha_login']) { ?>
<div style="width:100%;height:44px;font-size:16px;" class="bd-b"><?php include template('captcha', 'chip');?></div>
<?php } ?>

<div style="padding-top:16px;" onclick="Dlogin();">
<div class="btn-blue">登 录</div>
</div>
</form>
</div>
</div>
<div class="blank-20"></div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="forgot.php">忘记了密码？</a></div></li>
<?php if($oa) { ?>
<?php if(is_array($OAUTH)) { foreach($OAUTH as $k => $v) { ?>
<?php if($v['enable']) { ?><li><div><a href="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/connect.php" rel="external"><img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/ico.png" alt="<?php echo $v['name'];?>"/> 用<?php echo $v['name'];?>帐号登录</a></div></li><?php } ?>
<?php } } ?>
<?php } ?>
</ul>
</div>
<script type="text/javascript">
function Dlogin() {
if(Dd('login-username').value.length < 3) {
Dtoast('请填写用户名/Email/已认证手机');
return false;
}
if(Dd('login-password').value.length < 5) {
Dtoast('请填写密码');
return false;
}
<?php if($MOD['captcha_login']) { ?>
if(!is_captcha(Dd('captcha').value)) {
Dtoast('请填写验证码');
return false;
}
<?php } ?>
Dd('form-login').submit();
}
$(document).on('pageinit', function(event) {
<?php if($MOD['captcha_login']) { ?>
$('#captcha').css({'width':'100px','border':'none','padding':'0','font-size':'16px'});
showcaptcha();
<?php } ?>
$('#login-username').bind('keyup blur', function() {
$(this).val(DTrim($(this).val()));
});
});
</script>
<?php include template('footer', 'mobile');?>