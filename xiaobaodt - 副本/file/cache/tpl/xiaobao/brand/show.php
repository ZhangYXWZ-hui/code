<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="m">
<div class="m_l f_l">
<div class="left_box">
<div class="pos">当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> &raquo; <?php echo cat_pos($CAT, ' &raquo; ');?> &raquo; </div>
<div class="brand_title"><h1 class="title_trade" id="title"><?php echo $title;?></h1></div>
<div class="brand_info">
<div class="f_r"><img src="<?php echo $thumb;?>" width="<?php echo $MOD['thumb_width'];?>" height="<?php echo $MOD['thumb_height'];?>" alt="<?php echo $title;?>" class="brand_logo"/>
<center><img src="<?php echo DT_SKIN;?>image/btn_brand.gif" alt="我要加盟" class="c_p" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('message.php?itemid='.$itemid);?>');"/></center>
<?php if(isset($MODULE['5'])) { ?>
<center><a href="<?php echo $MODULE['5']['linkurl'];?>search.php?fields=5&kw=<?php echo urlencode($title);?>" class="b" target="_blank" rel="nofollow">查看品牌产品&raquo;</a></center>
<?php } ?>
<?php if(isset($MODULE['16'])) { ?>
<center><a href="<?php echo $MODULE['16']['linkurl'];?>search.php?fields=4&kw=<?php echo urlencode($title);?>" class="b" target="_blank" rel="nofollow">购买品牌商品&raquo;</a></center>
<?php } ?>
</div>
<div>
<ul>
<li><strong>品牌名称</strong>：<?php echo $title;?></li>
<li><strong>公司名称</strong>：<?php echo $company;?></li>
<li><strong>官方主页</strong>：<?php if($homepage) { ?><a href="<?php echo $homepage;?>" class="b" target="_blank"><?php echo $homepage;?></a><?php } else { ?>暂无<?php } ?>
</li>
<li><strong>所在地区</strong>：<?php echo area_pos($areaid, '');?></li>
<li><strong>浏览次数</strong>：<span id="hits"><?php echo $hits;?></span></li>
<li><strong>更新日期</strong>：<?php echo $editdate;?></li>
</ul>
</div>
</div>
<div class="c_b"></div>
<div class="left_head"><?php echo $MOD['name'];?>介绍</div>
<?php if($CP) { ?><?php include template('property', 'chip');?><?php } ?>
<div class="content" id="content"><?php echo $content;?></div>
<div class="b10">&nbsp;</div>
<center>
[ <a href="<?php echo $MOD['linkurl'];?>search.php" rel="nofollow"><?php echo $MOD['name'];?>搜索</a> ]&nbsp;
[ <a href="javascript:SendFav();">加入收藏</a> ]&nbsp;
[ <a href="javascript:SendPage();">告诉好友</a> ]&nbsp;
[ <a href="javascript:Print();">打印本文</a> ]&nbsp;
[ <a href="javascript:SendReport();">违规举报</a> ]&nbsp;
[ <a href="javascript:window.close()">关闭窗口</a> ]
</center>
<br/>
<?php include template('comment', 'chip');?>
<br/>
</div>
</div>
<div class="m_n f_l">&nbsp;</div>
<div class="m_r f_l">
<div class="contact_head">联系方式</div>
<div class="contact_body" id="contact"><?php include template('contact', 'chip');?></div>
<div class="b10">&nbsp;</div>
<?php if($username) { ?>
<div class="box_head"><div><strong>该企业其他<?php echo $MOD['name'];?></strong></div></div>
<div class="box_body thumb">
<?php echo tag("moduleid=$moduleid&condition=status=3 and username='$username'&pagesize=10&order=addtime desc&width=120&height=40&cols=2&template=thumb-brand", -2);?>
</div>
<?php } else { ?>
<div class="box_head"><div><strong>同类<?php echo $MOD['name'];?></strong></div></div>
<div class="box_body thumb">
<?php echo tag("moduleid=$moduleid&condition=status=3&catid=$catid&areaid=$cityid&pagesize=10&order=addtime desc&width=120&height=40&cols=2&template=thumb-brand", -2);?>
</div>
<?php } ?>
</div>

</div>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<?php include template('footer');?>