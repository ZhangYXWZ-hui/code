<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
    <title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?>
<?php } ?>
</title>
    <link rel="stylesheet" href="/skin/xiaobao/css/dl.css">
    <link rel="stylesheet" href="/skin/xiaobao/css/uikit.min.css">
    <script src="/skin/xiaobao/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/skin/xiaobao/base.css">
    <script>
function Dd(i) {return document.getElementById(i);}
function reloadcaptcha() {
Dd('captchapng').src = '<?php echo DT_PATH;?>api/captcha.png.php?action=image&refresh='+Math.random();
Dd('captcha').innerHTML = '';
Dd('captcha').value = '';
}
</script>
</head>
<body>
    <div class="header">
        <!--header top-->
        <div class="top">
            <div class="w1180">
                <div class="topleft">
<?php if($_userid) { ?>
<span>你好，<a href="<?php echo DT_PATH;?>member/my.php"><i><?php echo $_username;?></i></a></span>&nbsp;&nbsp;<span><a href="<?php echo DT_PATH;?>member/logout.php" target="_blank"><i>退出</i></a></span>
<?php } else { ?>
<span>你好</span>&nbsp;&nbsp;&nbsp;&nbsp;
<span>请<a href="<?php echo DT_PATH;?>member/login.php" target="_blank"><i>登录</i></a></span>&nbsp;&nbsp;&nbsp;&nbsp;
<span><a href="<?php echo DT_PATH;?>member/register.php" target="_blank"><i>免费注册</i></a></span>&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>
<span>新增<i><?php $newuser=tag("table=member&condition=groupid in (6,7) and regtime >24*3600*30&fields=count(userid) as num&template=null");?>
<?php echo $newuser['0']["num"];?></i>商户，共<i><?php $user=tag("table=member&condition=groupid in (6,7)&fields=count(userid) as num&template=null");?>
<?php echo $user['0']["num"];?></i>商户<i><?php $product=tag("moduleid=5&condition=status>2&fields=count(itemid) as num&template=null");?>
<?php echo $product['0']["num"];?></i>产品</span></div>
                <div class="topright">
                    <span>客服热线：</span> <span class="tell"><?php echo $DT['telephone'];?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="TrHeader container">
        <div class="TrHeadLeft">
            <div class="TrHeadLogo">
                <a href="/"><img src="/skin/xiaobao/images/logo.png" alt=""></a>
            </div>
            <div class="TrHeadTrade">
                <h4>用户登录</h4>
            </div>
        </div>
    </div>
    <!--Userlogin-->
    <div class="content">
        <div class="container">
            <div class="Userlogin uk-delimit-white">
                <div>
                    <form  method="post" action="<?php echo $DT['file_login'];?>" onsubmit="return Dcheck();">
                    <input name="forward" type="hidden" value="<?php echo $forward;?>"/>
<input name="auth" type="hidden" value="<?php echo $auth;?>"/>
                        <font>用户登录</font>
                        <span class="uk-float-right"><a href="<?php echo $DT['file_register'];?>">立即注册></a></span>
                        <input type="text" class="user input" placeholder="手机号/用户名/邮箱"  name="username" id="username" value="<?php echo $username;?>">
                        <input type="password" class="password input" placeholder="密码" name="password" id="password" <?php if(isset($password)) { ?> value="<?php echo $password;?>"<?php } ?>
>
                        <span><input type="text" class="Verification input" placeholder="验证码" style="width: 164px;" name="captcha" id="captcha"><img src="<?php echo DT_PATH;?>api/captcha.png.php?action=image" title="验证码,看不清楚?请点击刷新&#10;字母不区分大小写" alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="display:inline;cursor:pointer;" width="100" height="25" /><i id="ccaptcha"></i></span><br>
                        <input type="checkbox" class="">
                        <span class="yzm uk-text-delimit-gray">请保存我这次的登录信息</span> <span class="uk-float-right yzm"><a href="send.php">忘记密码？</a></span>
                        <input type="submit" name="submit" id="submit" value="立即登录">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<script type="text/javascript">
function Dcheck() {
if(Dd('username').value == '') {
confirm('请输入登录名称');
Dd('username').focus();
return false;
}
if(Dd('password').value == '') {
confirm('请输入密码');
Dd('password').focus();
return false;
}

<?php if($MOD['captcha_login']) { ?>
if(Dd('captcha').value == '') {
confirm('请填写验证码');
Dd('captcha').focus();
return false;
}
<?php } ?>
return true;
}
</script>
<script type="text/javascript">
function showcaptcha() {
if(Dd('captchapng').style.display=='none') {
Dd('captchapng').style.display='';
}
if(Dd('captchapng').src.indexOf('loading.gif') != -1) {
Dd('captchapng').src='/api/captcha.png.php?action=image';
}
if(Dd('captcha').value=='点击显示') {
Dd('captcha').value='';
}
Dd('captcha').className = '';
}
function reloadcaptcha() {
Dd('captchapng').src = '/api/captcha.png.php?action=image&refresh='+Math.random();
Dd('ccaptcha').innerHTML = '';
Dd('captcha').value = '';
}
function checkcaptcha(s) {
s = s.trim();
var t = encodeURIComponent(s);
if(t.indexOf('%E2%80%86') != -1) s = decodeURIComponent(t.replace(/%E2%80%86/g, ''));
if(!is_captcha(s)) return;
$.post(AJPath, 'action=captcha&captcha='+s,
function(data) {
if(data == '0') {
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_right.gif" align="absmiddle"/>';
} else {
Dd('captcha').focus;
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_error.gif" align="absmiddle"/>';
}
}
);
}
function is_captcha(v) {
if(v == '点击显示') return false;
if(v.match(/^[a-z0-9A-Z]{1,}$/)) {
return v.match(/^[a-z0-9A-Z]{4,}$/);
} else {
return v.length > 1;
}
}
$(function() {
$('#captcha').bind('keyup blur', function() {
checkcaptcha($('#captcha').val());
});
});
</script>
<style>
.footer{
margin-top: 0px!important;
}
</style>
<?php include template("footer");?>