<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/list");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template('header');?>  
<div id="ad"><?php echo ad(38);?></div>
<div  class="main">
<div id="select">
<dl>
<dt>行业</dt>
<dd>
<div><a href="<?php echo $MOD['linkurl'];?>" <?php if($catid=='') { ?> class="curr"<?php } ?>
>不限</a></div>
<?php if($MOD['show_lcat']) { ?>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>

<div><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>" <?php if($v['catid']==$catid) { ?> class="curr"<?php } ?>
><?php echo set_style($v['catname'],$v['style']);?></a></div>
<?php } } ?>
 <?php } ?>
</dd>
</dl>
<dl>
<dt>区域</dt>
<dd>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?areaid='.$v[areaid].'&catid='.$catid);?>" <?php if($areaid=='') { ?> class="curr"<?php } ?>
>不限</a></div>
<?php $mainarea = get_mainarea(0)?>
<?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?areaid='.$v[areaid].'&catid='.$catid);?>" <?php if($v['areaid']==$areaid) { ?> class="curr"<?php } ?>
><?php echo $v['areaname'];?></a></div>
<?php } } ?>
</dd>
</dl>
<dl>
<dt>渠道</dt>
<dd>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?qudao=&catid='.$catid);?>" <?php if($qudao == '') { ?>class="curr"<?php } ?>
>不限</a></div>
<?php if(is_array($qudaoList)) { foreach($qudaoList as $k => $v) { ?>
<div><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?qudao='.$v[0].'&catid='.$catid);?>" <?php if($qudao==$v['0']) { ?>class="curr"<?php } ?>
><?php echo $v['1'];?></a></div>
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
<div  class="left"> 

<div  class="info">
<div  class="search">
为您找到<em>502604</em>  <!--<em><?php echo $items;?></em> -->相关项目
</div>
<div  class="sort">
<a class="uk-button" href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=desc&catid='.$catid);?>">默认排序</a>
<a class="uk-button" style="color:#000">时间排序
<em><i class="uk-icon-caret-up" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=desc&catid='.$catid);?>');"></i><i class="uk-icon-caret-down" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=asc&catid='.$catid);?>');"></i></em></a>
</div>

</div>
<div class="daili">
<ul>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<div id="" class="text">
<div id="" class="left">
<div id="" class="title">
<span>[意向]</span>
<a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a>
</div>
<div id="" class="tag">
<ul>
<?php $tag = explode(" ",$t['tag'])?>
<?php if(is_array($tag)) { foreach($tag as $k => $ts) { ?>
<?php if($ts) { ?>
<li class="btn<?php echo $k+1;?>"><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?kw='.$ts);?>" title="<?php echo $ts;?>"><?php echo $ts;?></a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<div id="" class="other">
<ul>
<li>年度营业额<P><?php echo $t['yearyye'];?>万</P></li>
<li>流动资金<P><?php echo $t['ldzj'];?>万</P></li>
<li>代理品牌数<P><?php echo $t['pps'];?>个</P></li>
<li>销售人员<P><?php echo $t['xiaoshou'];?>个</P></li>
<li>物流车辆<P><?php echo $t['wlcl'];?>个</P></li>
<li>网点数量<P><?php echo $t['wdsl'];?>个</P></li>
</ul>

</div>
</div>
<div id="" class="right mt10">
<ul>
<!--<li><?php if($datetype) { ?><?php echo timetodate($t['addtime'], $datetype);?>发布<?php } ?>
</li>}-->
<li><?php echo $t['username'];?></li>
<li class="vip mt5">
<?php if($_groupid != 7) { ?>
<a href="#modal" data-uk-modal="{center:true}"><span>联系方式</span>(VIP查看)</a>
<?php } else { ?>
<a href="<?php echo $t['linkurl'];?>" title="联系方式(VIP查看)"><span>联系方式</span>(VIP查看)</a>
<?php } ?>


</li>
<li style="color:#ff3918">积分<?php echo $t['fee'];?></li>
</ul>

</div>

</div>

</li>
<?php } } ?>

</ul>
</div>
<div class="clear"></div>
<ul class="uk-pagination mt">
<?php if($showpage && $pages) { ?><?php echo str_replace(array("list","--"),array("index","-0-"),$pages);?><?php } ?>
</ul>
</div>
<div  class="right">
<div  class="ad">
<?php echo ad(39);?>
</div>
<div  class="hot">
<div  class="title">热门产品</div>
<ul>
<?php echo tag("moduleid=$moduleid&condition=status=3&catid=$catid&areaid=$areaid&pagesize=9&order=hits desc&template=list-daili", -2);?>
</ul>
</div>
<div  class="hot">
<div  class="title">优质产品</div>
<ul>
<?php echo tag("moduleid=$moduleid&condition=status=3&catid=$catid&areaid=$areaid&pagesize=9&order=rand() desc&template=list-daili", -2);?>
</ul>
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
