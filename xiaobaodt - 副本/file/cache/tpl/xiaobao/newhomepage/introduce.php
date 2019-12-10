<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<!-- 主体 -->
<div class="list_bg">
<div class="w1180 goods_con">
<div class="bread_curb">
<a href="<?php echo $COM['linkurl'];?>">小宝招商</a> > <a href="<?php echo $COM['linkurl'];?>"><?php echo $COM['company'];?></a> > <a href="<?php echo $MENU[$menuid]['linkurl'];?>">公司简介</a>
</div>
<div class="goods_list">
<div class="goods_left goods_left_bor">
<div class="good_info">
<div class="title title2">
<p>企业简介</p>
</div>
<p class="introduce"><?php echo $content;?></p>
<div class="title">
<p>产品展示<a href="<?php echo userurl($username, 'file=sell', $domain);?>">更多&gt;</a></p>
</div>
<ul class="goods_left_list bor goods_left_list2">
<?php $tags=tag("moduleid=5&condition=status>2 and username='$username'&pagesize=4&order=rand() desc&fields=itemid,title,linkurl,thumb,edittime,hits,jine&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<div class="good_pic"><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" style="width:185px;height:135px"></a></div>
<h2><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><?php echo dsubstr($t['title'],40,'');?></a></h2>
</li>
<?php } } ?>

</ul>
</div>
</div>
<!-- 右边的部分 -->
<div class="goods_right">
<div class="goods_right_bor">
<div class="goods_right_top">
<h4><?php echo $COM['company'];?></h4>
<table>
<tr>
<td width="60">企业认证</td>
<td width="120"><?php if($COM['vemail']) { ?>邮箱认证&nbsp;<?php } ?>
<?php if($COM['vmobile']) { ?>手机认证&nbsp;<?php } ?>
<?php if($COM['vtruename']) { ?>实名认证&nbsp;<?php } ?>
<?php if($COM['vcompany']) { ?>企业认证&nbsp;<?php } ?>
</td>
</tr>
<tr>
<td>主营行业</td>
<td><?php echo $COM['business'];?></td>
</tr>
<tr>
<td>联系电话</td>
<td><?php echo $COM['telephone'];?></td>
</tr>
<tr>
<td style="vertical-align: top">企业地址</td>
<td><?php echo $COM['address'];?></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include template('footer', $template);?>