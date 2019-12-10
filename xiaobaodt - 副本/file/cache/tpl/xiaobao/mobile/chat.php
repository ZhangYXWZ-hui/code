<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<?php if($type == 3) { ?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="my.php" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>我的</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Nchat();"><span>创建</span></a>
</div>
</div>
<div class="head-bar-fix" style="background:black;"></div>
</div>
<div class="main" style="display:none;" id="chat-new">
<div style="width:100%;height:44px;" class="bd-b">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="10"></td>
<td height="48"><input name="touser" id="touser" placeholder="输入对方用户名" onblur="window.scrollTo(0,0);" style="width:100%;height:28px;line-height:28px;border:none;padding:0;margin:0;font-size:16px;"/></td>
<td width="68" onclick="Nchat();"><div style="width:48px;height:28px;line-height:28px;margin-left:10px;background:#007AFF;border-radius:3px;text-align:center;color:#FFFFFF;font-size:16px;">交谈</div></td>
</tr>
</table>
</div>
</div>
<style type="text/css">
.list-chat {height:60px;}
.list-chat li {color:#999999;}
.list-chat strong {color:#333333;}
.list-chat span {float:right;color:#908E9B;}
.list-chat em {float:right;color:#FFFFFF;font-style:normal;background:#FF0000;border-radius:50%;color:#FFFFFF;font-size:10px;display:block;height:16px;line-height:16px;padding:0 6px;}
.list-spin {height:300px;background:#FFFFFF url('static/img/spinner.gif') no-repeat center center;background-size:16px 16px;}
</style>
<div id="chat-list"><div class="list-spin" onclick="window.location.reload();"></div></div>
<script type="text/javascript">
function Nchat() {
if($('#chat-new').css('display') == 'none') {
$('#chat-new').show();
} else {
var len;
len = $('#touser').val().length;
if(len < 3) {
Dtoast('请输入对方用户名');
return false;
}
$('#chat-new').hide();
Go('chat.php?touser='+$('#touser').val());
}
}
function Lchat() {
$('#chat-list').load('chat.php?action=list', function() {
$('#chat-list div').on('tap', function(event) {
$(this).css('background-color', '#F6F6F6');
});
$('#chat-list div').on('mouseout', function(event) {
$(this).css('background-color', '#FFFFFF');
});
});
}
$(document).on('pageinit', function(event) {
Lchat();
setInterval(function() {
Lchat();
}, 10000);
});
</script>
<?php } else { ?>
<style type="text/css">
#chat {padding:10px 0;overflow:auto;}
#chat table {margin-top:10px;}
#chat img {max-width:98%;height:auto;}
.chat-date {text-align:center;padding:10px 0 0 0;font-size:10px;color:#666666;}
.chat_msg0 {background:#89C5E8;padding:10px;border-radius:4px;font-size:16px;display:inline-block;}
.chat_arr0 {width:8px;background:url('static/img/chat-arr0.png') no-repeat 0 16px;background-size:8px 8px;}
.chat_msg1 {background:#FFFFFF;padding:10px;border-radius:4px;font-size:16px;display:inline-block;float:right;}
.chat_arr1 {width:8px;background:url('static/img/chat-arr1.png') no-repeat 0 16px;background-size:8px 8px;}
.chat-spin {height:300px;background:#FFFFFF url('static/img/spinner.gif') no-repeat center center;background-size:16px 16px;}
</style>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback('chat.php');" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title"><?php echo $user['username'];?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;index.php?moduleid=4&username=<?php echo $user['username'];?>&action=introduce&#34;><span>对方资料</span></a>|<a href=&#34;chat.php&#34; data-direction=&#34;reverse&#34;><span>交谈列表</span></a>|<a href=&#34;javascript:window.location.reload();&#34;><span>重新加载</span></a>', '取消');"><img src="static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div id="chat"><div class="chat-spin" onclick="window.location.reload();"></div></div>
<div class="foot-bar-fix"></div>
<div class="foot-bar" id="chat_inp">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="10"></td>
<td height="48"><div class="bd-t bd-r bd-b bd-l" style="height:28px;padding:0 4px;background:#FFFFFF;"><textarea name="word" id="word" placeholder="输入对话内容" style="width:100%;height:28px;line-height:28px;padding:0;font-size:16px;border:none;outline:none;"></textarea></div></td>
<td width="58" onmousedown="chat_send();" id="send_btn"><div style="width:48px;height:28px;line-height:28px;margin-left:10px;background:#007AFF;border-radius:3px;text-align:center;color:#FFFFFF;font-size:16px;">发送</div></td>
<td width="58" style="display:none;" id="send_ret"><div style="width:48px;height:28px;line-height:28px;margin-left:10px;text-align:center;color:#007AFF;font-size:16px;">取消</div></td>
<td width="10"></td>
</tr>
</table>
</div>
<script type="text/javascript">
var chat_id = '<?php echo $chat_id;?>';
var chat_poll = <?php echo $chat_poll;?>*1000;
var chat_maxlen = <?php echo $MOD['chat_maxlen'];?>;
var chat_mintime = <?php echo $MOD['chat_mintime'];?>;
var chat_type = <?php echo $type;?>;
var chat_last = <?php echo $DT_TIME;?>;
var chat_time = 0;
function unixtime(){return Math.round(new Date().getTime()/1000);}
function chat_load(d){
$.post('chat.php', 'action=load&chatlast='+chat_last+'&chatid='+chat_id+'&first='+(d ? 1 : 0), function(data) {
if(data) {
eval("var chat_json="+data);
chat_last=chat_json.chat_last;
chat_msg=chat_json.chat_msg;
msglen=chat_msg.length;
for(var i=0;i<msglen;i++){
msghtm = '';
if(chat_msg[i].date) msghtm += '<div class="chat-date"><span>'+chat_msg[i].date+'</span></div>';
msghtm += '<table cellpadding="0" cellspacing="0" width="100%">';
msghtm += '<tr>';
if(chat_msg[i].self == 1) {
msghtm += '<td width="40"></td>';
msghtm += '<td valign="top"><div class="chat_msg1">'+chat_msg[i].word+'</div></td>';
msghtm += '<td class="chat_arr1"></td>';
msghtm += '<td width="60" valign="top" align="center"><img src="<?php echo useravatar($_username);?>" width="40" height="40"/></td>';
} else {
msghtm += '<td width="60" valign="top" align="center"><img src="<?php echo useravatar($user['username']);?>" width="40" height="40"/></td>';
msghtm += '<td class="chat_arr0"></td>';
msghtm += '<td valign="top"><div class="chat_msg0">'+chat_msg[i].word+'</div></td>';
msghtm += '<td width="40"></td>';
}
msghtm += '</tr>';
msghtm += '</table>';
$('#chat').append(msghtm);
}
if(msglen) $('#chat').animate({scrollTop:$('#chat')[0].scrollHeight}, 500);
}
});
}
function chat_send(){
var chat_word = $.trim($('#word').val());
var chat_len = chat_word.length;
if(chat_len < 1) {
Dtoast('请输入对话内容');
return;
}
if(chat_len > chat_maxlen) {
Dtoast('最多输入'+chat_maxlen+'字，当前已输入'+chat_len+'字');
return;
}
if(chat_mintime && (unixtime() -chat_time < chat_mintime)){
Dtoast('发送速度过快，请稍后再发');
return;
}
chat_time = unixtime();
$.post('chat.php', 'action=send&chatid='+chat_id+'&font_s=&font_c=&font_b=&font_i=&font_u=&word='+encodeURIComponent(chat_word), function(data) {
if(data == 'ok') {
$('#word').val('');
//chat_load();
} else if(data == 'max') {
Dtoast('发送内容过长');
} else {
Dtoast('发送失败，请重试');
}
});
}
//$(document).ready(function() {
$(document).on('pageinit', function(event) {
var wh = $(window).height();
$('#chat').height(wh - 116);
<?php if($DT_MOB['os']=='ios') { ?>
if(window.screen.width > 320) {
$('.head-bar').css('position', 'static');
$('.foot-bar').css('position', 'static');
$('.head-bar-fix').hide();
$('.foot-bar-fix').hide();
}
$('#word').attr('placeholder', '输入对话内容，按换行键发送');
$('#word').focus(function(e){
$('.head-bar-fix').height(96);
}).blur(function(e){
$('.head-bar-fix').height(48);
$('html, body').animate({scrollTop:0}, 0);
$('#chat').animate({scrollTop:$('#chat')[0].scrollHeight}, 0);
});
<?php } ?>
<?php if($DT_MOB['os']=='android') { ?>
$('#word').attr('placeholder', '输入对话内容，按换行键发送');
$('#word').focus(function(e){
$('#send_btn').hide();
$('#send_ret').show();
$('#chat_inp').css('top','-1px');
$('#chat').height(wh/2 - 48);
$('#chat').animate({scrollTop:$('#chat')[0].scrollHeight}, 0);
}).blur(function(e){
$('#send_ret').hide();
$('#send_btn').show();
$('#chat_inp').css({'top':(wh - 48)+'px','border-bottom':'none'});
$('#chat').height(wh - 116);
$('#chat').animate({scrollTop:$('#chat')[0].scrollHeight}, 0);
});
<?php } ?>
$('#chat').html('');
chat_last=0;
chat_load(1);
setInterval(function() {
chat_load();
}, chat_poll);
$('#word').keyup(function(e){if(e.keyCode==13)chat_send();})
});
</script>
<?php } ?>
<?php include template('footer', 'mobile');?>