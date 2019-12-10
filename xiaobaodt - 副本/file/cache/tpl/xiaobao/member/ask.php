<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?action=add"><span>提交新问题</span></a></td>
<td class="tab" id="home"><a href="?action=index"><span>问题及解答</span></a></td>
<?php if($support) { ?>
<td class="tab" id="support"><a href="support.php"><span>客服专员</span></a></td>
<?php } ?>
</tr>
</table>
</div>
<?php if($action == 'add') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl"> <span class="f_red">*</span> 分 类</td>
<td class="tr"><?php echo $type_select;?> <span id="dtypeid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span> 标 题</td>
<td class="tr"><input type="text" size="50" name="title" id="title" value="<?php echo $title;?>"/> [限5-30字之间] <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span> 内 容</td>
<td class="tr">
<textarea name="content" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', 'Simple', '100%', 300);?><br/>[限10-5000字之间] <span id="dcontent" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr"><input type="submit" name="submit" value=" 提 交 " class="btn_g"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('ask');m('add');</script>
<?php } else if($action == 'edit') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<table cellspacing="1" cellpadding="3" class="tb">
<tr>
<td class="tl"> <span class="f_red">*</span> 分 类</td>
<td class="tr"><?php echo $type_select;?> <span id="dtypeid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span> 标 题</td>
<td class="tr"><input type="text" size="50" name="title" id="title" value="<?php echo $title;?>"/> [限5-30字之间] <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> <span class="f_red">*</span> 内 容</td>
<td class="tr"><textarea name="content" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', 'Simple', '100%', 200);?><br/>[限10-5000字之间] <span id="dcontent" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 修 改 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">s('ask');m('home');</script>
<?php } else if($action == 'show') { ?>
<table cellspacing="1" cellpadding="10" class="tb">
<tr>
<td class="tl">问题分类</td>
<td class="tr"><?php echo $TYPE[$typeid]['typename'];?></td>
</tr>
<tr>
<td class="tl">问题标题</td>
<td class="tr f_b"><?php echo $title;?></td>
</tr>
<?php if($qid) { ?>
<tr>
<td class="tl">来源问题</td>
<td class="tr"><a href="?action=show&itemid=<?php echo $qid;?>" class="t">点击查看</a></td>
</tr>
<?php } ?>
<tr>
<td class="tl">问题内容</td>
<td class="tr" style="line-height:180%;"><?php echo $content;?></td>
</tr>
<tr>
<td class="tl">提交时间</td>
<td class="tr"><?php echo $addtime;?></td>
</tr>
<tr>
<td class="tl">受理状态</td>
<td class="tr"><?php echo $dstatus[$status];?></td>
</tr>
<?php if($status > 1) { ?>
<tr>
<td class="tl">问题回复</td>
<td class="tr" style="line-height:180%;background:#FAFAFA;"><?php echo $reply;?></td>
</tr>
<tr>
<td class="tl">受理时间</td>
<td class="tr f_blue"><?php echo $edittime;?></td>
</tr>
<tr>
<td class="tl">受理人</td>
<td class="tr"><?php echo $editor;?></td>
</tr>
<tr>
<td class="tl">我的评分</td>
<td class="tr">
<?php if($star) { ?>
<?php echo $stars[$star];?>
<?php } else { ?>
<form method="post" action="?action=star&itemid=<?php echo $itemid;?>">
<input type="radio" name="star" value="1" id="star_1" onclick="if(confirm('确定评分为不满意吗？')) Go('?action=star&itemid=<?php echo $itemid;?>&star=1');"/><label for="star_1"> 不满意</label>
<input type="radio" name="star" value="2" id="star_2" onclick="if(confirm('确定评分为基本满意吗？')) Go('?action=star&itemid=<?php echo $itemid;?>&star=2');"/><label for="star_2"> 基本满意</label>
<input type="radio" name="star" value="3" id="star_3" onclick="if(confirm('确定评分为非常满意吗？')) Go('?action=star&itemid=<?php echo $itemid;?>&star=3');"/><label for="star_3"> 非常满意</label>
</form>
<?php } ?>
</td>
</tr>
<?php if($star != 3) { ?>
<tr>
<td class="tl"></td>
<td class="tr"><input type="button" value=" 继续提问 " class="btn_g" onclick="Go('?action=add&itemid=<?php echo $itemid;?>');"/></td>
</tr>
<?php } ?>
<?php } ?>
</table>
</form>
<script type="text/javascript">s('ask');m('home');</script>
<?php } else { ?>
<form action="?">
<div class="tt">
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $type_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>
<input type="button" value=" 重 搜 " class="btn" onclick="Go('?action=index');"/>
</div>
</form>
<div class="ls">
<table cellspacing="0" cellpadding="0" class="tb">
<tr>
<th>流水号</th>
<th>状态</th>
<th>分类</th>
<th>标题</th>
<th width="150">添加时间</th>
<th width="150">受理时间</th>
<th>评分</th>
<th width="60">修改</th>
<th width="60">删除</th>
</tr>
<?php if(is_array($asks)) { foreach($asks as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td>&nbsp;<?php echo $v['itemid'];?>&nbsp;</td>
<td>&nbsp;<?php echo $v['dstatus'];?>&nbsp;</td>
<td><a href="?typeid=<?php echo $v['typeid'];?>"><?php echo $v['type'];?></a></td>
<td align="left"><a href="?action=show&itemid=<?php echo $v['itemid'];?>" class="t"><?php echo $v['title'];?></a></td>
<td><?php echo $v['adddate'];?></td>
<td><?php echo $v['editdate'];?></td>
<td><?php echo $v['dstar'];?></td>
<td>
<?php if($v['status'] == 0) { ?><a href="?action=edit&itemid=<?php echo $v['itemid'];?>&forward=<?php echo urlencode($DT_URL);?>"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/edit.png" title="修改" alt=""/></a><?php } else { ?>--<?php } ?>
</td>
<td>
<?php if($v['status'] == 0) { ?><a href="javascript:confirmURI('确定要删除吗？此操作将不可撤销', '?action=delete&itemid=<?php echo $v['itemid'];?>&forward=<?php echo urlencode($DT_URL);?>');"><img width="16" height="16" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/delete.png" title="删除" alt=""/></a><?php } else { ?>--<?php } ?>
</td>
</tr>
<?php } } ?>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('ask');m('home');</script>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<script type="text/javascript">
function check() {
var len;
if(Dd('typeid').value == 0) {
Dmsg('请选择分类', 'typeid');
return false;
}
len = Dd('title').value.length;
if(len < 5 || len > 30) {
Dmsg('标题不能少于5个字多于30个字，当前已输入'+len+'个字', 'title');
return false;
}
len = FCKLen();
if(len < 10 || len > 5000) {
Dmsg('内容不能少于10个字多于5000个字，当前已输入'+len+'个字', 'content');
return false;
}
return true;
}
</script>
<?php } ?>
<?php include template('footer', $module);?>