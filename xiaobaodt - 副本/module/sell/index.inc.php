<?php
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
if(!check_group($_groupid, $MOD['group_index'])) include load('403.inc');
$typeid = isset($typeid) ? intval($typeid) : 99;
isset($TYPE[$typeid]) or $typeid = 99;
$dtype = $typeid != 99 ? " AND typeid=$typeid" : '';
$maincat = get_maincat($catid ? $CAT['parentid'] : 0, $moduleid);

$seo_file = 'index';
include DT_ROOT.'/include/seo.inc.php';
if($catid) $seo_title = $seo_catname.$seo_title;
if($typeid != 99) $seo_title = $TYPE[$typeid].$seo_delimiter.$seo_title;
if($page == 1) $head_canonical = $MOD['linkurl'];
$destoon_task = "moduleid=$moduleid&html=index";
if($EXT['mobile_enable']) $head_mobile = $EXT['mobile_url'].mobileurl($moduleid, 0, 0, $page);
if($moduleid == 5){	
	
	$maincat = get_maincat($child ? $catid : $parentid, $moduleid);
	foreach($maincat as $k=>$v){
		$cat[$v["catid"]] = get_maincat($v["catid"], $moduleid);
		foreach($cat[$v["catid"]] as $kk=>$vv){
			$cats[] = $vv["catid"];
		}
	}
	$condition = 'status=3';
	$condition .= " AND catid IN (".implode(",",$cats).")";
	
	if($cityid) {
		$areaid = $cityid;
		$ARE = $AREA[$cityid];
		$condition .= $ARE['child'] ? " AND areaid IN (".$ARE['arrchildid'].")" : " AND areaid=$areaid";
		$items = $db->count($table, $condition, $CFG['db_expires']);
	} else {
		if($page == 1) {
			$items = $db->count($table, $condition, $CFG['db_expires']);
		
			if($items != $CAT['item']) {
				$CAT['item'] = $items;
				$db->query("UPDATE {$DT_PRE}category SET item=$items WHERE catid=$catid");
			}
		} else {
			$items = $db->count($table, $condition, $CFG['db_expires']);
		}
	}
	
	$pagesize = $MOD['pagesize'];
	$offset = ($page-1)*$pagesize;
	$pages = listpages($CAT, $items, $page, $pagesize);
	
	$tags = array();
	if($items) {
		
		$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE {$condition} ORDER BY ".$MOD['order']." LIMIT {$offset},{$pagesize}", ($CFG['db_expires'] && $page == 1) ? 'CACHE' : '', $CFG['db_expires']);
		
		while($r = $db->fetch_array($result)) {
			
			$r['adddate'] = timetodate($r['addtime'], 5);
			$r['editdate'] = timetodate($r['edittime'], 5);
			$r['thumb'] = $r['thumb'];
			$r['alt'] = $r['title'];
			$r['title'] = set_style($r['title'], $r['style']);
			if(strpos($r['linkurl'], '://') === false) $r['linkurl'] = $MOD['linkurl'].$r['linkurl'];
			$tags[] = $r;
		}
		
		$db->free_result($result);
		
	}
	$showpage = 1;
	$datetype = 5;
	$cols = 5;
}
include template($MOD['template_index'] ? $MOD['template_index'] : 'index', $module);
?>