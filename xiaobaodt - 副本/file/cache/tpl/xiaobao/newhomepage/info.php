<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?> <?php if($itemid) { ?> <?php if($COM['groupid']==7) { ?>
<!-- content -->
<div class="list_bg">
<div class="w1180 goods_con">
<div class="bread_curb">
<a href="<?php echo $COM['linkurl'];?>">小宝招商</a> > <a href="<?php echo $COM['linkurl'];?>"><?php echo $COM['company'];?></a> > <a href="<?php echo $MENU[$menuid]['linkurl'];?>">招商代理</a>
</div>
<div class="goodsShow">
<div class="goodsConShPic">
<img src="<?php echo imgurl($thumb);?>" alt="<?php echo $title;?>">
</div>
<div class="goodsShowCon">
<h2><?php echo $title;?></h2>
<ul>
<li>品牌名称：<?php echo $pinpai;?></li>
<li>投资金额：
<font><?php echo $touzi;?>元</font>
</li>
<li>所属行业：<?php echo cat_pass($catid, 'catname',1);?>><?php echo cat_pass($catid, 'catname');?></li>
<li>经营模式：<?php echo $moshi;?></li>
<li>&nbsp;</li>
<li>招商对象：<?php echo $zsdx;?></li>
<li>创立时间：<?php echo $chuangli;?>年</li>
<li>招商地区：<?php echo $zsqy;?></li>
</ul>
<div class="goodsShowUs">
<p class="colorOr">悬赏佣金：<?php echo $yongjin;?>元</p>
<span class="active"><a href="<?php if($COM['qq']) { ?>http://wpa.qq.com/msgrd?v=3&uin=<?php echo $COM['qq'];?>&site=qq&menu=yes<?php } ?>
">在线咨询</a></span>
<span><a href="/member/chat.php?touser=<?php echo $username;?>">索要资料</a></span>
<p><a href="javascript:void(0);"><i class="iconfont icon-shoucang"></i>加入收藏</a></p>
</div>
</div>
</div>
<div class="goods_list">
<!-- 左边的部分 -->
<div class="goods_left goods_left_bor">
<div class="goods_leftCon">
<div class="goodLeftInTie">
<h4>项目简介</h4>
</div>
<div class="goodLeftDesc">
<p><?php echo $content;?></p>
</div>
<div class="goodLeftInTie">
<h4>市场分析</h4>
</div>
<div class="goodLeftDesc">
<p><?php echo $scfx;?></p>
</div>
<div class="goodLeftInTie">
<h4>加盟方式</h4>
</div>
<div class="goodLeftDesc">
<p><?php echo $jmfs;?></p>
</div>
<div class="goodLeftInTie">
<h4>代理意向&nbsp;&nbsp;<small>(186)</small><span><a href="javascript:void(0)">更多></a></span></h4>
</div>
<div class="goodLeftDesc">
<table>
<tbody>
<tr>
<td width="100">日期</td>
<td width="100">客户</td>
<td width="140">联系方式</td>
<td width="140">地区</td>
<td width="354">详细内容|联系地址</td>
</tr>
<?php $guestbooks=tag("table=guestbook&condition=username='$username' and status =3 &pagesize=5&order=addtime desc&fields=itemid,title,areaid,addtime,address,truename,telephone&template=null");?>
<?php if(is_array($guestbooks)) { foreach($guestbooks as $i => $t) { ?>
<tr>
<td><?php echo timetodate($t['addtime'], 3);?></td>
<td><?php echo $t['truename'];?></td>
<td class="yellow">
<?php if($_groupid == 7) { ?> <?php echo $t['telephone'];?> <?php } else { ?> <a href="#modal" data-uk-modal="{center:true}">VIP查看</a> <?php } ?>
</td>
<td><?php echo area_pos($t['areaid'], ' ');?></td>
<td><?php echo $t['address'];?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
<div class="goodLeftDesc">
<div class="small_title">
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/part4.jpg" alt="" width="100%">
</div>
<!-- form 表单 -->
<div class="part_4_form">
<ul>
<li class="form_left">
<form method="post" action="/company/home.php">
<input type="hidden" name="job" value="guestbook" />
<input type="hidden" name="username" value="<?php echo $username;?>" />
<input type="hidden" name="action" value="send" />
<div>
<label for="xiangmu">项目</label>
<select name="title" value="" id="title">
<?php $title=tag("moduleid=22&condition=status>2 and username='$username'&pagesize=10&order=edittime desc&fields=itemid,title&template=null");?>
<?php if(is_array($title)) { foreach($title as $i => $t) { ?>
<option value="<?php echo $t['itemid'];?>"><?php echo $t['title'];?></option>
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
<label for="telphone" class="captcha">验证码</label>
<input name="captcha" id="captcha" type="text" size="6" onfocus="showcaptcha();" value="点击显示" placeholder="验证码" class="f_gray"
 style="margin:10px 0 10px 0;" />&nbsp;<img src="/skin/default/image/loading.gif" title="验证码,看不清楚?请点击刷新&#10;字母不区分大小写"
 alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="display:none;cursor:pointer;" />
<span
 id="ccaptcha"></span>
<script type="text/javascript">
function showcaptcha() {
if (Dd('captchapng').style.display == 'none') {
Dd('captchapng').style.display = '';
}
if (Dd('captchapng').src.indexOf('loading.gif') != -1) {
Dd('captchapng').src = '/api/captcha.png.php?action=image';
}
if (Dd('captcha').value == '点击显示') {
Dd('captcha').value = '';
}
Dd('captcha').className = '';
}
function reloadcaptcha() {
Dd('captchapng').src = '/api/captcha.png.php?action=image&refresh=' + Math.random();
Dd('ccaptcha').innerHTML = '';
Dd('captcha').value = '';
}
function checkcaptcha(s) {
s = s.trim();
var t = encodeURIComponent(s);
if (t.indexOf('%E2%80%86') != -1) s = decodeURIComponent(t.replace(/%E2%80%86/g, ''));
if (!is_captcha(s)) return;
$.post(AJPath, 'action=captcha&captcha=' + s,
function (data) {
if (data == '0') {
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_right.gif" align="absmiddle"/>';
} else {
Dd('captcha').focus;
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_error.gif" align="absmiddle"/>';
}
}
);
}
function is_captcha(v) {
if (v == '点击显示') return false;
if (v.match(/^[a-z0-9A-Z]{1,}$/)) {
return v.match(/^[a-z0-9A-Z]{4,}$/);
} else {
return v.length > 1;
}
}
$(function () {
$('#captcha').bind('keyup blur', function () {
checkcaptcha($('#captcha').val());
});
});
</script> <span id="dcaptcha" class="f_red"></span>
</div>
</form>
<p>温馨提示：清填写您的真实信息，方便我们为您提供更优质的服务</p>
</li>
<li class="form_right">
<dl class="mg30">
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
</div>

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
<div class="goods_right_bottom goods_right_bottom2">
<div class="title">
<p>推荐项目<a href="<?php echo userurl($username, 'file=info', $domain);?>">更多&gt;</a></p>
</div>
<dl>
<?php $jiameng=tag("moduleid=22&condition=status>2 and username='$username'&pagesize=4&order=edittime desc&fields=itemid,title,linkurl,areaid,catid,thumb,edittime,pinpai,chuangli,moshi,touzi,yongjin,xuanshang&template=null");?>
<?php if(is_array($jiameng)) { foreach($jiameng as $i => $t) { ?>
<dd>
<div class="right_pic">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>"></a>
</div>
<div class="right_intro">
<h3><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'],20,'...');?></a></h3>
<p>地区：<?php echo area_pos($t['areaid'], ' ');?></p>
<p>投资：<?php echo $t['touzi'];?>元</p>
</div>
</dd>
<?php } } ?>
</div>
</div>
</div>
</div>
</div>
<?php } else { ?>
<!-- content -->
<div class="list_bg">
<div class="w1180 goods_con">
<div class="bread_curb">
<a href="<?php echo $COM['linkurl'];?>">小宝招商</a> > <a href="<?php echo $COM['linkurl'];?>"><?php echo $COM['company'];?></a> > <a href="<?php echo $MENU[$menuid]['linkurl'];?>">招商代理</a>
</div>
<div class="goods_list">
<!-- 左边的部分 -->
<div class="goods_left goods_left_bor">
<div class="goods_leftCon">
<div id="" class="info">
<div id="" class="left">
<img src="<?php echo imgurl($thumb);?>" alt="<?php echo $title;?>">
</div>
<div id="" class="right">
<h2><?php echo dsubstr($title,32,'...');?><span class=""><i class="iconfont icon-shoucang"></i>加入收藏</span></h2>
<P><?php echo dsubstr($content,200,'...');?></P>
<ul>
<li style="margin-top:10px;">悬赏佣金 10-20元</li>
<li class="online"><a href="<?php if($COM['qq']) { ?>http://wpa.qq.com/msgrd?v=3&uin=<?php echo $COM['qq'];?>&site=qq&menu=yes<?php } ?>
">在线咨询</a></li>
<li class="ziliao"><a href="/member/chat.php?touser=<?php echo $username;?>">索要资料</a></li>
</ul>
</div>
</div>
<div id="" class="clear">
</div>
<div class="goodLeftInTie mt">
<h4>项目简介</h4>
</div>
<div class="goodLeftDesc">
<p><?php echo $content;?></p>
</div>
<div class="goodLeftInTie">
<h4>市场分析</h4>
</div>
<div class="goodLeftDesc">
<p><?php echo $scfx;?></p>
</div>
<div class="goodLeftInTie">
<h4>加盟方式</h4>
</div>
<div class="goodLeftDesc">
<p><?php echo $jmfs;?></p>
</div>
<div class="goodLeftInTie">
<h4>代理意向&nbsp;&nbsp;<small>(186)</small><span><a href="javascript:void(0)">更多></a></span></h4>
</div>
<div class="goodLeftDesc">
<table>
<tbody>
<tr>
<td width="100">日期</td>
<td width="100">客户</td>
<td width="140">联系方式</td>
<td width="140">地区</td>
<td width="354">详细内容|联系地址</td>
</tr>
<?php $guestbooks=tag("table=guestbook&condition=username='$username' and status =3 &pagesize=5&order=addtime desc&fields=itemid,title,areaid,addtime,address,truename,telephone&template=null");?>
<?php if(is_array($guestbooks)) { foreach($guestbooks as $i => $t) { ?>
<tr>
<td><?php echo timetodate($t['addtime'], 3);?></td>
<td><?php echo $t['truename'];?></td>
<td class="yellow">
<?php if($_groupid == 7) { ?> <?php echo $t['telephone'];?> <?php } else { ?> <a href="#modal" data-uk-modal="{center:true}">VIP查看</a> <?php } ?>
</td>
<td><?php echo area_pos($t['areaid'], ' ');?></td>
<td><?php echo $t['address'];?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>

<div class="small_title">
<img src="<?php echo DT_STATIC;?><?php echo $MODULE['4']['moduledir'];?>/skin/newskin/images/part4.jpg" alt="" width="100%">
</div>
<!-- form 表单 -->
<div class="part_4_form">
<ul>
<li class="form_left">
<form method="post" action="/company/home.php">
<input type="hidden" name="job" value="guestbook" />
<input type="hidden" name="username" value="<?php echo $username;?>" />
<input type="hidden" name="action" value="send" />
<div>
<label for="xiangmu">项目</label>
<select name="title" value="" id="title">
<?php $title=tag("moduleid=22&condition=status>2 and username='$username'&pagesize=10&order=edittime desc&fields=itemid,title&template=null");?>
<?php if(is_array($title)) { foreach($title as $i => $t) { ?>
<option value="<?php echo $t['itemid'];?>"><?php echo $t['title'];?></option>
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
<label for="telphone">验证码</label>
<input name="captcha" id="captcha" type="text" size="6" onfocus="showcaptcha();" value="点击显示" placeholder="验证码" class="f_gray"
 style="margin:10px 0 10px 0;" />&nbsp;<img src="/skin/default/image/loading.gif" title="验证码,看不清楚?请点击刷新&#10;字母不区分大小写"
 alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="display:none;cursor:pointer;" />
<span
 id="ccaptcha"></span>
<script type="text/javascript">
function showcaptcha() {
if (Dd('captchapng').style.display == 'none') {
Dd('captchapng').style.display = '';
}
if (Dd('captchapng').src.indexOf('loading.gif') != -1) {
Dd('captchapng').src = '/api/captcha.png.php?action=image';
}
if (Dd('captcha').value == '点击显示') {
Dd('captcha').value = '';
}
Dd('captcha').className = '';
}
function reloadcaptcha() {
Dd('captchapng').src = '/api/captcha.png.php?action=image&refresh=' + Math.random();
Dd('ccaptcha').innerHTML = '';
Dd('captcha').value = '';
}
function checkcaptcha(s) {
s = s.trim();
var t = encodeURIComponent(s);
if (t.indexOf('%E2%80%86') != -1) s = decodeURIComponent(t.replace(/%E2%80%86/g, ''));
if (!is_captcha(s)) return;
$.post(AJPath, 'action=captcha&captcha=' + s,
function (data) {
if (data == '0') {
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_right.gif" align="absmiddle"/>';
} else {
Dd('captcha').focus;
Dd('ccaptcha').innerHTML = '&nbsp;&nbsp;<img src="/skin/default/image/check_error.gif" align="absmiddle"/>';
}
}
);
}
function is_captcha(v) {
if (v == '点击显示') return false;
if (v.match(/^[a-z0-9A-Z]{1,}$/)) {
return v.match(/^[a-z0-9A-Z]{4,}$/);
} else {
return v.length > 1;
}
}
$(function () {
$('#captcha').bind('keyup blur', function () {
checkcaptcha($('#captcha').val());
});
});
</script> <span id="dcaptcha" class="f_red"></span>
</div>
</form>
<p>温馨提示：清填写您的真实信息，方便我们为您提供更优质的服务</p>
</li>
<li class="form_right">
<dl class="mg30">
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
</div>
<!-- 右边的部分 -->
<div class="goods_right">
<div class="goods_right_bor">
<!--<div class="goods_right_top">
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
</div>-->
<div class="goodsRigCon">
<div class="goodsRigComp">
<h4>山东必普电子商务股份有限公司</h4>
<span class="left">企业认证</span><span class="right">营业执照</span>
<span class="left">主营行业</span><span class="right"><font>餐饮美食</font></span>
<span class="left">联系电话</span><span class="right">400-996-8897</span>
<span class="left">企业地址</span><span class="right">山东省 济南市 历城区山东省济南市高新区舜泰广场1号楼5层</span>
</div>
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
<div class="right_pic">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>"></a>
</div>
<div class="right_intro">
<h3><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'],20,'...');?></a></h3>
<p>地区：<?php echo area_pos($t['areaid'], ' ');?></p>
<p>投资：<?php echo $t['touzi'];?>元</p>
</div>
</dd>
<?php } } ?>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
 <?php } else { ?>
<!-- content -->
<div class="list_bg">
<div class="w1180 goods_con">
<div class="bread_curb">
<a href="<?php echo $COM['linkurl'];?>">小宝招商</a> > <a href="<?php echo $COM['linkurl'];?>"><?php echo $COM['company'];?></a> > <a href="<?php echo $MENU[$menuid]['linkurl'];?>">招商代理</a>
</div>
<div class="goods_list">
<!-- 左边的部分 -->
<div class="goods_left goods_left_bor">
<?php if(is_array($lists)) { foreach($lists as $k => $t) { ?>
<div class="goodsLeftList">
<div class="goodsLeftPic">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb'], 100);?>" alt="<?php echo $t['alt'];?>"></a>
</div>
<div class="goodsLeftCon">
<h2><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['alt'];?>"><?php echo dsubstr($t['title'],28,'...');?></a></h2>
<span class="left">品牌：<?php echo $t['pinpai'];?></span><span class="right">地区：<?php echo area_pos($t['areaid'], ' ');?></span>
<span class="left">行业：<?php echo cat_pass($t['catid'], 'catname',1);?>><?php echo cat_pass($t['catid'], 'catname');?></span><span class="right">创立：<?php echo $t['chuangli'];?>年</span>
<span class="left">模式：<font><?php echo $t['moshi'];?></font></span>
</div>
<div class="goodsLeftRig">
<span class="borGray">投资：<?php echo $t['touzi'];?>元</span>
<span class="borOrag-1">佣金：<font><?php echo $t['yongjin'];?>元</font></span>
<span class="borOrag-2">悬赏：<font><?php echo $t['xuanshang'];?>元</font></span>
</div>
</div>
<div class="goodsLFLSHr"></div>
<?php } } ?>
<ul class="page_list">
<?php echo $pages;?>
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
<div class="goods_right_bottom goods_right_bottom2">
<div class="title">
<p>推荐项目<a href="<?php echo userurl($username, 'file=info', $domain);?>">更多&gt;</a></p>
</div>
<dl>
<?php $jiameng=tag("moduleid=22&condition=status>2 and username='$username'&pagesize=4&order=edittime desc&fields=itemid,title,linkurl,areaid,catid,thumb,edittime,pinpai,chuangli,moshi,touzi,yongjin,xuanshang&template=null");?>
<?php if(is_array($jiameng)) { foreach($jiameng as $i => $t) { ?>
<dd>
<div class="right_pic">
<a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>"></a>
</div>
<div class="right_intro">
<h3><a href="<?php if($homeurl) { ?><?php echo $t['linkurl'];?><?php } else { ?><?php echo userurl($username, 'file=info&itemid='.$t['itemid'], $domain);?><?php } ?>
" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'],20,'...');?></a></h3>
<p>地区：<?php echo area_pos($t['areaid'], ' ');?></p>
<p>投资：<?php echo $t['touzi'];?>元</p>
</div>
</dd>
<?php } } ?>
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