<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="banner">
<div class="w1180">
<div class="banner_left">
<img src="<?php echo $banner;?>" width="100%" alt="banner">
<p>
<?php $jia=tag("moduleid=22&condition=status>2 and username='$username'&pagesize=4&order=edittime desc&fields=itemid,title,linkurl,areaid,catid,thumb,edittime,pinpai,chuangli,moshi,touzi,yongjin,xuanshang&template=null");?>
<?php if(is_array($jia)) { foreach($jia as $i => $t) { ?>
<?php echo $t['title'];?>
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
">点击详情</a>
<?php } } ?>
</p>
</div>
<div class="banner_right">
<h3><?php echo $COM['company'];?></h3>
<div class="t1">
<p><?php echo dsubstr($COM['intro'],280,'...');?></p>
</div>
<div class="t2">
<ul>
<li class="bor"><a href="####">企业认证</a></li>
<li><a href="####">营业执照</a></li>
<li class="bor"><a href="###">主营行业</a></li>
<li><a href="###">餐饮美食</a></li>
</ul>
</div>
<div class="t3">
<table>
<tr>
<td class="t4">联系电话</td>
<td class="t5"><?php echo $DT['telephone'];?></td>
<!--<td class="t5"><?php echo $COM['telephone'];?></td>-->
</tr>
<tr>
<td class="t4">企业地址</td>
<td class="t5"><?php echo $COM['address'];?></td>
</tr>
</table>
</div>
<!---
<div class="share"><a href="">分享本页</a></div>
--->
</div>
</div>
</div>
<!-- title 1 -->
<div class="title w1180">
<p>产品展示<a href="<?php echo userurl($username, 'file=sell', $domain);?>">更多></a></p>
</div>
<!-- part 1 -->

<ul class="part_1 w1180 animated swing" id="part_1">
<?php $tags=tag("moduleid=5&condition=status>2 and username='$username'&pagesize=5&order=edittime desc&fields=itemid,title,linkurl,thumb,edittime,hits,jine&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<div class="good_pic"><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb'], 100);?>" alt="<?php echo $t['alt'];?>"></a></div>
<h2><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><?php echo dsubstr($t['title'],28,'...');?></a></h2>
<dl>
<dd class="bor">
<p class="y1">赏金金额</p>
<p class="y2"><?php echo $t['jine'];?>元</p>
</dd>
<dd>
<p class="y1">关注度</p>
<p class="y2"><?php echo $t['hits'];?></p>
</dd>
</dl>
</li>
<?php } } ?>
</ul>

