<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="renderer" content="webkit">
    <title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?>
<?php } ?>
</title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
    <link rel="stylesheet" href="/skin/xiaobao/css/uikit.min.css">
    <link rel="stylesheet" href="/skin/xiaobao/base.css">
    <link rel="stylesheet" href="/skin/xiaobao/css/dl.css" />
    <script src="/skin/xiaobao/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/skin/xiaobao/js/validator/jquery.validator.css">
    <script type="text/javascript" src="/skin/xiaobao/js/validator/jquery.validator.min.js"></script>
    <script type="text/javascript" src="/skin/xiaobao/js/validator/local/zh-CN.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/admin.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/member.js"></script>
<!--[if lte IE 9]>
<script src="/skin/xiaobao/js/respond.min.js"></script>
<script src="/skin/xiaobao/js/html5shiv.min.js"></script>
<![endif]-->
<script>
    $('.zcyy').click(function() {
        $(this).css({
            "border": "1px solid orange",
        })
    })
</script>
    <script>
    function Dd(i) {return document.getElementById(i);}
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
                <h4>注册会员</h4>
            </div>
        </div>
        <div class="TrHeadRight">
            <ul>
                <li>我已经注册，现在就
                    <a href="<?php echo $DT['file_login'];?>">登录</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="register">
        <div class="container">
            <div class="registers">
                <div class="registersCon">
                    <h3>账号信息</h3>
                    <form  method="post" action="<?php echo $DT['file_register'];?>" >
                    <input name="action" type="hidden" id="action" value="<?php echo crypt_action('register');?>"/>
                     <input name="forward" type="hidden" value="<?php echo $forward;?>"/>
                        <table>
                            <tr>
                                <td class="wd120">用户名</td>
                                <td><input type="text" name="post[username]" id="username" data-rule="用户名: required;username" data-tip="<?php echo $MOD['minusername'];?>-<?php echo $MOD['maxusername'];?>个字符，只能使用小写字母(a-z)、数字(0-9)、下划线(_)、<br/>中划线(-)，且以字母或数字开头和结尾" data-rule-username="[/^[0-9a-zA-Z]+[0-9a-zA-Z-_]{2,}[0-9a-zA-Z]+$/,'错误的字符']"></td>
                            </tr>
                            <tr>
                                <td class="wd120">密码</td>
                                <td><input type="password" name="post[password]" id="password" data-tip="<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>个字符，区分大小写，推荐使用数字、<br/>字母和特殊符号组合" data-rule="required;password" data-rule-password="[/^[\s\S]{<?php echo $MOD['minpassword'];?>,<?php echo $MOD['maxpassword'];?>}$/, '请填写<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>个字符']"></td>
                            </tr>
                            <tr>
                                <td class="wd120">确认密码</td>
                                <td><input type="password" name="post[cpassword]" <?php if($password) { ?> value="<?php echo $password;?>" readonly<?php } ?>
 data-rule="match[password]" data-msg="两次输入的密码不一致"></td>
                            </tr>
                            <tr>
                                <td class="wd120">会员类型</td>
                                <td>
                                    
                                    <ul class="BrLab">
                                    <?php if(is_array($GROUP)) { foreach($GROUP as $k => $v) { ?>
                                        <?php if($k>=5 && $v['vip']==0 ) { ?>
                                        <li class="BrLabli" data-value="<?php echo $k;?>" data-truename="<?php echo $GROUP[$k]['groupname'];?>"><?php echo $GROUP[$k]['groupname'];?></li>
                                        <?php } ?>
                                    <?php } } ?>
                                    </ul>
                                    
                                </td>
                                <td>
                                    <input type="hidden" name="post[regid]" data-rule="required">
                                </td>
                            </tr>
                            <tr>
                                <td class="wd120" id="truename_td">真实姓名</td>
                                <td><input type="text" name="post[truename]" id="truename" data-rule="名称: required;" ></td>
                            </tr>
<tr>
                                <td class="wd120" id="mobile_td">电话</td>
                                <td><input type="text" name="post[mobile]" id="mobile"></td>
                            </tr>
                            <tr id="company_tr" style="display: none;">
                            </tr>
                            <tr>
                                <td class="wd120">注册原因</td>
                                <td>
                                
                                    <ul class="reason">
                                        <li class="borN" data-value="1">找产品</li>
                                        <li class="borN"  data-value="2">找经销商</li>
                                        <li class="borN"  data-value="3">创业赚钱</li>
                                    </ul>
                                </td>
                                <td>
                                    <input type="hidden" name="post[reason]"  data-rule="required">
                                </td>
                            </tr>
 <tr>
                                <td class="wd120">标签</td>
                                <td>
                                
                                    <ul class="BrLab">
<?php if(is_array($tag)) { foreach($tag as $t) { ?>
<li class="BrLabli" data-value="<?php echo $t;?>"><?php echo $t;?></li>
<?php } } ?>
                                    </ul>
                                </td>
<td>
                                    <input type="hidden" name="post[tag]"  data-rule="required">
                                </td>
                            </tr>
                        </table>
                        <div><input type="submit" id="submit1" value="注册" name="submit"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $('.reason li,.BrLab li').each(function () {
            $(this).click(function () {
                $(this).siblings().removeClass('active')
                $(this).addClass('active');
                $(this).closest("td").siblings().find("input").val($(this).data("value"))
                if ($(this).hasClass('BrLabli')) {
                    //$("#truename_td").html($(this).data("truename")+"名称");
                    if($(this).data("value") == 6){
                        $("#company_tr").html('<td class="wd120" id="truename_td">企业名称</td><td><input type="text" name="post[company]" id="company" data-rule="名称: required;" ></td>')
                        $("#company_tr").show();
                    }else if($(this).data("value") == 5){
                        $("#company_tr").hide();
                        $("#company_tr").html('');
                    }
                }
            })
        })
    </script>
   <?php include template("footer");?>