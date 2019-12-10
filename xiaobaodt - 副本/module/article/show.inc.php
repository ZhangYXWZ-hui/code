<?php 
defined('IN_DESTOON') or exit('Access Denied');
$itemid or dheader($MOD['linkurl']);
if(!check_group($_groupid, $MOD['group_show'])) include load('403.inc');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid");
if($item && $item['status'] > 2) {
	if($item['islink']) dheader($item['linkurl']);
	if($MOD['show_html'] && is_file(DT_ROOT.'/'.$MOD['moduledir'].'/'.$item['linkurl'])) d301($MOD['linkurl'].$item['linkurl']);
	extract($item);
} else {
	include load('404.inc');
}
$maincat = get_maincat($child ? $catid : $parentid, $moduleid);
$CAT = get_cat($catid);
if(!check_group($_groupid, $CAT['group_show'])) include load('403.inc');
$content_table = content_table($moduleid, $itemid, $MOD['split'], $table_data);
$t = $db->get_one("SELECT content FROM {$content_table} WHERE itemid=$itemid");
$content = $t['content'];
//if($lazy) $content = img_lazy($content);
$CP = $MOD['cat_property'] && $CAT['property'];
if($CP) {
	require DT_ROOT.'/include/property.func.php';
	$options = property_option($catid);
	$values = property_value($moduleid, $itemid);
}
$adddate = timetodate($addtime, 3);
$editdate = timetodate($edittime, 3);
if($voteid) $voteid = explode(' ', $voteid);
if($fromurl) $fromurl = fix_link($fromurl);
$linkurl = $MOD['linkurl'].$linkurl;
$titles = array();
if($subtitle) {
	$titles = explode("\n", $subtitle);
	$titles = array_map('trim', $titles);
}
$subtitle = isset($titles[$page-1]) ? $titles[$page-1] : '';
$keytags = $tag ? explode(' ', $tag) : array();
/***新增TAG**/
	$keyresult = $db->query("SELECT tag FROM {$table} WHERE STATUS =3 ORDER BY ".$MOD['order']." LIMIT {$offset},{$pagesize}");

	while($r = $db->fetch_array($keyresult)) {
		if($r["tag"]){
			$ktags = explode(" ",$r["tag"]);
			if(is_array($ktags)){
				foreach($ktags as $v){
					$keytags[] = $v;
				}
			}else{
				$keytags[] = $r["tag"];
			}
		}
	}		
	$db->free_result($keyresult);
	
$update = '';
$fee = get_fee($item['fee'], $MOD['fee_view']);

if($fee) {	
	$user_status = 4;
	//$destoon_task = "moduleid=$moduleid&html=show&itemid=$itemid&page=$page";
	$description = get_description($content, $MOD['pre_view']);
	/**
	$item = $db->get_one("SELECT * FROM {$db->pre}finance_credit WHERE username = '{$_username}' and ids=$itemid");	
	if(!$item){
		credit_add($_username, -$fee);
		credit_record($_username, -$fee, 'system', $MOD['name'].iconv('GB2312','UTF-8','联系方式查看'), 'ID:'.$itemid,$itemid);
	}
	**/
} else {
	$user_status = 3;
}

$pages = '';
$subtitles = count($titles);
$total = 1;
if(strpos($content, '<hr class="de-pagebreak" />') !== false) {
	$content = explode('<hr class="de-pagebreak" />', $content);
	$total = count($content);
	$pages = pages($total, $page, 1, $MOD['linkurl'].itemurl($item, '{destoon_page}'));
	if($pages) $pages = substr($pages, 0, strpos($pages, '<cite>'));
	$content = isset($content[$page-1]) ? $content[$page-1] : '';
	if($total < $subtitles) $subtitles = $total;
}

if($page > $total) include load('404.inc');
if($MOD['keylink']) $content = keylink($content, $moduleid);
include DT_ROOT.'/include/update.inc.php';
$seo_file = 'show';
include DT_ROOT.'/include/seo.inc.php';
if($EXT['mobile_enable']) $head_mobile = $EXT['mobile_url'].mobileurl($moduleid, 0, $itemid, $page);
if($subtitle) $seo_title = $subtitle.$seo_delimiter.$seo_title;
$template = 'show';
if($MOD['template_show']) $template = $MOD['template_show'];
if($CAT['show_template']) $template = $CAT['show_template'];
if($item['template']) $template = $item['template'];
include template($template, $module);
?>