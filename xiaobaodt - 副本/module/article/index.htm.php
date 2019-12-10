<?php 
defined('IN_DESTOON') or exit('Access Denied');
$fileroot = DT_ROOT.'/'.$MOD['moduledir'].'/';
$filename = $fileroot.$DT['index'].'.'.$DT['file_ext'];
if(!$MOD['index_html']) {
	if(is_file($filename)) unlink($filename);
	return false;
}
	$maincat = $childcat = get_maincat(0, $moduleid, 1);

	/***ÐÂÔöTAG**/
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

$seo_file = 'index';
include DT_ROOT.'/include/seo.inc.php';
$destoon_task = "moduleid=$moduleid&html=index";
if($EXT['mobile_enable']) $head_mobile = $EXT['mobile_url'].mobileurl($moduleid, 0, 0, $page);
ob_start();
include template($MOD['template_index'] ? $MOD['template_index'] : 'index', $module);
$data = ob_get_contents();
ob_clean();
file_put($filename, $data);
return true;
?>