<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div class="uk-width-2-5" <?php if($i==1) { ?>style="margin-left:-20px"<?php } ?>
>
<div class="uk-text-center uk-position-absolute">
<a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><img src="<?php echo $t['thumb'];?>" alt=""></a>
</div>
<div class="introduce">
<p class="uk-text-fristIndent-desc"><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></p>
</div>
</div>
<?php } } ?>