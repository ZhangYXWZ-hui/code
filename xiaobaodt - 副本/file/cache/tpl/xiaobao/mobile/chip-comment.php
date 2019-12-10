<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(in_array($moduleid, explode(',', $EXT['comment_module']))) { ?>
<div class="foot-bar-fix"></div>
<div class="foot-bar">
<div class="foot-comment">
<div class="bd-t bd-r bd-b bd-l" onclick="Go('comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');">发表评论</div>
<a href="comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>" class="b" id="comment-count">0评</a>
</div>
</div>
<script type="text/javascript">
$(document).on('pageinit', function(event) {
$.get('comment.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>&action=count', function(data) {
data = parseInt(data);
if(!data) data = 0;
$('#comment-count').html(data+'评');
});
});
</script>
<?php } ?>
