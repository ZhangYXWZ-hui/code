<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/list");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template('header');?>
<div id="ad"><?php echo ad(40);?></div>
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
<div id="justify1">
                            <div class="uk-button-dropdown" data-uk-dropdown="{justify:'#justify1',remaintime:100}">
                                    <button class="uk-button">全国<i class="uk-icon-chevron-down"></i></button>
                                    <div class="uk-dropdown">
                                    <div class="uk-grid uk-dropdown-grid">                                       
<ul class="uk-nav-dropdown uk-panel">
<?php $mainarea = get_mainarea(0)?>
<?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?areaid='.$v[areaid].'&catid='.$catid);?>" <?php if($v['areaid']==$areaid) { ?> class="curr"<?php } ?>
><?php echo $v['areaname'];?></a></li>
<?php } } ?>
</ul>
   
                                    </div>
                                </div>
                             </div>
                        </div>
<div  class="search">
为您找到 <em><?php echo $items;?></em> 相关产品
</div>
<div  class="sort">
<a class="uk-button" href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=desc&catid='.$catid);?>">默认排序</a>
<a class="uk-button" style="color:#000">时间排序
<em><i class="uk-icon-caret-up" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=desc&catid='.$catid);?>');"></i><i class="uk-icon-caret-down" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?addtime=asc&catid='.$catid);?>');"></i></em></a>
</div>
<div  class="page mr">第<?php echo $page;?>/<?php echo (round($items/$pagesize)+1);?>页&nbsp;&nbsp;&nbsp;&nbsp;<a class="uk-button" href="
<?php if($page>1) { ?>$MOD[linkurl].'list-'.$catid.'-'.$page+1.'.html'<?php } else { ?>#<?php } ?>
">></a></div>
</div>
<div  class="clear"></div>
<div class="company">
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<dl <?php if($k%2!=0) { ?>style="float:right;"<?php } ?>
>
<dt>
<a href="<?php echo userurl($t['username'], '', $domain);?>"><img src="<?php echo $t['thumb'];?>"  border="0" alt=""></a>
<div>
<a href="<?php echo userurl($t['username'], '', $domain);?>" title="<?php echo $t['company'];?>"><?php echo $t['company'];?></a>
<p>所在：<?php echo area_pos($t['areaid'], '/', 2);?>&nbsp;&nbsp;&nbsp;&nbsp;行业：<?php echo cat_pass(str_replace(",","",$t['catid']), 'catname');?></p>
<p>地址：<?php echo dsubstr($t['address'],50,'...');?></p>
</div>

</dt>
<dd>
<ul>
<li>年度营业额<p><?php echo $t['ndyye'];?>万</p></li>
<li>流动资金<p><?php echo $t['ldzj'];?>万</p></li>
<li>销售人员<p><?php echo $t['xsry'];?>个</p></li>
<li>物流车辆<p><?php echo $t['wlcl'];?>辆</p></li>
<li>网点数量<p><?php echo $t['wdsl'];?>个</p></li>
</ul>
</dd>
</dl>
<?php } } ?>
</div>
<div class="clear"></div>
<ul class="uk-pagination mt">
<?php if($showpage && $pages) { ?><?php echo $pages;?><?php } ?>
</ul>
</div>
<div  class="right">
<div  class="ad">
<?php echo ad(41);?>
</div>
<div  class="hot">
<div  class="title">热门产品</div>
<ul>
<?php echo tag("moduleid=5&condition=status=3&catid=$catid&areaid=$areaid&pagesize=9&order=hits desc&template=list-sell", -2);?>
</ul>
</div>
<div  class="hot">
<div  class="title">优质产品</div>
<ul>
<?php echo tag("moduleid=5&condition=status=3&catid=$catid&areaid=$areaid&pagesize=9&order=rand() desc&template=list-sell", -2);?>
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
