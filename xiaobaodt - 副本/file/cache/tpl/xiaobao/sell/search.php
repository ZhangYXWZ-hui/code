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
    <link rel="stylesheet" href="/skin/xiaobao/css/list.css" />
    <script src="/skin/xiaobao/js/jquery.min.js"></script>
<script src="/skin/xiaobao/js/uikit.min.js"></script>
<script src="/skin/xiaobao/js/base.js"></script>

<!--[if lte IE 9]>
<script src="/skin/xiaobao/js/respond.min.js"></script>
<script src="/skin/xiaobao/js/html5shiv.min.js"></script>
<![endif]-->
<script>
function Go(u) {
window.location = u;
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

</script>
</head>
<body>   
<?php include template('header');?>
<div class="content">
<div  class="main">
<div id="select">
<dl>
<dt>行业</dt>
<dd>
<div><a href="<?php echo $MOD['linkurl'];?>" <?php if($catid=='') { ?> class="curr"<?php } ?>
>不限</a></div>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>" <?php if($v['catid']==$catid) { ?> class="curr"<?php } ?>
><?php echo set_style($v['catname'],$v['style']);?></a></div>
<?php } } ?>

</dd>
</dl>
</div>
<div  class="left">
<div  class="info">
<div  class="search">
为您找到 <em><?php echo $items;?></em> 相关产品
</div>
<div  class="sort">
<a class="uk-button" href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=desc&catid='.$catid);?>">默认排序</a>
<a class="uk-button" style="color:#000">时间排序
<em><i class="uk-icon-caret-up" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=desc&catid='.$catid);?>');"></i><i class="uk-icon-caret-down" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=asc&catid='.$catid);?>');"></i></em></a>
</div>
<div  class="page mr">第<?php echo $page;?>/<?php echo (round($items/$pagesize)+1);?>页&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="uk-button" href="
<?php if($page>1) { ?>$MOD[linkurl].'list-'.$catid.'-'.$page+1.'.html'<?php } else { ?>#<?php } ?>
">></a></div>

</div>
<div class="product">
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<dl>
<dt>
<a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>
<p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?>
</a></p>
<span><?php echo dsubstr($t['brand'],30,'');?></span>
</dt>
<dd>
<div ><span>赏金金额</span><p><?php echo $t['jine'];?>元</p></div>
<div ><span>关注度</span><p><?php echo $t['hits'];?></p></div>
</dd>
</dl>
<?php } } ?>
</div>
<div id="" class="clear"></div>
<ul class="uk-pagination mt">
<?php if($showpage && $pages) { ?><?php echo $pages;?><?php } ?>
</ul>
</div>
<div  class="right">
<div  class="ad">
<?php echo ad(37);?>
</div>
<div  class="hot">
<div  class="title">热门代理商</div>
<ul>
<?php echo tag("moduleid=28&condition=status=3&pagesize=9&order=hits desc&template=list-sell", -2);?>
</ul>
</div>
<div  class="hot">
<div  class="title">优秀业务员</div>
<ul>
<?php echo tag("moduleid=9&condition=status=3&pagesize=9&order=hits desc&template=list-sell", -2);?>
</ul>
</div>
</div>
</div>
</div>
<div id="" class="clear"></div>
<?php include template('footer');?> 
</body>
</html>
