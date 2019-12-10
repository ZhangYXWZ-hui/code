<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="index.php?moduleid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<?php if($EXT['comment_api']) { ?>
<a href="javascript:window.location.reload();"><span>刷新</span></a>
<?php } else { ?>
<a href="javascript:$('#box-star').show();<?php if($need_captcha) { ?>$('#box-captcha').show();<?php } ?>
$('#box-btn').show();Dcomment();"><span>发表</span></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($EXT['comment_api'] == 'changyan') { ?>
<div class="main">
<div id="SOHUCS" sid="<?php echo $mid;?>-<?php echo $itemid;?>"></div>
<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" 
src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=<?php echo $EXT['comment_api_id'];?>&conf=<?php echo $EXT['comment_api_key'];?>">
</script>
</div>
<?php } else if($EXT['comment_api'] == 'duoshuo') { ?>
<div class="main" style="padding:0 10px;">
<div class="ds-thread" data-thread-key="<?php echo $mid;?>-<?php echo $itemid;?>" data-title="<?php echo $title;?>" data-url="<?php echo $linkurl;?>" data-image="<?php if($thumb) { ?><?php echo str_replace('.thumb.'.file_ext($thumb), '', $thumb);?><?php } ?>
"></div>
<script type="text/javascript">
var duoshuoQuery = {short_name:"<?php echo $EXT['comment_api_id'];?>"};
(function() {
var ds = document.createElement('script');
ds.type = 'text/javascript';ds.async = true;
ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
ds.charset = 'UTF-8';
(document.getElementsByTagName('head')[0] 
 || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
</div>
<?php } else { ?>
<style type="text/css">
.quote{border:1px solid #DCDCDC;background:#FFFFFF;padding:10px;margin-bottom:10px;}
.quote_title {font-size:12px;color:#007AFF;}
.quote_time {font-size:11px;color:#999999;}
.quote_floor {float:right;font-size:10px;color:#999999;}
.quote_content {clear:both;}
.star_a {display:inline-block;margin:12px 10px 0 0;padding:2px 8px;background:#FF6600;color:#FFFFFF;font-size:12px;border-radius:6px;}
.star_b {display:inline-block;margin:12px 10px 0 0;padding:2px 8px;background:#EEEEEE;color:#333333;font-size:12px;border-radius:6px;}
</style>
<div class="main">
<div style="padding:0 0 0 16px;" class="bd-b">
<form method="post" id="comment-post">
<input type="hidden" name="action" value="post"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="star" value="3" id="star"/>
<div style="width:100%;height:68px;"><textarea name="content" id="content" placeholder="我来说两句" onblur="window.scrollTo(0,0);" style="width:98%;height:48px;line-height:24px;border:none;padding:0;margin:10px 0 0 0;font-size:16px;" onfocus="$('#box-star').show();<?php if($need_captcha) { ?>$('#box-captcha').show();<?php } ?>
$('#box-btn').show();"></textarea></div>
<div style="width:100%;height:44px;display:none;" class="bd-t" id="box-star">
<span id="star_3" class="star_a" onclick="Dstar(3);">好评</span>
<span id="star_2" class="star_b" onclick="Dstar(2);">中评</span>
<span id="star_1" class="star_b" onclick="Dstar(1);">差评</span>
</div>
<?php if($need_captcha) { ?>
<div style="width:100%;height:44px;font-size:16px;display:none;" class="bd-t" id="box-captcha"><?php include template('captcha', 'chip');?></div>
<?php } ?>
<div style="padding:10px 16px 10px 0;display:none;" onclick="Dcomment();" id="box-btn">
<div class="btn-blue">发表评论</div>
</div>
</form>
</div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="list-user">
<img src="<?php echo useravatar($v['uname']);?>" width="32" height="32"/>
<ul>
<li><span><?php echo $v['floor'];?>楼</span><a href="comment.php?action=user&username=<?php echo $v['uname'];?>&mid=<?php echo $mid;?>&itemid=<?php echo $itemid;?>" class="b"><?php echo $v['name'];?></a></li>
<li><em><?php if($v['star']==1) { ?>差评<?php } else if($v['star']==2) { ?>中评<?php } else { ?>好评<?php } ?>
 <?php echo timetodate($v['addtime'], 5);?></em></li>
</ul>
</div>
<div class="content">
<?php if($v['quotation']) { ?><?php echo $v['quotation'];?><?php } else { ?><?php echo $v['content'];?><?php } ?>
<?php if($v['reply']) { ?>
<br/><span class="px12 f_gray"><?php if($v['editor']) { ?><span style="color:red;">管理员</span><?php } else { ?><span style="color:blue;"><?php echo $v['replyer'];?></span><?php } ?>
 <?php echo timetodate($v['replytime'], 5);?> 回复： </span>
<br/><?php echo nl2br($v['reply']);?>
<?php } ?>
</div>
<?php } } ?>
<?php } else { ?>
<div class="list-empty">暂无评论</div>
<?php } ?>
</div>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<script type="text/javascript">
function Dstar(v) {
for(var i = 1; i < 4; i++) {
if(v == i) {
$('#star').val(i);
$('#star_'+i).attr('class', 'star_a');
} else {
$('#star_'+i).attr('class', 'star_b');
}
}
}
function Dcomment() {
window.scrollTo(0,0);
var len,va;;
len = $('#content').val().length;
if(len < <?php echo $MOD['comment_min'];?>) {
Dtoast('正文最少个<?php echo $MOD['comment_min'];?>字，已填写'+len+'个字');
return false;
}
if(len > <?php echo $MOD['comment_max'];?>) {
Dtoast('正文最多个<?php echo $MOD['comment_max'];?>字，已填写'+len+'个字');
return false;
}
<?php if($need_captcha) { ?>
val = $('#captcha').val();
if(!is_captcha(val)) {
Dtoast('请填写验证码');
return false;
}
<?php } ?>
$.post('comment.php', $('#comment-post').serialize(), function(data) {
if(data == 'ok') {
Dtoast('评论成功');
setTimeout(function() {
if($('#page-last').length > 0) {
Go($('#page-last').attr('href'));
} else {
window.location.reload();
}
}, 1000);
} else if(data == 'check') {
Dtoast('评论成功，请等待审核');
setTimeout(function() {
window.location.reload();
}, 1000);
} else if(data == 'captcha') {
Dtoast('验证码错误');
reloadcaptcha();
} else if(data == 'self') {
Dtoast('不能评论自己');
} else if(data == 'permission') {
Dtoast('无评论权限');
} else if(data == 'login') {
Dtoast('暂无权限，请登录再试');
} else if(data == 'max') {
Dtoast('今日评论次数过多');
<?php if($need_captcha) { ?>reloadcaptcha();<?php } ?>
} else if(data == 'fast') {
Dtoast('评论发表过快');
<?php if($need_captcha) { ?>reloadcaptcha();<?php } ?>
} else {
Dtoast('评论失败，请重试');
setTimeout(function() {
window.location.reload();
}, 1000);
}
});
return;
}
<?php if($need_captcha) { ?>
$(document).on('pageinit', function(event) {
$('#captcha').on('blur', function(){window.scrollTo(0,0);});
$('#captcha').css({'width':'100px','border':'none','padding':'0','font-size':'16px'});
showcaptcha();
});
<?php } ?>
</script>
<?php } ?>
<?php include template('footer', 'mobile');?>