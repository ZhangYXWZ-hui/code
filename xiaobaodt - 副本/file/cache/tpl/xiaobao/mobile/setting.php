<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<style type="text/css">
.list-channel div {float:left;margin:16px 16px 0 0;padding:8px 14px;background:#F8F8F8;color:#333333;border-radius:4px;font-size:16px;}
</style>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback('index.php?reload=<?php echo $DT_TIME;?>');" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;javascript:Dclear();Dsheet(0);&#34;><span style=&#34;color:red;&#34;>还原</span></a>', '取消', '确定要还原所有设置吗？');"><span>还原</span></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="main" style="padding:0 0 16px 16px;">
<div style="line-height:44px;padding-right:16px;font-size:16px;" class="bd-b">已选频道<span class="f_r" style="color:#999999;font-size:12px;">轻按移除，左右滑动排序</span></div>
<div id="channel-my" class="list-channel">
<?php if(is_array($my_arr)) { foreach($my_arr as $i) { ?>
<div data-id="<?php echo $i;?>"><?php echo $MOB_MOD[$i]['name'];?></div>
<?php } } ?>
</div>
<div style="line-height:44px;padding-right:16px;font-size:16px;" class="bd-b c_b">待选频道<span class="f_r" style="color:#999999;font-size:12px;">轻按恢复</span></div>
<div id="channel-rm" class="list-channel">
<?php if(is_array($rm_arr)) { foreach($rm_arr as $i) { ?>
<div data-id="<?php echo $i;?>"><?php echo $MOB_MOD[$i]['name'];?></div>
<?php } } ?>
</div>
<div class="c_b"></div>
</div>
<script type="text/javascript">
var M = new Array();
<?php if(is_array($MOB_MODULE)) { foreach($MOB_MODULE as $i => $m) { ?>
M[<?php echo $m['moduleid'];?>] = '<?php echo $m['name'];?>';
<?php } } ?>
var logid = 0;
function Dswap(arr, a, b) {
arr[a] = arr.splice(b, 1, arr[a])[0];
return arr;
}
function Dorder(id, type) {
var MY = new Array();
var i = c = 0;
$('#channel-my div').each(function() {
MY[i] = $(this).attr('data-id');
if(MY[i] == id) c = i;
i++;
});
if(type == '+') {
if(c == 0) return;
MY = Dswap(MY, c, c - 1);
} else {
if(c == MY.length - 1) return;
MY = Dswap(MY, c, c + 1);
}
var html = '';
for(var j = 0; j < MY.length; j++) {
html += '<div data-id="'+MY[j]+'">'+M[MY[j]]+'</div>';
}
$('#channel-my').html(html);
}
function Dsync() {
var id= '';
$('#channel-my div').each(function() {
id += ','+$(this).attr('data-id');
});
$.post('setting.php', {'action':'sync','id':id});
}
function Dclear() {
$.post('setting.php', {'action':'sync','id':'clear'}, function(data) {
if(data == 'ok') {
Dtoast('还原成功');
setTimeout(function() {
window.location.reload();
}, 1000);
}
});
}
$(document).on('pageinit', function(event) {
var html_my = html_rm = '';
setInterval(function() {
if(html_my != $('#channel-my').html() || html_rm != $('#channel-rm').html()) {
$('#channel-my div').unbind();
$('#channel-rm div').unbind();
$('#channel-my div').bind('swipeleft',function(){
Dorder($(this).attr('data-id'), '+');
});

$('#channel-my div').bind('swiperight',function(){
Dorder($(this).attr('data-id'), '-');
});
$('#channel-my div').bind('click',function(){
if($('#channel-my div').length < 3) {
Dtoast('至少需要保留2个频道');
} else {
console.log(logid++);
if($('#channel-rm').html().indexOf($(this).html()) == -1) {
$('#channel-rm').append('<div data-id="'+$(this).attr('data-id')+'">'+$(this).html()+'</div>');
Dtoast($(this).html()+'已移除');
}
$(this).remove();
}
});
$('#channel-rm div').bind('click',function(){
console.log(logid++);
if($('#channel-my').html().indexOf($(this).html()) == -1) {
$('#channel-my').append('<div data-id="'+$(this).attr('data-id')+'">'+$(this).html()+'</div>');
Dtoast($(this).html()+'已恢复');
}
$(this).remove();
});
if(html_my && html_my != $('#channel-my').html()) Dsync();
if(html_my != $('#channel-my').html()) html_my = $('#channel-my').html();
if(html_rm != $('#channel-rm').html()) html_rm = $('#channel-rm').html();
}
}, 500);
});
</script>
<?php include template('footer', 'mobile');?>