<!-- title 2 -->
<div class="title w1180">
<p>加盟代理<a href="<?php echo userurl($username, 'file=info', $domain);?>">更多></a></p>
</div>
<ul class="part_2 w1180">
<?php $jiameng=tag("moduleid=22&condition=status>2 and username='$username'&pagesize=4&order=edittime desc&fields=itemid,title,linkurl,areaid,catid,thumb,edittime,pinpai,chuangli,moshi,touzi,yongjin,xuanshang&template=null");?>
<?php if(is_array($jiameng)) { foreach($jiameng as $i => $t) { ?>
<li class="animated lightSpeedIn">
<div class="p2_top">
<div class="p2_img"><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>"></a></div>
<div class="p2_info">
<h3><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a></h3>
<table>
<tr>
<td>品牌：<?php echo $t['pinpai'];?></td>
<td>地区：<?php echo area_pos($t['areaid'], ' ');?></td>
</tr>
<tr>
<td>行业：<?php echo cat_pass($t['catid'],'catname',1);?>><?php echo cat_pass($t['catid'],'catname');?></td>
<td>创立：<?php echo $t['chuangli'];?>年</td>
</tr>
<tr>
<td colspan="2">模式：<span><?php echo $t['moshi'];?></span></td>
</tr>
</table>
</div>
</div>
<div class="p2_bot">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>">投资：<?php echo $t['touzi'];?>元</a>
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>" class="active">佣金：<span><?php echo $t['yongjin'];?>元</span></a>
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>" class="active">悬赏：<span><?php echo $t['xuanshang'];?>元</span></a>
</div>
</li>
<?php } } ?>
</ul>
<!-- title 3 -->
<div class="title w1180">
<p>资讯中心<a href="<?php echo userurl($username, 'file=news', $domain);?>">更多></a></p>
</div>
<div class="part_3 w1180">
<ul>
<?php $news=tag("moduleid=21&condition=status>2 and username='$username'&pagesize=18&order=edittime desc&fields=itemid,title,linkurl,thumb,edittime&template=null");?>
<?php if(is_array($news)) { foreach($news as $i => $t) { ?>
<li><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'], 32, '...');?></a> <span><?php echo timetodate($t['edittime'], 3);?></span></li>
<?php } } ?>
</ul>
</div>
<!-- title 4 -->
<div class="title w1180">
<p>代理意向(186)<a href="<?php echo userurl($username, 'file=contact', $domain);?>">更多></a></p>
</div>
<div class="part_4 w1180">
<table cellspacing="0">
<tbody>
<tr>
<th style="width: 100px">日期</th>
<th style="width: 100px">客户</th>
<th style="width: 100px">项目</th>
<th style="width: 100px">联系方式</th>
<th style="width: 100px">地区</th>
<th style="width: 680px">详细内容|联系地址</th>
</tr>
<?php $guestbooks=tag("table=guestbook&condition=username='$username' and status =3 &pagesize=5&order=addtime desc&fields=itemid,title,areaid,content,addtime,address,truename,telephone&template=null");?>
<?php if(is_array($guestbooks)) { foreach($guestbooks as $i => $t) { ?>
<tr>
<td><?php echo timetodate($t['addtime'], 3);?></td>
<td><?php echo $t['truename'];?></td>
<td><?php echo $t['truename'];?></td>
<td class="yellow">
<?php if($_groupid == 7) { ?>
<?php echo $t['telephone'];?>
<?php } else { ?>
<a href="#modal" data-uk-modal="{center:true}">VIP查看</a>
<?php } ?>
</td>
<td><?php echo area_pos($t['areaid'], ' ');?></td>
<td><?php echo dsubstr(strip_tags($t['content']),70,'');?>|<?php echo $t['address'];?></td>
</tr>
<?php } } ?>

