<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<div id="head-bar">
<div class="head-bar">
<?php if($action=='send') { ?>
<div class="head-bar-left">
<a href="javascript:Dback('message.php');" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<?php } else if($action=='show') { ?>
<div class="head-bar-back">
<a href="javascript:Dback('message.php');" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<?php } else { ?>
<div class="head-bar-back">
<?php if($kw) { ?>
<a href="message.php" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
<?php } else { ?>
<a href="my.php" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>我的</span></a>
<?php } ?>
</div>
<?php } ?>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<?php if($action=='send') { ?>
<a href="javascript:Dback('message.php');" data-direction="reverse"><span>取消</span></a>
<?php } else if($action=='show') { ?>
<a href="javascript:Message_action();"><img src="static/img/icon-action.png" width="24" height="24"/></a>
<?php } else { ?>
<a href="javascript:Dsheet('<a href=&#34;message.php?action=send&#34;><span>发送消息</span></a>|<a href=&#34;search.php?action=message&#34;><span>消息搜索</span></a>', '取消');"><img src="static/img/icon-action.png" width="24" height="24"/></a>
<?php } ?>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($action=='send') { ?>
<div class="main">
<div style="padding:0 0 0 16px;">
<form action="message.php" method="post" id="form-message">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="typeid" value="<?php echo $typeid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="ok" value="1"/>
<div style="width:100%;height:44px;" class="bd-b"><input type="text" name="touser" id="touser" value="<?php echo $touser;?>" placeholder="收件人:" onblur="window.scrollTo(0,0);" style="width:98%;height:24px;line-height:24px;border:none;padding:0;margin:10px 0 0 0;font-size:16px;"/></div>
<div style="width:100%;height:44px;" class="bd-b"><input type="text" name="title" id="title" value="<?php echo $title;?>" placeholder="主题:" onblur="window.scrollTo(0,0);" style="width:98%;height:24px;line-height:24px;border:none;padding:0;margin:10px 0 0 0;font-size:16px;"/></div>
<div style="width:100%;height:110px;"><textarea name="content" id="content" placeholder="正文" onblur="window.scrollTo(0,0);" style="width:98%;height:100px;line-height:24px;border:none;padding:0;margin:10px 0 0 0;font-size:16px;"><?php echo $content;?></textarea></div>
</form>
</div>
</div>
<div class="main" style="padding:10px;" onclick="Dsend();">
<div class="btn-blue">发 送</div>
</div>
<script type="text/javascript">
function Dsend() {
var len;
len = Dd('touser').value.length;
if(len < 2) {
Dtoast('请填写收件人');
return false;
}
len = Dd('title').value.length;
if(len < 5) {
Dtoast('主题最少个5字，已填写'+len+'个字');
return false;
}
len = Dd('content').value.length;
if(len < 5) {
Dtoast('正文最少个5字，已填写'+len+'个字');
return false;
}
if(len > 5000) {
Dtoast('正文最多个5000字，已填写'+len+'个字');
return false;
}
Dd('form-message').submit();
}
</script>
<?php } else if($action=='show') { ?>
<div class="main">
<div class="title"><strong><?php echo $title;?></strong></div>
<div class="info">
<?php echo $adddate;?>&nbsp;&nbsp;
<?php if($fromuser) { ?>发信人:<a href="index.php?moduleid=4&username=<?php echo $fromuser;?>" class="b"><?php echo $fromuser;?></a>&nbsp;&nbsp;<?php } ?>
</div>
<div class="content">
<?php echo $content;?>
</div>
</div>
<script type="text/javascript">
function Message_action() {
Dsheet('<a href="javascript:Message_delete();"><span>删除</span></a><?php if($fromuser) { ?>|<a href="message.php?action=send&touser=<?php echo $fromuser;?>&title=<?php echo encrypt('RE:'.$title, DT_KEY.'SEND');?>"><span>回复</span></a><?php } ?>
', '取消');
}
function Message_delete() {
Dsheet('<a href="message.php?action=delete&itemid=<?php echo $itemid;?>"><span style="color:red;">删除消息</span></a>', '取消', '确定要删除此消息吗？');
}
</script>
<?php } else { ?>
<?php if($lists) { ?>
<style type="text/css">
.list-msg {font-size:16px;}
.list-msg li {height:68px;padding:0 16px 0 30px;overflow:hidden;border-bottom:#D9D9D9 1px solid;background:#FFFFFF url('stitic/img/list-set.png') no-repeat right center;background-size:23px 13px;}
.list-msg div {width:100%;height:44px;line-height:44px;overflow:hidden;}
.list-msg p {width:100%;height:24px;margin:0;overflow:hidden;display:block;color:#6D6D72;font-size:13px;}
.list-msg a {display:block;width:100%;height:44px;}
.list-msg span {float:right;color:#6D6D72;padding-right:10px;}
.list-msg em {position:absolute;z-index:8;display:block;width:8px;height:8px;background:#007AFF;border:1px solid #007AFF;border-radius:50%;margin:17px 0 0 -20px;}
</style>
<ul class="list-msg">
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<li><?php if(!$v['isread']) { ?><em></em><?php } ?>
<div><a href="message.php?action=show&itemid=<?php echo $v['itemid'];?>"><?php if(!$v['isread']) { ?><strong><?php } ?>
<?php echo $v['title'];?><?php if(!$v['isread']) { ?></strong><?php } ?>
</a></div>
<p><span><?php echo $v['adddate'];?></span><?php if($v['fromuser']) { ?><?php echo $v['fromuser'];?><?php } else { ?>系统信使<?php } ?>
</p>
</li>
<?php } } ?>
</ul>
<?php } else { ?>
<div class="main">
<div class="content">
<br/><center><?php if($_userid) { ?>暂无消息<?php } else { ?><a href="login.php?forward=message.php" data-transition="slideup">按此登录或注册</a><?php } ?>
</center><br/>
</div>
</div>
<?php } ?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer', 'mobile');?>