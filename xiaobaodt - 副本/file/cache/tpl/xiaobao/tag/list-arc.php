<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li>
<div id="" class="img">
<a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><img src="<?php echo $t['thumb'];?>" alt=""></a>
</div>
<div id="" class="text">
<h2><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></h2>
<p><?php echo dsubstr($t['introduce'],160,'...');?></p>
<span class=""><?php echo cat_pass($t['catid'], 'catname');?>    <?php echo timetodate($t['addtime'], $datetype);?></span>
</div>
</li>
<?php } } ?>