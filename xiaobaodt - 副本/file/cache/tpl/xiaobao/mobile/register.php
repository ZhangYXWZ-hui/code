<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<?php if($action=='success') { ?>
<div class="head-bar-left">
<a href="javascript:Dquit();"><span>取消</span></a>
</div>
<?php } else { ?>
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<?php } ?>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<?php if($action=='success') { ?>
<a href="javascript:Dverify();"><span>验证</span></a>
<?php } else { ?>
<a href="my.php"><span>取消</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($action=='detail') { ?>
<style type="text/css">
.reg {padding:0 0 0 16px;}
.reg div {height:44px;overflow:hidden;}
.reg input {width:100%;height:44px;line-height:24px;border:none;padding:0;font-size:16px;}
</style>
<div class="main">
<form method="post" id="dform">
<div class="reg">
<input type="hidden" name="action" value="post"/>
<input type="hidden" name="regid" value="<?php echo $itemid;?>"/>
<div class="bd-b"><input type="text" name="username" id="username" placeholder="会员名称 <?php echo $MOD['minusername'];?>-<?php echo $MOD['maxusername'];?>个字符，小写字母和数字"/></div>
<div class="bd-b"><input type="password" name="password" id="password" placeholder="登录密码 <?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>个字符"/></div>
<div class="bd-b"><input type="email" name="email" id="email" placeholder="电子邮箱<?php if($verify_type=='email') { ?> 请真实填写，提交后需验证<?php } ?>
"/></div>
<?php if($itemid > 5) { ?>
<div class="bd-b"><input type="text" name="company" id="company" placeholder="公司全称 请与营业执照保持一致"/></div>
<?php } ?>
<div class="bd-b"><input type="text" name="truename" id="truename" placeholder="真实姓名"/></div>
<?php if($verify_type=='mobile') { ?>
<div class="bd-b"><input type="tel" name="mobile" id="mobile" placeholder="手机号码 请真实填写，提交后需验证"/></div>
<?php } ?>
</div>
<?php if($MOD['captcha_register']) { ?>
<div style="height:44px;margin-left:16px;" class="bd-b"><?php include template('captcha', 'chip');?></div>
<?php } ?>
</form>
<div style="font-size:12px;line-height:44px;color:#999999;padding:0 16px;"><span class="f_r"><a href="javascript:Dagreement();" class="b">已阅读并同意注册协议</a></span>以上全部为必填项目</div>
<div id="agreement" class="content" style="display:none;padding:0 16px;"></div>
</div>
<div class="main" style="padding:10px;" onclick="Dregister();">
<div class="btn-blue">立即注册</div>
</div>
<script type="text/javascript">
function Dregister() {
var val,len;
val = $('#username').val();
len = val.length;
if(len < <?php echo $MOD['minusername'];?> || len > <?php echo $MOD['maxusername'];?>) {
Dtoast('会员名长度限制为<?php echo $MOD['minusername'];?>-<?php echo $MOD['maxusername'];?>');
return false;
}
if(val.indexOf('__') != -1 || val.indexOf('--') != -1) {
Dtoast('会员名中划线和下划线不能连续出现');
return false;
}
if(!val.match(/^[a-z0-9]{1}[a-z0-9_\-]{0,}[a-z0-9]{1}$/)) {
Dtoast('会员名限制为小写字母、数字组合');
return false;
}
val = $('#password').val();
len = val.length;
if(len < <?php echo $MOD['minpassword'];?> || len > <?php echo $MOD['maxpassword'];?>) {
Dtoast('密码长度限制为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>');
return false;
}
val = $('#email').val();
len = val.length;
if(len < 7 || !val.match(/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/)) {
Dtoast('请填写正确的电子邮箱');
return false;
}
<?php if($itemid > 5) { ?>
val = $('#company').val();
len = val.length;
if(len < 4) {
Dtoast('请填写公司全称');
return false;
}
<?php } ?>
val = $('#truename').val();
len = val.length;
if(len < 2) {
Dtoast('请填写真实姓名');
return false;
}
<?php if($verify_type=='mobile') { ?>
val = $('#mobile').val();
if(!val.match(/^1[3|4|5|7|8]{1}[0-9]{9}$/)) {
Dtoast('请填写正确的手机号码');
return false;
}
<?php } ?>
<?php if($MOD['captcha_register']) { ?>
val = $('#captcha').val();
if(!is_captcha(val)) {
Dtoast('请填写验证码');
return false;
}
<?php } ?>
$.post('register.php', $('#dform').serialize(), function(data) {
if(data == 'ok') {
Go('register.php?action=success');
} else if(data == 'group') {
Dtoast('请选择会员组');
setTimeout(function() {
Go('register.php?reload=<?php echo $DT_TIME;?>');
}, 1000);
} else if(data == 'passport') {
Dtoast('会员名已经被注册');
$('#username').val('');
} else if(data == 'captcha') {
Dtoast('验证码错误');
reloadcaptcha();
} else {
data = data.replace('昵称', '会员');
//alert(data);
Dtoast(data);
}
});
return;
}
function Dagreement() {
if($('#agreement').html() == '') {
$('#agreement').load('register.php?action=agreement');
window.scrollTo(0,100);
}
$('#agreement').fadeToggle();
}
$(document).on('pageinit', function(event) {
$('input').on('blur', function(){window.scrollTo(0,0);});
$('input:not(:password)').bind('keyup blur', function() {
$(this).val(DTrim($(this).val()));
});
<?php if($MOD['captcha_register']) { ?>
$('#captcha').css({'width':'100px','border':'none','padding':'0','font-size':'16px'});
showcaptcha();
<?php } ?>
});
</script>
<?php } else if($action=='success') { ?>
<div class="main">
<div style="padding:16px 0 0 16px;">
<div class="bd-b" style="height:44px;overflow:hidden;"><input type="text" name="code" id="code" placeholder="验证码" style="width:100%;height:44px;line-height:24px;border:none;padding:0;font-size:16px;"/></div>
<div style="line-height:44px;color:#999999;">验证码已经发送至您的<?php if($verify_type=='mobile') { ?>手机<?php } else { ?>邮箱<?php } ?>
&nbsp;&nbsp;<span id="timer"></span><span id="send"><a href="javascript:Dcode();" class="b">重新发送</a></span></div>
</div>
</div>
<div class="main" style="padding:10px;" onclick="Dverify();">
<div class="btn-blue">立即验证</div>
</div>
<script type="text/javascript">
function Dverify() {
var val,len;
val = $('#code').val();
if(!$('#code').val().match(/^[a-z0-9]{6}$/)) {
Dtoast('请填写您收到的验证码');
return false;
}
$.post('register.php', {'action':'verify','code':$('#code').val()}, function(data) {
if(data == 'ok') {
Dtoast('注册成功');
setTimeout(function() {
Go('my.php?reload=<?php echo $DT_TIME;?>');
}, 1000);
} else {
Dtoast('验证失败');
}
});
return;
}
function Dcode(i) {
$.post('register.php', {'action':'send'}, function(data) {
if(data == 'ok') {
if(!i) Dtoast('发送成功');
Dtimer();
} else if(data == 'max') {
Dtoast('发送次数过多，请等待网站审核');
Go('index.php?reload=<?php echo $DT_TIME;?>');
} else {
Dtoast('发送失败，请重试');
}
});
}
function Dtimer() {
var i = <?php if($verify_type=='mobile') { ?>180<?php } else { ?>60<?php } ?>
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
function Dquit() {
Dsheet('<a href="index.php?reload=<?php echo $DT_TIME;?>"><span>确定</span></a>', '取消', '确定要取消验证吗？帐号将转入人工审核');
}
$(document).on('pageinit', function(event) {
Dcode(1);
});
</script>
<?php } else { ?>
<div style="padding:16px 0 6px 16px;height:24px;line-height:24px;color:#999999;">请选择会员类型</div>
<div class="list-set">
<ul>
<li><div style="border:none;"><a href="?action=detail&itemid=6"><?php echo $GROUP['6']['groupname'];?></a></div></li>
<?php if(is_array($GROUP)) { foreach($GROUP as $k => $v) { ?>
<?php if($k>6 && $v['vip']==0 && $v['reg']==1) { ?><li><div><a href="?action=detail&itemid=<?php echo $k;?>"><?php echo $v['groupname'];?></a></div></li><?php } ?>
<?php } } ?>
<?php if($GROUP['5']['reg']) { ?>
<li><div><a href="?action=detail&itemid=5"><?php echo $GROUP['5']['groupname'];?></a></div></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php include template('footer', 'mobile');?>