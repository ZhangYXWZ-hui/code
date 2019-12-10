<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($tab) { ?>
<div class="list-tab bd-b">
<ul>
<li<?php if($typeid==0) { ?> class="on"<?php } ?>
><a href="<?php echo $HURL;?>&action=<?php echo $action;?>&typeid=0" data-transition="flip"><span>公司档案</span></a></li>
<li<?php if($typeid==1) { ?> class="on"<?php } ?>
><a href="<?php echo $HURL;?>&action=<?php echo $action;?>&typeid=1" data-transition="flip"><span>收到的评价</span></a></li>
<li<?php if($typeid==2) { ?> class="on"<?php } ?>
><a href="<?php echo $HURL;?>&action=<?php echo $action;?>&typeid=2" data-transition="flip"><span>发出的评价</span></a></li>
</ul>
</div>
<?php } ?>
<?php if($typeid) { ?>
<style type="text/css">
.comment_title{padding:10px 16px 0 16px;font-size:12px;color:#999999;}
.comment_content{padding:10px 16px;line-height:180%;}
.comment_reply{padding:0 16px 10px 16px;font-size:12px;color:#AF874D;}
.comment_reply span{color:#007AFF;}
</style>
<?php } ?>
<div class="main">
<?php if($typeid==2) { ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="bd-b">
<div class="comment_title">
<span class="f_r"><?php echo $STARS[$v['buyer_star']];?> <img src="<?php echo DT_STATIC;?>file/image/star<?php echo $v['buyer_star'];?>.gif" width="18" height="6" alt="" align="absmiddle"/></span>
买家 <span id="i_<?php echo $v['itemid'];?>"><?php echo hide_name($v['buyer']);?> 于 <span class="comment_time"><?php echo timetodate($v['buyer_ctime']);?></span> 评论：</span>
</div>
<div class="comment_content"><?php echo nl2br($v['buyer_comment']);?></div>
<?php if($v['seller_reply']) { ?>
<div class="comment_reply">
<span>卖家</span> <?php echo timetodate($v['seller_rtime']);?> 回复： <?php echo nl2br($v['seller_reply']);?>
</div>
<?php } ?>
</div>
<?php } } ?>
<?php } else { ?>
<br/><br/><br/><center>暂无评价</center><br/><br/><br/>
<?php } ?>
<?php } else if($typeid==1) { ?>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="bd-b">
<div class="comment_title">
<span class="f_r"><?php echo $STARS[$v['seller_star']];?> <img src="<?php echo DT_STATIC;?>file/image/star<?php echo $v['seller_star'];?>.gif" width="18" height="6" alt="" align="absmiddle"/></span>
买家 <span id="i_<?php echo $v['itemid'];?>"><?php echo hide_name($v['buyer']);?> 于 <span class="comment_time"><?php echo timetodate($v['seller_ctime']);?></span> 评论：</span>
</div>
<div class="comment_content" id="c_<?php echo $v['itemid'];?>"><?php echo nl2br($v['seller_comment']);?></div>
<?php if($v['buyer_reply']) { ?>
<div class="comment_reply">
<span>卖家</span> <?php echo timetodate($v['buyer_rtime']);?> 回复： <?php echo nl2br($v['buyer_reply']);?>
</div>
<?php } ?>
</div>
<?php } } ?>
<?php } else { ?>
<br/><br/><br/><center>暂无评价</center><br/><br/><br/>
<?php } ?>
<?php } else { ?>
<div class="content">
公司名称：<?php echo $COM['company'];?><br/>
公司类型：<?php echo $COM['type'];?> (<?php echo $COM['mode'];?>)<br/>
所在地区：<?php echo area_pos($COM['areaid'], '/');?><br/>
公司规模：<?php echo $COM['size'];?><br/>
注册资本：<?php if($COM['capital']) { ?><?php echo $COM['capital'];?>万<?php echo $COM['regunit'];?><?php } else { ?>未填写<?php } ?>
<br/>
注册年份：<?php echo $COM['regyear'];?><br/>
资料认证：<?php if($COM['validated']) { ?>企业资料<span class="f_green">通过<?php echo $COM['validator'];?></span>认证<?php } ?>
<br/>
<?php if($COM['vcompany']) { ?>工商认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vtruename']) { ?>实名认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vbank']) { ?>银行帐号认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vmobile']) { ?>手机认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['vemail']) { ?>邮件认证：<span class="f_green">已通过</span><br/><?php } ?>
<?php if($COM['deposit']) { ?>
保&nbsp;&nbsp;证&nbsp;&nbsp;金：已缴纳 <strong class="f_green"><?php echo $DT['money_sign'];?><?php echo $COM['deposit'];?></strong> <?php echo $DT['money_unit'];?><br/>
<?php } ?>
<?php if($COM['mode']) { ?>
经营模式：<?php echo $COM['mode'];?><br/>
<?php } ?>
<?php if($COM['business']) { ?>
经营范围：<?php echo $COM['business'];?><br/>
<?php } ?>
<?php if($COM['sell']) { ?>
销售产品：<?php echo $COM['sell'];?><br/>
<?php } ?>
<?php if($COM['buy']) { ?>
采购产品：<?php echo $COM['buy'];?>
<?php } ?>

</div>
<?php } ?>
</div>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer', 'mobile');?>