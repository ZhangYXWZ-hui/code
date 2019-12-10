<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="renderer" content="webkit">
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
<?php echo $COM['company'];?><?php } ?>
</title>
<?php if($head_keywords) { ?><meta name="keywords" content="<?php echo $head_keywords;?>"/><?php } ?>
<?php if($head_description) { ?><meta name="description" content="<?php echo $head_description;?>"/><?php } ?>
<meta name="generator" content="DESTOON B2B - www.destoon.com"/>
<meta name="template" content="<?php echo $template;?>"/>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<link rel="stylesheet" href="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/css/main.css">
<link rel="stylesheet" href="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/css/animate.css">
<link rel="stylesheet" href="/skin/xiaobao/iconfont/iconfont.css">
<script src="/skin/xiaobao/js/jquery.min.js"></script>
<script src="/skin/xiaobao/js/uikit.min.js"></script>
<script src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/js/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/page.js"></script>
<!--[if lte IE 9]>
<script src="<?php echo DT_PATH;?>/skin/xiaobao/js/respond.min.js"></script>
<script src="<?php echo DT_PATH;?>/skin/xiaobao/js/html5shiv.min.js"></script>
<![endif]-->
</head>
<body>
<div class="header">
<div class="head_top">
<ul class="w1180">
<li><a href="/"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/small_logo.png" alt=""></a></li>
<?php if($_userid) { ?>
<li class="ml30">你好，<a href="<?php echo DT_PATH;?>member/my.php"><span class="yellow"><?php echo $_username;?></span></a>&nbsp;&nbsp;<a href="<?php echo DT_PATH;?>member/logout.php" target="_blank">退出</a></li>
<?php } else { ?>
<li class="ml30">你好，请<a href="<?php echo DT_PATH;?>member/login.php" target="_blank">登录</a></li>
<li class="ml30"><a href="<?php echo DT_PATH;?>member/register.php" target="_blank">免费注册</a></li>
<?php } ?>

<li class="ml30">新增<span class="yellow"><?php $newuser=tag("table=member&condition=groupid in (6,7) and regtime >24*3600*30&fields=count(userid) as num&template=null");?>
<?php echo $newuser['0']["num"];?></span>商户，共<span class="yellow"><?php $user=tag("table=member&condition=groupid in (6,7)&fields=count(userid) as num&template=null");?>
<?php echo $user['0']["num"];?></span>商户
<span class="yellow">
<?php $product=tag("moduleid=5&condition=status>2&fields=count(itemid) as num&template=null");?>
<?php echo $product['0']["num"];?></span>产品</li>
<li class="ml480">客服热线：<span class="white"><?php echo $DT['telephone'];?></span></li>
</ul>
</div>
<div class="head_logo">
<div class="w1180">
<div class="logo">
<?php if($logo) { ?>
<a href="<?php echo $COM['linkurl'];?>" ><img src="<?php echo $logo;?>" alt="<?php echo $COM['company'];?>" class="animated wobble" ></a>

<?php } ?>
<div>
<h4><?php echo $COM['company'];?></h4>
<p class="yellow"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon1.png" alt="icon" align="absmiddle"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon2.png" alt="icon" align="absmiddle"><?php echo $DT['telephone'];?></p>
</div>
</div>
<ul class="nav">
<li class="<?php if($file=='homepage') { ?>active<?php } ?>
"><a href="<?php echo $COM['linkurl'];?>">首页</a></li>
<?php if(is_array($MENU)) { foreach($MENU as $k => $v) { ?>
<?php if($v["name"]=="公司介绍" || $v["name"]=="供应产品" || $v["name"]=="招商代理" || $v["name"]=="新闻中心" || $v["name"]=="联系方式") { ?>
<li class="<?php if($file==$menu_file[$k]) { ?>active<?php } ?>
"><a href="<?php echo $v['linkurl'];?>">
<?php if($v["name"]=="公司介绍") { ?>公司简介<?php } ?>
<?php if($v["name"]=="供应产品") { ?>产品展示<?php } ?>
<?php if($v["name"]=="招商代理") { ?>加盟代理<?php } ?>
<?php if($v["name"]=="新闻中心") { ?>资讯中心<?php } ?>
<?php if($v["name"]=="联系方式") { ?>在线留言<?php } ?>
</a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
</div>
</div>