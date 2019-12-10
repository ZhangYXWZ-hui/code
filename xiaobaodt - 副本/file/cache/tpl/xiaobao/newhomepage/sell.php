<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<?php if($itemid) { ?>
<!-- 主体 -->
<div class="list_bg">
<div class="w1180 goods_con">
<div class="bread_curb">
<a href="<?php echo $COM['linkurl'];?>">小宝招商</a> > <a href="<?php echo $COM['linkurl'];?>"><?php echo $COM['company'];?></a> > <a href="<?php echo $MENU[$menuid]['linkurl'];?>">产品展示</a>
</div>
<div class="goods_list">
<div class="goods_left goods_left_bor">
<div class="good_info">
<div class="good_pic2"><img src="<?php echo $albums['0'];?>" alt="<?php echo $title;?>"></div>
<div class="good_intro">
<h1><?php echo dsubstr($title,36,'');?></h1>
<p>品牌：<?php echo $brand;?></p>
<p>赏金金额：<?php echo $jine;?>元</p>
<p>模式：<?php echo $moshi;?></p>
<?php if($DT['qq']) { ?>
<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $DT['qq'];?>&site=qq&menu=yes" class="p1">在线咨询</a>
<?php } else { ?>
<a href="#" class="p1">在线咨询</a>
<?php } ?>
<a href="/member/chat.php?touser=<?php echo $username;?>" class="p2">索要资料</a>
</div>
<div class="clear"></div>
<div class="title">
<p>产品介绍</p>
</div>
<p class="introduce"><?php echo $content;?></p>
<div class="title">
<p>代理意向(186)<a href="<?php echo userurl($username, 'file=contact', $domain);?>">更多&gt;</a></p>
</div>
<div class="part_4">
<table cellspacing="0">
<tbody>
<tr>
<th style="width: 100px">日期</th>
<th style="width: 100px">客户</th>
<th style="width: 100px">项目</th>
<th style="width: 100px">联系方式</th>
<th style="width: 100px">地区</th>
<th style="width: 300px">详细内容|联系地址</th>
</tr>
<?php $guestbooks=tag("table=guestbook&condition=username='$username' and status =3 &pagesize=5&order=addtime desc&fields=itemid,title,areaid,addtime,content,address,truename,telephone&template=null");?>
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
<td><?php echo dsubstr(strip_tags($t['content']),20,'...');?>|<?php echo $t['address'];?></td>
</tr>
<?php } } ?>
</tbody>
</table>
<div class="small_title">
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/part4.jpg" alt="" width="100%">
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
<option value="<?php echo $t['title'];?>" <?php if($t['title'] == $title) { ?>selected<?php } ?>
><?php echo $t['title'];?></option>
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
<textarea name="content" id="" cols="30" rows="10"></textarea>
<input type="submit" id="sub" value="提交">
</div>
<div>
<label for="captcha" class="captcha_label">验证码</label>
<input name="captcha" id="captcha" type="text" size="6" onfocus="showcaptcha();" value="点击显示" placeholder="验证码" class="f_gray" style="margin:10px 0 10px 0;"/>&nbsp;<img src="/skin/default/image/loading.gif" title="验证码,看不清楚?请点击刷新&#10;字母不区分大小写" alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="display:none;cursor:pointer;"/><span id="ccaptcha"></span><script type="text/javascript">
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
</form>
<p>温馨提示：清填写您的真实信息，方便我们为您提供更优质的服务</p>
</li>
<li class="form_right">
<dl>
<dt class="yellow"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon3.jpg" alt="" align="absmiddle">口碑胜于一切</dt>
<dd>数十万创业者通过小宝招商成功收获财富</dd>
<dt class="yellow"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon4.jpg" alt="" align="absmiddle">诚信招商项目</dt>
<dd>只推荐拥有合法资质与证件齐全的项目</dd>
<dt class="yellow"><img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/icon5.jpg" alt="" align="absmiddle">信息安全保护</dt>
<dd>采取严格安全信息，保证您的个人信息安全</dd>
</dl>
</li>
</ul>
</div>
</div>
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
<div class="goods_right_bottom">
<h4><span>产品分类</span></h4>
<ul>
<?php $child = get_maincat(1, $CATEGORY, 1);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" ><?php echo set_style($c['catname'], $c['style']);?><span>></span></a></li>
<?php } } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="title w1180">
<p>相关产品<a href="####">更多&gt;</a></p>
</div>
<ul class="part_1 w1180 animated swing" id="part_1">
<?php $tags=tag("moduleid=5&condition=status>2 and username='$username'&pagesize=5&order=rand() desc&fields=itemid,title,linkurl,thumb,edittime,hits,jine&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<div class="good_pic"><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb'], 100);?>" alt="<?php echo $t['alt'];?>"></a></div>
<h2><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><?php echo dsubstr($t['title'],50,'...');?></a></h2>
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
<?php } else { ?>
<!-- 主体 -->
<div class="list_bg">
<div class="w1180 goods_con">
<div class="bread_curb">
<a href="<?php echo $COM['linkurl'];?>">小宝招商</a> > <a href="<?php echo $COM['linkurl'];?>"><?php echo $COM['company'];?></a> > <a href="<?php echo $MENU[$menuid]['linkurl'];?>">产品展示</a>
</div>
<div class="goods_list">
<div class="goods_left">
<ul class="goods_left_list">
<?php if(is_array($lists)) { foreach($lists as $k => $t) { ?>
<li>
<div class="good_pic"><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb'], 100);?>" alt="<?php echo $t['alt'];?>"></a></div>
<h2><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=sell&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><?php echo dsubstr($t['title'],50,'...');?></a></h2>
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
<ul class="page_list">
<?php echo $pages;?>
<li class="bor"><a href="">共有<?php echo (round($items/$pagesize)+1);?>页</a></li>
</ul>
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
<div class="goods_right_bottom">
<h4><span>产品分类</span></h4>
<ul>
<?php $child = get_maincat(1, $CATEGORY, 1);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
<li><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" ><?php echo set_style($c['catname'], $c['style']);?><span>></span></a></li>
<?php } } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<div id="" class="clear"></div>
<!-- 模态对话框 -->
<div id="modal" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-lightbox">
<a href="" class="uk-modal-close uk-close"></a>
<a href="/member/charge.php?action=pay" target="_blank"><img src="/skin/xiaobao/images/pay.jpg" width="352" height="288" alt=""></a>
</div>
</div>
<?php include template('footer', $template);?>
