<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
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
<link rel="stylesheet" href="/skin/xiaobao/base.css">
    <link rel="stylesheet" href="/skin/xiaobao/css/uikit.min.css">
<link rel="stylesheet" href="/skin/xiaobao/css/news.css">
<script src="/skin/xiaobao/js/jquery.min.js"></script>
<script>
    $(function () {
        $('.nav li').hover(function () {
            $('span', this).stop().css('height', '2px');
            $('span', this).animate({
                left: '0',
                width: '100%',
                right: '0'
            }, 200);
        }, function () {
            $('span', this).stop().animate({
                left: '50%',
                width: '0'
            }, 200);
        });
    });
</script>
</head>
<body>
  <div class="header">
        <!--header top-->
        <div class="top">
            <div class="w1180">
                <div class="topleft" >
<span id="destoon_member"></span>
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
                <a href="/"><img src="<?php echo $DT['logo'];?>" alt="" class="uk-float-left"></a>
            </div>
            <div class="TrHeadTrade">
                <h1><?php echo $MOD['name'];?></h1>
            </div>
        </div>
        <div class="TrHeadRight">
            <ul>
                <li class="active"><a href='/'>首页</a><span></span></li>

                <li><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('list.php?catid=189',0,1);?>" <?php if($catid==189) { ?>class="on"<?php } ?>
>快消品</a><span></span></li>
                <li><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('list.php?catid=181',0,1);?>">酒业</a><span></span></li>
                <li><a href='<?php echo $MOD['linkurl'];?><?php echo rewrite('list.php?catid=297',0,1);?>'>高科技</a><span></span></li>
            </ul>
        </div>
    </div>
<div class="header">
        <div class="container">
            <div class="nav">

               
<form action="<?php echo $MOD['linkurl'];?>search.php" id="fsearch" class="uk-form">
<input type="text" size="60" name="kw" value="<?php echo $kw;?>" class="uk-margin-small-top"/>
<button type="submit" class="uk-button">提交</button>
</form>

            </div>
        </div>
    </div>
    <!-- content -->
<div class="container">
<div class="left">
<ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<div id="" class="img">
<a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><img src="<?php echo $t['thumb'];?>" alt=""></a>
</div>
<div id="" class="text">
<h1><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></h1>
<p><?php echo dsubstr($t['introduce'],120,'');?></p>
<span class=""><?php echo cat_pass($t['catid'], 'catname');?>    <?php echo timetodate($t['addtime'], $datetype);?></span>
</div>
</li>
<?php } } ?>
</ul>
<!--uk-pagination-->
<div class="clear"></div>
<ul class="uk-pagination mt">
<?php if($showpage && $pages) { ?><?php echo $pages;?><?php } ?>
</ul>
</div>

<div id="" class="right">
<div id="" class="title">新闻快讯</div>
<ul>
<?php echo tag("moduleid=$moduleid&condition=status=3&areaid=$cityid&order=".$MOD['order']."&pagesize=10&target=_blank&template=list-newarc");?>
</ul>
</div>
</div>
   
<div id="" class="clear"></div>
<?php include template('footer');?> 
</body>
</html>