<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="<?php echo DT_CHARSET;?>">
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
    <link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/uikit.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>base.css"/>
    <?php if($CSS) { ?>
    <?php if(is_array($CSS)) { foreach($CSS as $css) { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $css;?>.css"/>
    <?php } } ?>
    <?php } ?>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
   <script type="text/javascript" src="./js/my.js"></script>
   <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?141b3626a095487e33d148ce663d0d05";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
    <!--[if lte IE 8]>
    <script src="<?php echo DT_SKIN;?>/js/ieBetter.js"></script>
    <![endif]-->
    <!--[if lte IE 9]>
    <script src="<?php echo DT_SKIN;?>/js/respond.min.js"></script>
    <script src="<?php echo DT_SKIN;?>/js/html5shiv.min.js"></script>
    <![endif]-->
<?php if($is_not_index == false) { ?>
    <script>
        function Go(u) {            
            window.location = u;
        }
function GoMobile(url) {
if((UA.indexOf('phone') != -1 || UA.indexOf('mobile') != -1 || UA.indexOf('android') != -1 || UA.indexOf('ipod') != -1) && get_cookie('mobile') != 'pc' && UA.indexOf('ipad') == -1) {
Go(url);
}
}
        //pop菜单
        $(function(){
            $('#myswitcher').hide();
            $(".menulmain h3").hover(function(){
                $("#myswitcher").show();
            },function(){
                $("#myswitcher").hide();
            });
            $("#myswitcher").hover(function(){
                $("#myswitcher").show();
            },function(){
                $("#myswitcher").hide();
            });
        })
<?php if($head_mobile && $EXT['mobile_goto']) { ?>
GoMobile('<?php echo $head_mobile;?>');
<?php } ?>
    </script>
<?php } else { ?>
<script>
function GoMobile(url) {
if((UA.indexOf('phone') != -1 || UA.indexOf('mobile') != -1 || UA.indexOf('android') != -1 || UA.indexOf('ipod') != -1) && get_cookie('mobile') != 'pc' && UA.indexOf('ipad') == -1) {
Go(url);
}
}
 <?php if($head_mobile && $EXT['mobile_goto']) { ?>
GoMobile('<?php echo $head_mobile;?>');
<?php } ?>
    </script>
    <?php } ?>
</head>
<body>
<!--header-->
    <div class="header">
        <!--header top-->
        <div class="top">
            <div class="w1180">
                <div class="topleft" >
