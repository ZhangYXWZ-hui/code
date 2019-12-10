<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<li><span <?php if($k < 3 ) { ?>class="hots"<?php } ?>
><?php echo $k+1;?></span>&nbsp;&nbsp;<a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['title'];?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'],26,'...');?></a></li>
<?php } } ?>