</tbody>
</table>
<div class="small_title">
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/part4.jpg" alt="">
</div>
<!-- form 表单 -->
<div class="part_4_form">
<ul>
<li class="form_left">
<form method="post" action="/company/home.php">
<input type="hidden" name="job" value="guestbook"/>
<input type="hidden" name="username" value="<?php echo $username;?>"/>
<input type="hidden" name="action" value="send"/>
<div>
<label for="xiangmu">项目</label>
<select name="title" value="" id="title">
<?php $title=tag("moduleid=5&condition=status>2 and username='$username'&pagesize=10&order=edittime desc&fields=itemid,title&template=null");?>
<?php if(is_array($title)) { foreach($title as $i => $t) { ?>
<option value="<?php echo $t['title'];?>"><?php echo $t['title'];?></option>
<?php } } ?>
</select>
</div>
<div>
<label for="name">姓名</label>
<input type="text" name="truename">
</div>
<div>
<label for="telphone">电话</label>
<input type="text" name="telephone">
</div>
<div>
<label for="address">详细地址</label>
<input type="text" name="address">
</div>
<div>
<label for="address">地区</label>
<select name="areaid" value="" id="areaid">
<?php $mainarea = get_mainarea(0)?>
<?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
<option value="<?php echo $v['areaid'];?>"><?php echo $v['areaname'];?></option>
<?php } } ?>
</select>
</div>
<div>
<label for="telphone">验证码</label>
<input name="captcha" id="captcha" type="text" size="6" onfocus="showcaptcha();" value="点击显示" placeholder="验证码" class="f_gray" />&nbsp;<img src="/skin/default/image/loading.gif" title="验证码,看不清楚?请点击刷新&#10;字母不区分大小写" alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="display:none;cursor:pointer;"/><span id="ccaptcha"></span><script type="text/javascript">
function showcaptcha() {
if(Dd('captchapng').style.display=='none') {
Dd('captchapng').style.display='';
}
if(Dd('captchapng').src.indexOf('loading.gif') != -1) {
Dd('captchapng').src='/api/captcha.png.php?action=image';
}
if(Dd('captcha').value=='点击显示') {
Dd('captcha').value='';
}
Dd('captcha').className = '';
}
function reloadcaptcha() {
Dd('captchapng').src = '/api/captcha.png.php?action=image&refresh='+Math.random();
Dd('ccaptcha').innerHTML = '';
Dd('captcha').value = '';
}
function checkcaptcha(s) {
s = s.trim();
var t = encodeURIComponent(s);
if(t.indexOf('%E2%80%86') != -1) s = decodeURIComponent(t.replace(/%E2%80%86/g, ''));
if(!is_captcha(s)) return;
$.post(AJPath, 'action=captcha&captcha='+s,
function(data) {
if(data == '0') {
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_right.gif" align="absmiddle"/>';
} else {
Dd('captcha').focus;
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_error.gif" align="absmiddle"/>';
}
}
);
}
function is_captcha(v) {
if(v == '点击显示') return false;
if(v.match(/^[a-z0-9A-Z]{1,}$/)) {
return v.match(/^[a-z0-9A-Z]{4,}$/);
} else {
return v.length > 1;
}
}
$(function() {
$('#captcha').bind('keyup blur', function() {
checkcaptcha($('#captcha').val());
});
});
</script> <span id="dcaptcha" class="f_red"></span>
</div>
<div>
<textarea name="content" id="" cols="30" rows="10"></textarea>
<input type="submit" id="sub" value="提交">
</div>
</form>
<p>温馨提示：清填写您的真实信息，方便我们为您提供更优质的服务</p>
</li>
<li class="form_right">
<dl>
<dt class="yellow"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon3.jpg" alt="" align="absmiddle">口碑胜于一切</dt>
<dd>数十元创业者通过小宝招商成功收获财富</dd>
<dt class="yellow"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon4.jpg" alt="" align="absmiddle">诚信招商项目</dt>
<dd>只推荐拥有合法资质与证件齐全的项目</dd>
<dt class="yellow"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon5.jpg" alt="" align="absmiddle">信息安全保护</dt>
<dd>采取严格安全信息，保证您的个人信息安全</dd>
</dl>
</li>
</ul>
</div>
</div>
<!-- part_5 -->
<div class="w1180 part_5">
<h2>代理产品 5 步走路&nbsp;&nbsp;&nbsp;&nbsp;<span>诚信经营，共创未来！</span></h2>
<ul>
<li>
<span>1</span>
<h3><a href="">登录小宝在招商</a></h3>
<p>百度搜“小宝招商”输入iaobaodt.com</p>
</li>
<li>
<span>2</span>
<h3><a href="">寻找意向产品</a></h3>
<p>搜索查找点广告查找</p>
</li>
<li>
<span>3</span>
<h3><a href="">留言咨询</a></h3>
<p>留言咨询在线咨询</p>
</li>
<li>
<span>4</span>
<h3><a href="">双方洽谈</a></h3>
<p>双方沟通合作事宜</p>
</li>
<li>
<span>5</span>
<h3><a href="">合作成功</a></h3>
<p>实地考察签订合同</p>
</li>
</ul>
</div>
<!-- part 6 -->
<div class="part_6 w1180">
<ul>
<li class="bor">
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon6.png" alt="">
<div>
<h3>小宝招商网 服务热线</h3>
<h4><?php echo $DT['telephone'];?></h4>
<p>诚信招商，信息安全有保障</p>
</div>
</li>
<li class="bor">
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon7.png" alt="">
<div>
<h3>小宝招商网 客服中心</h3>
<p>姓名：<?php echo $DT['kfname'];?></p>
<p>手机：<?php echo $DT['mobile'];?></p>
<p>Q Q： <a <?php if($DT['qq']) { ?>
href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $DT['qq'];?>&site=qq&menu=yes"<?php } ?>
 class="uk-button" target="_blank">在线咨询</a></p>
</div>
</li>
<li>
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon8.png" alt="">
<div>
<h3>让天下没有难做的生意</h3>
<p>让代理商精准找到火爆产品！</p>
<p>让厂商招到更多实力代理商！</p>
<p>让业务员实在赚到钱！</p>
</div>
</li>
</ul>
</div>
<div id="" class="clear">

</div>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=&amp;style=3&amp;fs=4&amp;textcolor=#fff&amp;bgcolor=#F60&amp;text=分享到"></script>
<!-- 模态对话框 -->
<div id="modal" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-lightbox">
<a href="" class="uk-modal-close uk-close"></a>
<a href="/member/charge.php?action=pay" target="_blank"><img src="/skin/xiaobao/images/pay.jpg" width="352" height="288" alt=""></a>
</div>
</div>
<?php include template('footer', $template);?>