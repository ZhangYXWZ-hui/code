<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<?php if($action=='add' && $itemid==1) { ?><div class="warn">尊敬的用户，为了保证信息的真实有效，请先<strong>缴纳保证金</strong>，缴纳之后即可发布信息</div><?php } ?>
<script type="text/javascript">c(2);</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="action_add"><a href="?action=add"><span>增加资金</span></a></td>
<td class="tab" id="action"><a href="?action=index"><span>保证金记录</span></a></td>
</tr>
</table>
</div>
<?php if($action == 'add') { ?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="num" id="num" value="1"/>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">账户余额</td>
<td class="tr"><span class="f_blue"><?php echo $_money;?></span> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">增资金额</td>
<td class="tr"><img src="<?php echo DT_SKIN;?>image/arrow_l.gif" width="16" height="8" alt="" title="减少" class="c_p" onclick="alter('-')"/><input type="text" value="<?php echo $amount;?>" id="amount" size="10"  style="text-align:center;" readonly/> <img src="<?php echo DT_SKIN;?>image/arrow_r.gif" width="16" height="8" alt="" title="增加" class="c_p" onclick="alter('+')"/></td>
</tr>
<tr id="payword" style="display:none;">
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td class="tr">
<input type="submit" name="submit" value=" 确 定 " class="btn_g"/>
</td>
</tr>
</table>
</form>
<script type="text/javascript">
function alter(t) {
var num = parseInt(Dd('num').value);
if(t == '+') {
num++;
} else {
if(num == 1) return;
num--;
}
Dd('amount').value =  parseFloat(num*<?php echo $MOD['deposit'];?>);
Dd('num').value = num;
}
function check() {
if(Dd('amount').value > <?php echo $_money;?>) {
Go('charge.php?action=pay&reason=deposit|'+Dd('num').value+'&amount='+(Dd('amount').value - <?php echo $_money;?>));
return false;
}
var f,l;
f = 'password';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写支付密码', f);
return false;
}
return true;
}
window.setInterval(
function() {
Dd('amount').value > <?php echo $_money;?> ? Dh('payword') : Ds('payword');
}, 
500);
</script>
<script type="text/javascript">s('deposit');m('action_add');</script>
<?php } else { ?>
<form action="?">
<div class="tt">
日期 <?php echo dcalendar('fromtime', $fromtime);?> 至 <?php echo dcalendar('totime', $totime);?>
&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?action=index');"/>
</div>
</form>
<div class="bd">
<table cellpadding="1" cellspacing="0" class="tb">
<tr>
<th>流水号</th>
<th>金额</th>
<th width="150">日期</th>
<th>操作人</th>
<th>操作原因</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td height="35"><?php echo $v['itemid'];?></td>
<td><?php echo $v['amount'];?></td>
<td><?php echo $v['addtime'];?></td>
<td><?php echo $v['editor'];?></td>
<td><?php echo $v['reason'];?></td>
</tr>
<?php } } ?>
<tr align="center">
<td height="35"><strong>小计</strong></td>
<td class="px11 f_red"><?php echo $amount;?></td>
<td colspan="3"></td>
</tr>
</table>
</div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('deposit');m('action');</script>
<?php } ?>
<?php include template('footer', $module);?>