<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","index");?>
<?php $JS=array("js/base.js");?>
<?php include template('header');?>
<div class="m">
<table cellpadding="0" cellspacing="0" width="100%" style="width:1180px;margin:0 auto;">
<tr>
<td valign="top">
<div class="left_box">
<div class="pos">当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $EXT['ad_url'];?>">广告中心</a><?php if($typeid) { ?> &raquo; <a href="<?php echo $EXT['ad_url'];?><?php echo list_url($typeid);?>"><?php echo $TYPE[$typeid];?></a><?php } ?>
</div>
<div class="b15">&nbsp;</div>
<table cellpadding="8" cellspacing="1" width="96%" align="center" bgcolor="#E3EEF5">
<tr bgcolor="#F1F7FC">
<th>编号</th>
<th>广告位名称</th>
<?php if(!$typeid) { ?><th>广告类型</th><?php } ?>
<th>规格(px)</th>
<th title="(<?php echo $DT['money_unit'];?>/月)">价格</th>
<th title="(<?php echo $DT['money_unit'];?>/月)">单位</th>
<th>示意图</th>
<?php if($MOD['ad_buy']) { ?><th>预定</th><?php } ?>
</tr>
<?php if(is_array($ads)) { foreach($ads as $k => $v) { ?>
<tr align="center" bgcolor="#FFFFFF" title="<?php echo $v['introduce'];?>">
<td id="a_<?php echo $v['pid'];?>">A<?php echo $v['pid'];?></td>
<td><a href="<?php echo $EXT['ad_url'];?><?php echo show_url($v['pid']);?>" title="效果预览"><?php echo $v['name'];?></a></td>
<?php if(!$typeid) { ?><td><a href="<?php echo $EXT['ad_url'];?><?php echo list_url($v['typeid']);?>"><?php echo $v['typename'];?></a></td><?php } ?>
<td class="f_gray"><?php echo $v['width'];?> x <?php echo $v['height'];?></td>
<td class="f_orange f_b"><?php if($v['price']) { ?><?php echo $v['price'];?><?php } else { ?>面议<?php } ?>
</td>
<td><?php echo $unit;?></td>
<td<?php if($v['thumb']) { ?> onmouseover="show_tip(Dd('a_<?php echo $v['pid'];?>'),'<?php echo $v['thumb'];?>');" onmouseout="show_tip(0,0);" onclick="View('<?php echo $v['thumb'];?>');" title="点击查看大图"<?php } ?>
 class="f_gray"><?php if($v['thumb']) { ?><img src="<?php echo DT_SKIN;?>image/zoomin.gif" class="c_p"/><?php } else { ?>暂无<?php } ?>
</td>
<?php if($MOD['ad_buy']) { ?>
<td><a href="<?php echo $MODULE['2']['linkurl'];?>ad.php?action=add&pid=<?php echo $v['pid'];?>" class="b">预定</a></td>
<?php } ?>
</tr>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
<div class="b10">&nbsp;</div>
</div>
</td>
</tr>
</table>
</div>
<div class="img_tip" id="show_tip" style="display:none;">&nbsp;</div>
<script type="text/javascript">
function show_tip(o, i) {
if(i) {
var aTag = o; var leftpos = toppos = 0;
do {aTag = aTag.offsetParent; leftpos+= aTag.offsetLeft; toppos += aTag.offsetTop;
} while(aTag.offsetParent != null);
var X = o.offsetLeft + leftpos;
var Y = o.offsetTop + toppos + 30;
Dd('show_tip').style.left = X + 'px';
Dd('show_tip').style.top = Y + 'px';
Ds('show_tip');
Inner('show_tip', '<img src="'+i+'" onload="if(this.width>772){this.width=772;}Dd(\'show_tip\').style.width=this.width+\'px\';"/>');
} else {
Dh('show_tip');
}
}
try{Dd('type_<?php echo $typeid;?>').className = 'left_menu_on';}catch(e){}
</script>
<?php include template('footer');?>