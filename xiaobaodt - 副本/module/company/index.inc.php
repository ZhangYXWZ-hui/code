<?php
defined('IN_DESTOON') or exit('Access Denied');
require DT_ROOT.'/module/'.$module.'/common.inc.php';
$username = $domain = '';

if(isset($homepage) && check_name($homepage)) {
	$username = $homepage;
} else {
	$host = get_env('host');
	if(substr($host, 0, 4) == 'www.') {
		$whost = $host;
		$host = substr($host, 4);
	} else {
		$whost = $host;
	}
	if($host && strpos($MODULE[4]['linkurl'], $host) === false) {
		if(substr($host, -strlen($CFG['com_domain'])) == $CFG['com_domain']) {
			$www = substr($host, 0, -strlen($CFG['com_domain']));
			if(check_name($www)) {
				$username = $homepage = $www;
			} else {
				$head_title = $L['not_company'];
				if($DT_BOT) dhttp(404, $DT_BOT);
				include template('com-notfound', 'message');
				exit;
			}
		} else {
			if($whost == $host) {//301 xxx.com to www.xxx.com
				$w3 = 'www.'.$host;
				$c = $db->get_one("SELECT userid FROM {$DT_PRE}company WHERE domain='$w3'");
				if($c) d301('http://'.$w3);
			}
			$c = $db->get_one("SELECT username,domain FROM {$DT_PRE}company WHERE domain='$whost'".($host == $whost ? '' : " OR domain='$host'"), 'CACHE');
			if($c) {
				$username = $homepage = $c['username'];
				$domain = $c['domain'];
			}
		}
	}
}
if($username) {
	include DT_ROOT.'/module/'.$module.'/init.inc.php';
} else {
//	if(strpos($DT_URL, $MOD['linkurl']) === false) dhttp(404);
	if($DT['safe_domain']) {
		$safe_domain = explode('|', $DT['safe_domain']);
		$pass_domain = false;
		foreach($safe_domain as $v) {
			if(strpos($DT_URL, $v) !== false) { $pass_domain = true; break; }
		}
		$pass_domain or dhttp(404);
	}
	if(!check_group($_groupid, $MOD['group_index'])) include load('403.inc');
	if($MOD['index_html']) {	
		$html_file = DT_CACHE.'/htm/company.htm';
		if(!is_file($html_file)) tohtml('index', $module);
		if(is_file($html_file)) exit(include($html_file));
	}
	$maincat = get_maincat($child ? $catid : $parentid, $moduleid);
	$seo_file = 'index';
	include DT_ROOT.'/include/seo.inc.php';
	if($page == 1) $head_canonical = $MOD['linkurl'];
	if($EXT['mobile_enable']) $head_mobile = $EXT['mobile_url'].mobileurl($moduleid, 0, 0, $page);
	$destoon_task = "moduleid=$moduleid&html=index";
	if($moduleid){
		$maincat = get_maincat($child ? $catid : $parentid, $moduleid);
		
		$condition = 'groupid>5';
		foreach($maincat as $k=>$v){
			if($k==0){
				$catidwhere .= "catids like '%,".$v["catid"].",%'";
			}else{
				$catidwhere .= " OR catids like '%,".$v["catid"].",%'";
			}
		}
		$condition .= " AND (".$catidwhere.")";
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
				//$items = $CAT['item'];
				$items = $db->count($table, $condition, $CFG['db_expires']);
			}
		}
		$pagesize = $MOD['pagesize'];
		$offset = ($page-1)*$pagesize;
		$pages = listpages($CAT, $items, $page, $pagesize);
		$tags = $_tags = $ids = array();
		if($items) {
			$result = $db->query("SELECT ".$MOD['fields']." FROM {$table} WHERE {$condition} ORDER BY ".$MOD['order']." LIMIT {$offset},{$pagesize}", ($CFG['db_expires'] && $page == 1) ? 'CACHE' : '', $CFG['db_expires']);
			while($r = $db->fetch_array($result)) {
				if($lazy && isset($r['thumb']) && $r['thumb']) $r['thumb'] =$r['thumb'];
				$tags[] = $r;
			}
		}
		$showpage = 1;
	}
	include template('index', $module);
}
?>
