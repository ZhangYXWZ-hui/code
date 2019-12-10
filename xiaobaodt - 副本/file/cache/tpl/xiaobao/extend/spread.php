<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","index");?>
<?php $JS=array("js/base.js");?>
<?php include template('header');?>
<div class="m">
<table cellpadding="0" cellspacing="0" width="100%">
<tr bgcolor="#F8F9FB">
<td width="625"><a href="./" onfocus="this.blur();"><img src="<?php echo DT_SKIN;?>image/spread.jpg" width="625" height="260"/></a></td>
<td width="15">&nbsp;</td>
<td valign="top">
<br/><br/>
<form action="index.php" onsubmit="return check();">
<div><input type="text" name="kw" id="spread_kw" class="sp_input" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>请输入关键词...<?php } ?>
" onfocus="if(this.value=='请输入关键词...')this.value='';"/></div>
<div style="padding:15px 0 15px 0;"><input type="image" src="<?php echo DT_SKIN;?>image/btn_spread.gif" align="absmiddle"/> 咨询电话：<?php echo $DT['telephone'];?></div>
</form>
<div class="new_head">最新出价</div>
<div class="new_body">
<div id="spread_up" style="height:75px;overflow:hidden;">
<ul>
<?php $tags=tag("table=spread&condition=status=3 and company<>''&pagesize=20&order=addtime desc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<li><span class="f_r"><span class="new_price"><?php echo $t['price'];?><?php echo $unit;?></span></span><a href="<?php echo rewrite('index.php?kw='.urlencode($t['word']));?>"><?php echo $t['word'];?></a> <span class="f_gray"><?php echo $t['company'];?></span></li>
<?php } } ?>
</ul>
</div>
</div>
</td>
</tr>
</table>
<?php if($action == 'list') { ?>
<div class="list_tb">
<h1>关键词“<?php echo $kw;?>”在“<?php echo $MODULE[$mid]['name'];?>”搜索结果推广记录</h1>
<table cellpadding="6" cellspacing="1">
<tr>
<th>公司</th>
<th>出价</th>
<th>单位</th>
<th>开始日期</th>
<th>结束日期</th>
<th>投放状态</th>
<th>申请时间</th>
<th>信息</th>
</tr>
<tr>
<td colspan="8" height="10"> </td>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($v['bg']) { ?>
<tr>
<td colspan="8" class="list_dl">&nbsp;</td>
</tr>
<?php } ?>
<tr align="center">
<td><a href="<?php echo userurl($v['username']);?>" target="_blank" class="t"><?php echo $v['company'];?></a></td>
<td class="f_b f_red"><?php echo $v['price'];?></td>
<td><?php if($v['currency']=='money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?>
</td>
<td><?php echo timetodate($v['fromtime'], 3);?></td>
<td><?php echo timetodate($v['totime'], 3);?></td>
<td><?php echo $v['process'];?></td>
<td class="f_gray px11"><?php echo timetodate($v['addtime'], 5);?></td>
<td><a href="<?php echo DT_PATH;?>api/redirect.php?mid=<?php echo $v['mid'];?>&itemid=<?php echo $v['tid'];?>" target="_blank" class="t">直达</a></td>
</tr>
<?php } } ?>
<tr>
<td colspan="8" height="10"> </td>
</tr>
</table>
<div class="pages"><?php echo $pages;?></div>
</div>
<?php } else { ?>
<?php if($kw) { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="10" bgcolor="#F8F9FB"></td>
<td bgcolor="#FFFFFF">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="10"> </td>
<td width="300" valign="top">
<div class="rank_box">
<div class="rank_head"><span class="f_r px13">起价：<span class="f_red"><?php echo $sell_price;?></span><?php echo $unit;?></span><span class="f_red"><?php echo $kw;?></span><?php echo $MODULE['5']['name'];?>排名推广</div>
<div class="head_n"><?php echo $next_year;?>年<?php echo $next_month;?>月份出价记录</div>
<div class="body_n">
<?php if($sell_record) { ?>
<div class="rank_list">
<ul>
<?php if(is_array($sell_record)) { foreach($sell_record as $v) { ?>
<li><span class="f_r f_red f_b"><?php echo $v['price'];?><?php echo $unit;?></span><?php echo $v['company'];?></li>
<?php } } ?>
</ul>
</div>
<?php } else { ?>
<div class="norecord">暂无记录</div>
<?php } ?>
</div>
</div>
</td>
<td width="10" bgcolor="#F8F9FB"> </td>
<td width="300" valign="top">
<div class="rank_box">
<div class="rank_head"><span class="f_r px13">起价：<span class="f_red"><?php echo $buy_price;?></span><?php echo $unit;?></span><span class="f_red"><?php echo $kw;?></span><?php echo $MODULE['6']['name'];?>排名推广</div>
<div class="head_n"><?php echo $next_year;?>年<?php echo $next_month;?>月份出价记录</div>
<div class="body_n">
<?php if($buy_record) { ?>
<div class="rank_list">
<ul>
<?php if(is_array($buy_record)) { foreach($buy_record as $v) { ?>
<li><span class="f_r f_red f_b"><?php echo $v['price'];?><?php echo $unit;?></span><?php echo $v['company'];?></li>
<?php } } ?>
</ul>
</div>
<?php } else { ?>
<div class="norecord">暂无记录</div>
<?php } ?>
</div>
</div>
</td>
<td width="10" bgcolor="#F8F9FB"> </td>
<td width="300" valign="top">
<div class="rank_box">
<div class="rank_head"><span class="f_r px13">起价：<span class="f_red"><?php echo $company_price;?></span><?php echo $unit;?></span><span class="f_red"><?php echo $kw;?></span><?php echo $MODULE['4']['name'];?>排名推广</div>
<div class="head_n"><?php echo $next_year;?>年<?php echo $next_month;?>月份出价记录</div>
<div class="body_n">
<?php if($company_record) { ?>
<div class="rank_list">
<ul>
<?php if(is_array($company_record)) { foreach($company_record as $v) { ?>
<li><span class="f_r f_red f_b"><?php echo $v['price'];?><?php echo $unit;?></span><?php echo $v['company'];?></li>
<?php } } ?>
</ul>
</div>
<?php } else { ?>
<div class="norecord">暂无记录</div>
<?php } ?>
</div>
</div>
</td>
<td width="10"> </td>
</tr>
<tr>
<td></td>
<td align="center"><?php if($sell_count<$spread_max) { ?><a href="<?php echo $MODULE['2']['linkurl'];?>spread.php?action=add&mid=5&kw=<?php echo $ukw;?>"><img src="<?php echo DT_SKIN;?>image/btn_spread_price.gif"/></a><?php } else { ?><strong>! 本轮竞价已结束，请下月再来</strong><?php } ?>
</td>
<td bgcolor="#F8F9FB"> </td>
<td align="center"><?php if($buy_count<$spread_max) { ?><a href="<?php echo $MODULE['2']['linkurl'];?>spread.php?action=add&mid=6&kw=<?php echo $ukw;?>"><img src="<?php echo DT_SKIN;?>image/btn_spread_price.gif"/></a><?php } else { ?><strong>! 本轮竞价已结束，请下月再来</strong><?php } ?>
</td>
<td bgcolor="#F8F9FB"> </td>
<td align="center"><?php if($company_count<$spread_max) { ?><a href="<?php echo $MODULE['2']['linkurl'];?>spread.php?action=add&mid=4&kw=<?php echo $ukw;?>"><img src="<?php echo DT_SKIN;?>image/btn_spread_price.gif"/></a><?php } else { ?><strong>! 本轮竞价已结束，请下月再来</strong><?php } ?>
</td>
<td></td>
</tr>
<tr>
<td height="15"></td>
<td></td>
<td bgcolor="#F8F9FB"> </td>
<td></td>
<td bgcolor="#F8F9FB"> </td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td valign="top">
<div class="h_box">
<div class="head_h"><?php if($MOD['spread_list']) { ?><span class="f_r"><a href="<?php echo rewrite('list.php?mid=5&kw='.$ukw);?>" class="w">更多&raquo;</a></span><?php } ?>
<strong>历史出价记录</strong></div>
<?php $tags=tag("table=spread&condition=mid=5 and status=3 and word='$kw' and fromtime<$next_time&pagesize=10&order=addtime desc&template=null");?>
<div class="body_h">
<?php if($tags) { ?>
<ul>
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<li><span class="f_r f_red f_b"><?php echo $t['price'];?><?php echo $unit;?></span>(<?php echo timetodate($t['fromtime'], 'Y.m');?>) <?php echo $t['company'];?></li>
<?php } } ?>
</ul>
<?php } else { ?>
<div class="norecord">暂无记录</div>
<?php } ?>
</div>
</div>
</td>
<td bgcolor="#F8F9FB"> </td>
<td valign="top">
<div class="h_box">
<div class="head_h"><?php if($MOD['spread_list']) { ?><span class="f_r"><a href="<?php echo rewrite('list.php?mid=6&kw='.$ukw);?>" class="w">更多&raquo;</a></span><?php } ?>
<strong>历史出价记录</strong></div>
<?php $tags=tag("table=spread&condition=mid=6 and status=3 and word='$kw' and fromtime<$next_time&pagesize=10&order=addtime desc&template=null");?>
<div class="body_h">
<?php if($tags) { ?>
<ul>
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<li><span class="f_r f_red f_b"><?php echo $t['price'];?><?php echo $unit;?></span>(<?php echo timetodate($t['fromtime'], 'Y.m');?>) <?php echo $t['company'];?></li>
<?php } } ?>
</ul>
<?php } else { ?>
<div class="norecord">暂无记录</div>
<?php } ?>
</div>
</div>
</td>
<td bgcolor="#F8F9FB"> </td>
<td valign="top">
<div class="h_box">
<div class="head_h"><?php if($MOD['spread_list']) { ?><span class="f_r"><a href="<?php echo rewrite('list.php?mid=4&kw='.$ukw);?>" class="w">更多&raquo;</a></span><?php } ?>
<strong>历史出价记录</strong></div>
<?php $tags=tag("table=spread&condition=mid=4 and status=3 and word='$kw' and fromtime<$next_time&pagesize=10&order=addtime desc&template=null")?>
<div class="body_h">
<?php if($tags) { ?>
<ul>
<?php if(is_array($tags)) { foreach($tags as $t) { ?>
<li><span class="f_r f_red f_b"><?php echo $t['price'];?><?php echo $unit;?></span>(<?php echo timetodate($t['fromtime'], 'Y.m');?>) <?php echo $t['company'];?></li>
<?php } } ?>
</ul>
<?php } else { ?>
<div class="norecord">暂无记录</div>
<?php } ?>
</div>
</div>
</td>
<td></td>
</tr>
</table>
</td>
<td width="10" bgcolor="#F8F9FB"></td>
</td>
</tr>
</table>
<?php } else { ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="10" bgcolor="#F8F9FB"></td>
<td bgcolor="#FFFFFF">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="10"> </td>
<td width="300" valign="top">
<div class="rank_box">
<div class="rank_head"><?php echo $MODULE['5']['name'];?>本月搜索排行</div>
<div class="rank_list">
<?php echo tag("table=keyword&condition=moduleid=5 and status=3 and updatetime>$today_endtime-86400*30&pagesize=10&order=month_search desc&key=month_search&template=list-search_spread");?>
</div>
</div>
</td>
<td width="10" bgcolor="#F8F9FB"> </td>
<td width="300" valign="top">
<div class="rank_box">
<div class="rank_head"><?php echo $MODULE['6']['name'];?>本月搜索排行</div>
<div class="rank_list">
<?php echo tag("table=keyword&condition=moduleid=6 and status=3 and updatetime>$today_endtime-86400*30&pagesize=10&order=month_search desc&key=month_search&template=list-search_spread");?>
</div>
</div>
</td>
<td width="10" bgcolor="#F8F9FB"> </td>
<td width="300" valign="top">
<div class="rank_box">
<div class="rank_head"><?php echo $MODULE['4']['name'];?>本月搜索排行</div>
<div class="rank_list">
<?php echo tag("table=keyword&condition=moduleid=4 and status=3 and updatetime>$today_endtime-86400*30&pagesize=10&order=month_search desc&key=month_search&template=list-search_spread");?>
</div>
</div>
</td>
<td width="10"> </td>
</tr>
</table>
</td>
<td width="10" bgcolor="#F8F9FB"></td>
</td>
</tr>
</table>
<?php } ?>
<?php } ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr bgcolor="#F8F9FB">
<td height="10"> </td>
</tr>
</table>
</div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/marquee.js"></script>
<script type="text/javascript">
new dmarquee(25, 30, 2000, 'spread_up');
function check() {
if(Dd('spread_kw').value.length < 1 || Dd('spread_kw').value == '请输入关键词...') {
alert('请输入关键词');
Dd('spread_kw').focus();
return false;
}
}
</script>
<?php include template('footer');?>