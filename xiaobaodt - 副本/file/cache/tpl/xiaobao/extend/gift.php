<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array('extend');?>
<?php include template('header');?>
<div class="m">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top" class="left_menu">
<ul>
<li class="left_menu_li"><a href="<?php echo $MODULE['1']['linkurl'];?>">网站首页</a></li>
<li class="left_menu_li" id="type_0"><a href="<?php echo $url;?>">积分换礼</a></li>
<li class="left_menu_li" id="type_my"><a href="<?php echo $url;?>index.php?action=my">我的订单</a></li>
<?php if(is_array($_TP['0'])) { foreach($_TP['0'] as $v0) { ?>
<li class="left_menu_li" id="type_<?php echo $v0['typeid'];?>"><a href="<?php echo $url;?><?php echo list_url($v0['typeid']);?>"><?php echo $v0['typename'];?></a></li>
<?php if(isset($_TP['1'][$v0['typeid']])) { ?>
<?php if(is_array($_TP['1'][$v0['typeid']])) { foreach($_TP['1'][$v0['typeid']] as $v1) { ?>
<li class="left_menu_li" id="type_<?php echo $v1['typeid'];?>"><a href="<?php echo $url;?><?php echo list_url($v1['typeid']);?>">&nbsp;|- <?php echo $v1['typename'];?></a></li>
<?php } } ?>
<?php } ?>
<?php } } ?>
</ul>
</td>
<td width="8"> </td>
<td valign="top">
<div class="left_box">
<div class="pos">
<span class="f_r">
<form action="<?php echo $url;?>index.php">
<input type="text" name="kw" size="20" value="<?php if($kw) { ?><?php echo $kw;?><?php } else { ?>关键词<?php } ?>
" onfocus="if(this.value=='关键词')this.value='';" id="gift_kw"/>&nbsp;
<input type="submit" value=" 搜索 " onclick="if(Dd('gift_kw').value=='关键词' || Dd('gift_kw').value.length<2){Dd('gift_kw').focus();return false;}"/>
<input type="button" value=" 重搜 " onclick="Go('<?php echo $url;?>');"/>
</form>
</span>
当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $url;?>">积分换礼</a><?php if($typeid) { ?> &raquo; <a href="<?php echo $url;?><?php echo list_url($typeid);?>"><?php echo $TYPE[$typeid]['typename'];?></a><?php } ?>
</div>
<?php if($action == 'my') { ?>
<div class="b15">&nbsp;</div>
<table cellpadding="6" cellspacing="1" width="96%" align="center" bgcolor="#E3EEF5">
<tr bgcolor="#F1F7FC">
<th>订单编号</th>
<th>礼品</th>
<th><?php echo $DT['credit_name'];?></th>
<th>下单时间</th>
<th>状态</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center" bgcolor="#FFFFFF">
<td><?php echo $v['oid'];?></td>
<td><a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['title'];?></a></td>
<td><?php echo $v['credit'];?></td>
<td><?php echo $v['adddate'];?></td>
<td><?php echo $v['status'];?></td>
</tr>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
<div class="b10">&nbsp;</div>
<script type="text/javascript">try{Dd('type_my').className='left_menu_on';}catch(e){}</script>
<?php } else { ?>
<?php if($itemid) { ?>
<?php if(isset($success)) { ?>
<div class="submit_success">
恭喜您，礼品兑换成功！请检查您的联系方式是否正确，以便工作人员与您取得联系&nbsp;&nbsp;
<a href="<?php echo $MODULE['2']['linkurl'];?>edit.php" target="_blank">[更新联系方式]</a>
<a href="<?php echo $url;?>index.php?action=my">[查看订单]</a>
</div>
<?php } ?>
<div class="g_info">
<table cellpadding="3" cellspacing="3" width="98%" align="center">
<tr>
<td width="180" valign="top">
<img src="<?php echo $middle;?>" width="160" alt="<?php echo $title;?>" class="g_img c_p" alt="<?php echo $title;?>" title="点击查看大图" onclick="View('<?php echo $thumb;?>');"/>
</td>
<td valign="top" width="360">
<ul>
<li><strong class="px14"><?php echo $title;?></strong></li>
<li>浏览次数：<?php echo $hits;?></li>
<li>会员权限：<?php if($gname) { ?><?php echo $gname;?><?php } else { ?>全部<?php } ?>
</li>
<li>当前状态：<?php if($left) { ?><img src="<?php echo DT_STATIC;?>file/image/process_<?php echo get_process($fromtime, $totime);?>.gif" align="absmiddle" alt="有效期：<?php echo $fromdate;?> 至 <?php echo $todate;?>"/><?php } else { ?><span class="f_red">已结束</span><?php } ?>
</li>
</ul>
</td>
<td valign="top">
<ul>
<li>发布时间：<?php echo $adddate;?></li>
<li>所需<?php echo $DT['credit_name'];?>：<strong class="f_red"><?php echo $credit;?></strong></li>
<li>剩余名额：<strong><?php echo $left;?></strong></li>
<li><img src="<?php echo DT_SKIN;?>image/btn_gift.gif" alt="立即兑换" class="c_p" onclick="Order();"/></a></li>
</ul>
</td>
</tr>
</table>
</div>
<?php if($content) { ?><div class="pd20 lh18 px13"><?php echo $content;?></div><?php } else { ?>&nbsp;<?php } ?>
<script type="text/javascript">
function Order() {
<?php if($process == 1) { ?>return confirm('抱歉，此兑换还没有开始');<?php } ?>
<?php if($process == 2) { ?>if(confirm('确定要兑换吗？系统将扣除您<?php echo $credit;?><?php echo $DT['credit_name'];?>')) Go('<?php echo $url;?>index.php?action=order&itemid=<?php echo $itemid;?>')<?php } ?>
<?php if($process == 3) { ?>return confirm('抱歉，此兑换已经过期');<?php } ?>
<?php if($process == 4) { ?>return confirm('抱歉，此兑换名额用尽，已经结束');<?php } ?>
}
</script>
<?php } else { ?>
<div class="b10"></div>
<table cellpadding="3" cellspacing="3" width="98%" align="center">
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<?php if($k%4==0) { ?><tr align="center"><?php } ?>
<td width="25%" valign="top">
<div class="thumb">
<a href="<?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" width="100" alt="<?php echo $v['alt'];?>"/></a>
<ul>
<li><a href="<?php echo $v['linkurl'];?>"><?php echo $v['title'];?></a></li>
<li><strong class="f_red"><?php echo $v['credit'];?></strong> <?php echo $DT['credit_name'];?></li>
<li>剩余 <span class="f_gray"><?php echo $v['left'];?></span> 个名额</li>
<li style="padding:5px 0 5px 0;"><a href="<?php echo $v['linkurl'];?>"><img src="<?php echo DT_SKIN;?>image/btn_gift.gif" alt="立即兑换" style="border:none;"/></a></li>
</ul>
</div>
</td>
<?php if($k%4==3) { ?></tr><?php } ?>
<?php } } ?>
</table>
<div class="pages"><?php echo $pages;?></div>
<?php } ?>
<script type="text/javascript">try{Dd('type_<?php echo $typeid;?>').className='left_menu_on';}catch(e){}</script>
<?php } ?>
</div>
</td>
</tr>
</table>
</div>
<?php include template('footer');?>