<span id="destoon_member"></span>
<span>新增<i><?php $newuser=tag("table=member&condition=groupid in (6,7) and regtime >24*3600*30&fields=count(userid) as num&template=null");?>
<?php echo $newuser['0']["num"];?></i>企业，共<i><?php $user=tag("table=member&condition=groupid in (6,7)&fields=count(userid) as num&template=null");?>
<?php echo $user['0']["num"];?></i>企业<!--<i><?php $product=tag("moduleid=5&condition=status>2&fields=count(itemid) as num&template=null");?>
<?php echo $product['0']["num"];?></i>-->
<i><?php $product=tag("moduleid=5&condition=status>2&fields=count(itemid) as num&template=null");?>
6812</i>
项目&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<span class="tell"><a style="color:#FFFF00" href="http://www.51lick.com/">小宝官网</a></span></div>
                <div class="topright"</a>
                     <span>客服热线：</span> <span class="tell"><?php echo $DT['telephone'];?></span>
                </div>
            </div>
        </div>
        <!--header top end-->
        <!--header logo-->
        <div class="logo w1180 uk">
            <a href="/"><img src="<?php echo $DT['logo'];?>" alt="" class="uk-float-left"></a>
            <div class="uk-float-left">
                <div class="searchbox">
                    <form id="form_search" method="get" action="" >
                        <div class="mall-search clearFx">
                            <div class="search-select uk-form-select" data-uk-form-select>
                                <?php if($moduleid ==5 || $moduleid ==4 || $moduleid ==9) { ?>
<h3><span data-id='<?php echo $MODULE[$moduleid]['linkurl'];?>search.php' ><?php echo $MOD['name'];?></span>

<?php } else { ?>
                                <h3><span data-id='<?php echo $MODULE['28']['linkurl'];?>search.php' >找代理</span>
                                <?php } ?>
                                <i><img src="<?php echo DT_SKIN;?>/images/icon_tra2.png" alt=""></i></h3>
                                <ul>
                                    <li data-id='<?php echo $MODULE['28']['linkurl'];?>search.php' >找代理</li>
                                    <li data-id='<?php echo $MODULE['5']['linkurl'];?>search.php' >找产品</li>
                                    <li data-id='<?php echo $MODULE['4']['linkurl'];?>search.php' >企业</li>
                                    <li data-id='<?php echo $MODULE['9']['linkurl'];?>search.php' >创业者</li>
                                </ul>
                            </div>
                            <input type="text" id="key_pro" name="kw" class="search-tx" maxlength="100" style="color: rgb(151, 147, 147);">
                            <input
                                class="search-btn" value="搜索" type="submit">
                        </div>
                    </form>
                    <div class="uk-display-inline-block uk-remove-margin-bottom"><h6>热门搜索：</h6>
                    <?php $tag = tag("moduleid=28&table=keyword&condition=moduleid=28 and status=3&pagesize=4&order=total_search desc&key=total_search&template=null");?>
                    <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                    <a href="<?php echo $MODULE['28']['linkurl'];?>search.php?kw=<?php echo urlencode($t['word']);?>"><?php echo $t['keyword'];?></a>
                    <?php } } ?>
                    </div>
                </div>
            </div>
            <ul class="extbtn uk-grid uk-grid-collapse">
                <li class="uk-width-1-3"><a href="<?php echo $MODULE['5']['linkurl'];?>">找产品</a></li>
                <li class="uk-width-1-3"><a href="<?php echo $MODULE['28']['linkurl'];?>">找经销商</a></li>
                <li class="uk-width-1-3"><a href="<?php echo $MODULE['9']['linkurl'];?>">找业务员</a></li>
            </ul>
        </div>
        <!--header logo end-->
        <!--header menu-->
        <div class="menu w1180">
            <ul class="menuright uk-grid">
                <li class="uk-width-1-10 "><a href="<?php echo $MODULE['1']['linkurl'];?>" <?php if($moduleid<4) { ?>class="menuon"<?php } ?>
>首页</a></li>
                <?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?>
                <?php if($m['ismenu']) { ?>
                <li class="uk-width-1-10 "><a href="<?php echo $m['linkurl'];?>" <?php if($m['moduleid']==$moduleid) { ?>class="menuon"<?php } ?>
><?php echo $m['name'];?></a></li>
                <?php } ?>
                <?php } } ?>
            </ul>
        </div>
        <!--header menu end-->
    </div>
    <!--header end-->
    <div class="menuleft">
        <div class="w1180">
        <div class="menulmain">
            <h3>项目分类 <?php if($moduleid>4) { ?><i class="uk-icon-chevron-down"></i><?php } ?>
</h3>

            <?php $cat = get_maincat(0,5);?>
            <ul class="db" id="myswitcher">
                <?php if(is_array($cat)) { foreach($cat as $c) { ?>
                <li class="nLi">
                    <a href="<?php echo cat_url($c['catid']);?>"><?php echo $c['catname'];?></a><span>&gt;</span>
                    <div style="display: none;" id="switcher-temp" class="sub">
                        <h3><?php echo $c['catname'];?></h3>
                        <?php $catpp = get_cat($c['catid']);$catarr = explode(',',$catpp["arrchildid"]);array_shift($catarr);?>
                        <ul class="uk-grid">
                            <?php if($catarr) { ?>
                            <?php if(is_array($catarr)) { foreach($catarr as $cc) { ?>
                            <?php $catone = get_cat($cc);?>
                            <li class="uk-width-1-4"><a href="<?php echo cat_url($catone['catid']);?>"><?php echo $catone['catname'];?></a></li>
                            <?php } } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <?php } } ?>
            </ul>
        </div>
        </div>
    </div>
