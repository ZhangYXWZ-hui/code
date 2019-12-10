<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<?php if($action=='user') { ?>
<a href="javascript:Duser();"><span>下一步</span></a>
<?php } else if($action=='success') { ?>
<a href="javascript:Dverify();"><span>下一步</span></a>
<?php } else { ?>
<a href="login.php"><span>取消</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($action=='success') { ?>
<div class="main">
<div style="padding:0 0 0 16px;">
<form method="post" id="form-verify">
<input type="hidden" name="action" value="verify"/>
<div class="bd-b" style="height:44px;overflow:hidden;"><input type="password" name="password" id="password" placeholder="新密码" style="width:100%;height:44px;line-height:24px;border:none;padding:0;font-size:16px;"/></div>
<div class="bd-b" style="height:44px;overflow:hidden;"><input type="tel" name="code" id="code" placeholder="验证码" style="width:100%;height:44px;line-height:24px;border:none;padding:0;font-size:16px;"/></div>
<div style="line-height:44px;color:#999999;">验证码已经发送至您的<?php if($type=='mobile') { ?>手机<?php } else { ?>邮箱<?php } ?>
&nbsp;&nbsp;<span id="timer"></span><span id="send"><a href="javascript:Dcode();" class="b">重新发送</a></span></div>
</form>
</div>
</div>
<div class="main" style="padding:10px;" onclick="Dverify();">
<div class="btn-blue">下一步</div>
</div>
<script type="text/javascript">
function Dverify() {
var val,len;
val = $('#code').val();
if(!$('#code').val().match(/^[a-z0-9]{6}$/)) {
Dtoast('请填写您收到的验证码');
return false;
}
val = $('#password').val();
len = val.length;
if(len < <?php echo $MOD['minpassword'];?> || len > <?php echo $MOD['maxpassword'];?>) {
Dtoast('密码长度限制为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>');
return false;
}
$.post('forgot.php', $('#form-verify').serialize(), function(data) {
if(data == 'ok') {
Dtoast('密码修改成功，请登录');
setTimeout(function() {
Go('login.php?forward=my.php');
}, 1000);
} else {
Dtoast('验证失败');
}
});
return;
}
function Dcode(i) {
$.post('forgot.php', {'action':'send'}, function(data) {
if(data == 'ok') {
if(!i) Dtoast('发送成功');
Dtimer();
} else if(data == 'max') {
Dtoast('发送次数过多，请明日再试');
Go('index.php?reload=<?php echo $DT_TIME;?>');
} else {
Dtoast('发送失败，请重试');
}
});
}
function Dtimer() {
var i = <?php if($type=='mobile') { ?>180<?php } else { ?>60<?php } ?>
;
$('#send').hide();
$('#timer').html('重新发送('+i+')');
$('#timer').show();
var time_int=window.setInterval(
function() {
if(i == 1) {
$('#send').show();
$('#timer').html('');
$('#timer').hide();
clearInterval(time_int);
} else {
i--;
$('#timer').html('重新发送('+i+')');
}
},
1000);
}
$(document).on('pageinit', function(event) {
Dcode(1);
});
</script>
<?php } else if($action=='user') { ?>
<div class="main">
<div style="padding:0 0 0 16px;">
<form method="post" id="form-<?php echo $type;?>">
<input type="hidden" name="action" value="check"/>
<input type="hidden" name="type" value="<?php echo $type;?>"/>
<div class="bd-b" style="height:44px;overflow:hidden;"><input type="<?php if($type=='mobile') { ?>tel<?php } else { ?>email<?php } ?>
" name="<?php echo $type;?>" id="<?php echo $type;?>" placeholder="请填写您的<?php if($type=='mobile') { ?>手机号码<?php } else { ?>注册邮箱<?php } ?>
" style="width:100%;height:44px;line-height:24px;border:none;padding:0;font-size:16px;"/></div>
<div class="bd-b" style="height:44px;overflow:hidden;"><?php include template('captcha', 'chip');?></div>
</form>
</div>
</div>
<div class="main" style="padding:10px;" onclick="Duser();">
<div class="btn-blue">下一步</div>
</div>
<script type="text/javascript">
function Duser() {
var val,len;
<?php if($type=='mobile') { ?>
val = $('#mobile').val();
if(!val.match(/^1[3|4|5|7|8]{1}[0-9]{9}$/)) {
Dtoast('请填写正确的手机号码');
return false;
}
<?php } else { ?>
val = $('#email').val();
len = val.length;
if(len < 7 || !val.match(/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/)) {
Dtoast('请填写正确的电子邮箱');
return false;
}
<?php } ?>
val = $('#captcha').val();
if(!is_captcha(val)) {
Dtoast('请填写验证码');
return false;
}
$.post('forgot.php', $('#form-<?php echo $type;?>').serialize(), function(data) {
if(data == 'ok') {
Go('forgot.php?action=success');
} else if(data == 'no') {
<?php if($type=='mobile') { ?>
Dtoast('手机号未注册或未通过验证');
<?php } else { ?>
Dtoast('邮件地址未注册');
<?php } ?>
reloadcaptcha();
} else if(data == 'captcha') {
Dtoast('验证码错误');
reloadcaptcha();
} else {
Dtoast('验证失败，请重试');
reloadcaptcha();
}
});
return;
}
$(document).on('pageinit', function(event) {
$('input').on('blur', function(){window.scrollTo(0,0);});
$('#captcha').css({'width':'100px','border':'none','padding':'0','font-size':'16px'});
showcaptcha();
});
</script>
<?php } else if($action=='contact') { ?>
<div class="main">
<div class="content">
请联系网站客服，并提供相关信息，由客服人工协助找回<br/>
<a href="about.php" class="b">联系方式</a>
</div>
</div>
<?php } else { ?>
<div style="padding:16px 0 6px 16px;height:24px;line-height:24px;color:#999999;">请选择找回方式</div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="?action=contact">人工申诉</a></div></li>
<?php if($could_mobile) { ?>
<li><div><a href="?action=user&type=mobile">短信找回</a></div></li>
<?php } ?>
<?php if($could_email) { ?>
<li><div><a href="?action=user&type=email">邮件找回</a></div></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php include template('footer', 'mobile');?>