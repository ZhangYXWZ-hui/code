<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/list");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template('header');?>
<div id="ad"><?php echo ad(36);?></div>
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
<a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['title'];?>"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>" /></a>
<!--<a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['title'];?>"><img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" /></a>-->
<p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['title'];?>" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'],40,'...');?>
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
