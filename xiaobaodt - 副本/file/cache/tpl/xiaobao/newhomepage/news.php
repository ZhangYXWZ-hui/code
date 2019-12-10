<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<!-- 主体 -->
<div class="list_bg">
<div class="w1180 goods_con">
<div class="bread_curb">
<a href="<?php echo $COM['linkurl'];?>">小宝招商</a> > <a href="<?php echo $COM['linkurl'];?>"><?php echo $COM['company'];?></a> > <a href="<?php echo $MENU[$menuid]['linkurl'];?>">资讯中心</a>
</div>

<div class="goods_list">
<?php if($itemid) { ?>
<div class="goods_left">
<div class="message_info">
<h1><?php echo $title;?></h1>
<p class="time"><?php echo timetodate($addtime, 3);?></p>
<div class="message_body">
<?php echo $content;?>
</div>
</div>
<div class="artice_nav">
<div class="pre"><a href="">上一篇：<?php echo tag("moduleid=21&condition=status=3 and addtime<$addtime&pagesize=1&order=addtime desc&template=list-np", -1);?></a></div>
<div class="next"><a href="">下一篇：<?php echo tag("moduleid=21&condition=status=3 and addtime>$addtime&pagesize=1&order=addtime asc&template=list-np", -1);?></a></div>
</div>
</div>
<?php } else { ?>
<div class="goods_left">
<ul class="message_list">
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<li>
<div class="zx_img"><a href="<?php echo $v['linkurl'];?>"><img src="<?php echo $v['thumb'];?>" alt="<?php echo $v['title'];?>"></a></div>
<div class="zx_con">
<h2><a href="<?php echo $v['linkurl'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></h2>
<p><?php echo dsubstr($v['introduce'],100,'');?></p>
<h3><?php echo timetodate($v['addtime'], 3);?></h3>
</div>
</li>
<?php } } ?>
</ul>
<ul class="page_list">
<?php echo $pages;?>
<li class="bor"><a href="">共有<?php echo (round($items/$pagesize)+1);?>页</a></li>
</ul>
</div>
<?php } ?>
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
<div class="goods_right_bottom goods_right_bottom2">
<div class="title">
<p>推荐项目<a href="<?php echo userurl($username, 'file=info', $domain);?>">更多&gt;</a></p>
</div>
<dl>
<?php $jiameng=tag("moduleid=22&condition=status>2 and username='$username'&pagesize=4&order=edittime desc&fields=itemid,title,linkurl,areaid,catid,thumb,edittime,pinpai,chuangli,moshi,touzi,yongjin,xuanshang&template=null");?>
<?php if(is_array($jiameng)) { foreach($jiameng as $i => $t) { ?>
<dd>
<div class="right_pic"><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>"></a></div>
<div class="right_intro">
<h3><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'],20,'...');?></a></h3>
<p>地区：<?php echo area_pos($t['areaid'], ' ');?></p>
<p>投资：<?php echo $t['touzi'];?>万</p>
</div>
</dd>
<?php } } ?>
</dl>
</div>
</div>
</div>
</div>
</div>
<?php include template('footer', $template);?>