<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<h2><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></h2>
<span class="">
<?php echo friend_date($t['addtime']);?></span>
</li>
<?php } } ?>