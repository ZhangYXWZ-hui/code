<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/list");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template('header');?>
<div id="ad"></div>
<div class="content">
<div  class="main">
<div  class="left">
<div id="select" style="width:920px">
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
<dl>
<dt>区域</dt>
<dd>
<div><a href="###" onclick="Go(url+'areaid=');" <?php if($areaid=='') { ?> class="curr"<?php } ?>
>不限</a></div>
<?php $mainarea = get_mainarea(0)?>
<?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?areaid='.$v[areaid].'&catid='.$catid);?>" <?php if($v['areaid']==$areaid) { ?> class="curr"<?php } ?>
><?php echo $v['areaname'];?></a></div>
<?php } } ?>
</dd>
</dl>
<dl>
<dt>时间</dt>
<dd>
<div><a href="" class="curr">不限</a></div>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?day=1&catid='.$catid);?>">今天</a></div>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?day=2&catid='.$catid);?>">昨天</a></div>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?day=7&catid='.$catid);?>">7天内</a></div>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?day=15&catid='.$catid);?>">15天内</a></div>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?day=30&catid='.$catid);?>">30天内</a></div>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?day=60&catid='.$catid);?>">2月内</a></div>
</dd>
</dl>
</div>
<div  class="info">
<!--<div  class="search">
为您找到 <em><?php echo $items;?></em> 相关创业者
</div>-->
<div  class="search">
为您找到 <em><?php echo $DT['data_jm'];?></em> 相关创业者
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
<div class="entrepreneur">
<ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<div id="" class="img" style="background-image: url(<?php echo $t['img'];?>);">
</div>
<div id="" class="text">
<div id="" class="left">
<div id="" class="title">
<span>[意向]</span>&nbsp;&nbsp;

<a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a>
</div>
<div id="" class="tag">
<ul>
<?php $tag = explode(" ",$t['tag'])?>
<?php if(is_array($tag)) { foreach($tag as $k => $ts) { ?>
<?php if($ts) { ?>
<li class="btn<?php echo $k+1;?>"><a href="<?php echo $MOD['linkurl'];?>search.php?kw=<?php echo $ts;?>" title="<?php echo $ts;?>"><?php echo $ts;?></a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<div id="" class="other">
<ul>
<li>年收入<P><?php echo $t['nsr'];?>万</P></li>
<li>工作职务<P><?php echo $t['gzzw'];?></P></li>
<li>最高学历<P><?php echo $t['zgxl'];?></P></li>
<li>工作经历<P><?php echo $t['gzjl'];?></P></li>
</ul>

</div>
</div>
<div id="" class="right mt10">
<ul>
<!--<li><?php if($datetype) { ?><?php echo timetodate($t['addtime'], $datetype);?>发布<?php } ?>
</li>-->
<li><?php echo $t['username'];?></li>
<li class="vip mt5">
<?php if($_groupid != 7) { ?>
<a href="#modal" data-uk-modal="{center:true}"><span>联系方式</span>(VIP查看)</a>
<?php } else { ?>
<a href="<?php echo $t['linkurl'];?>"><span>联系方式</span>(VIP查看)</a></li>
<?php } ?>
<li style="color:#ff3918">积分<?php echo $t['fee'];?></li>
</ul>

</div>

</div>

</li>
<?php } } ?>
</ul>
</div>
<div id="" class="clear"></div>
<ul class="uk-pagination mt">
<?php if($showpage && $pages) { ?><?php echo $pages;?><?php } ?>
</ul>
</div>
<div  class="right ">
<div  class="ad mt">

</div>
<div  class="hot">
<div  class="title">热门项目</div>
<ul>
<?php echo tag("moduleid=28&condition=status=3&pagesize=9&order=hits desc&template=list-sell", -2);?>
</ul>
</div>
<div  class="hot">
<div  class="title">优质项目</div>
<ul>
<?php echo tag("moduleid=28&condition=status=3&pagesize=9&order=rand() desc&template=list-sell", -2);?>
</ul>
</div>
</div>
</div>
</div>
<!-- 模态对话框 -->
<div id="modal" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-lightbox">
<a href="" class="uk-modal-close uk-close"></a>
<a href="/member/charge.php?action=pay" target="_blank"><img src="/skin/xiaobao/images/pay.jpg" width="352" height="288" alt=""></a>
</div>
</div>
<div id="" class="clear"></div>
<?php include template('footer');?> 
</body>
</html>
