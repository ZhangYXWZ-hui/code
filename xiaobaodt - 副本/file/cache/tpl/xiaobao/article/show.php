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
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
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
                <li ><a href='<?php echo $MOD['linkurl'];?>'><?php echo $MOD['name'];?>首页</a><span></span></li>
                <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
<?php if($k <5) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?></a><span></span></li>
<?php } ?>
<?php } } ?>
            </ul>
        </div>
    </div>
    <!--Article-->
    <div class="Article">
<div class="pos w1180 pt" >当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">小宝招商网</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <?php echo cat_pos($CAT, ' &raquo; ');?> &raquo; 正文</div>
        <div class="container">
            <div class="ArticleLeft">
                <div class="ArticleTit">
                    <h1><?php echo $title;?></h1>
                    <small><?php echo $adddate;?></small>
                </div>
                <div class="ArticleBody">
                    <p><?php echo $content;?></p>
                </div>
                <div class="ArticleBre">
                    <ul>
                        <li>上一篇:<?php echo tag("moduleid=$moduleid&condition=status=3 and addtime<$addtime&areaid=$cityid&pagesize=1&order=addtime desc&template=list-np", -1);?></li>
                        <li>下一篇:<?php echo tag("moduleid=$moduleid&condition=status=3 and addtime>$addtime&areaid=$cityid&pagesize=1&order=addtime asc&template=list-np", -1);?></li>
                    </ul>
                </div>
            </div>
            <div class="ArticleRight">
                <div class="ArticleRigLa">
                    <h6>文章标签</h6>
                    <ul class="BrLab">
<?php if(is_array($keytags)) { foreach($keytags as $k => $t) { ?>
<?php if($k < 12 ) { ?>
                        <li><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($t));?>"><?php echo $t;?></a></span></li>
                        <?php } ?>
<?php } } ?>
                    </ul>
                </div>
                <div class="ArticleRigLaList">
                    <h4>新闻快讯</h4>
                    <ul class="ArticleRigLaListCon">
<?php echo tag("moduleid=$moduleid&condition=status=3&areaid=$cityid&order=".$MOD['order']."&pagesize=10&target=_blank&template=list-new");?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<div id="" class="clear"></div>
<?php include template('footer');?> 
</body>
</html>