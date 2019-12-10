<?php
defined('IN_DESTOON') or exit('Access Denied');
/***
if($page < 1 || $page > $total) $page = 1;
$demo_url = str_replace(array('%7B', '%7D'), array('{', '}'), $demo_url);
$pages .= lang($L['curr_page'], array($items, $page, $total)).'&nbsp;&nbsp;';
$url = $home_url;
$pages .= '<a href="'.$url.'">&nbsp;'.$L['home_page'].'&nbsp;</a> ';
$_page = $page >= $total ? 1 : $page + 1;
$url = $_page == 1 ? $home_url : str_replace('{destoon_page}', $_page, $demo_url);
$pages .= '<a href="'.$url.'">&nbsp;'.$L['next_page'].'&nbsp;</a><input type="hidden" id="des'.'toon_next" value="'.$url.'"/> ';
$_page = $page <= 1 ? $total : ($page - 1);
$url = $_page == 1 ? $home_url : str_replace('{destoon_page}', $_page, $demo_url);
$pages .= '<input type="hidden" id="des'.'toon_previous" value="'.$url.'"/><a href="'.$url.'">&nbsp;'.$L['prev_page'].'&nbsp;</a> ';
$url = $total == 1 ? $home_url : str_replace('{destoon_page}', $total, $demo_url);
$pages .= '<a href="'.$url.'">&nbsp;'.$L['last_page'].'&nbsp;</a> ';
$pages .= '<cite></cite><input type="text" class="pages_inp" id="destoon_pageno" value="'.$page.'" onkeydown="if(event.keyCode==13 && this.value) {window.location.href=\''.$demo_url.'\'.replace(/\\{destoon_page\\}/, this.value);return false;}"> <input type="button" class="pages_btn" value="GO" onclick="if(Dd(\'destoon_pageno\').value>0)window.location.href=\''.$demo_url.'\'.replace(/\\{destoon_page\\}/, Dd(\'destoon_pageno\').value);"/>';
**/
$_page = $page <= 1 ? $total : ($page - 1);
$demo_url = str_replace(array('%7B', '%7D'), array('{', '}'), $demo_url);
$url = $_page == 1 ? $home_url : str_replace('{destoon_page}', $_page, $demo_url);

//$pages .= '<input type="hidden" id="des'.'toon_previous" value="'.$url.'"/><a href="'.$url.'">&nbsp;&#171;'.$L['prev_page'].'&nbsp;</a> ';
if($total >= 1) {
	$_page = 1;
	$url = $home_url;
	$pages .= $page == $_page ? '<li class="active"><a href="'.$url.'">'.$_page.'</a></li>&nbsp;' : '<li><a href="'.$url.'">'.$_page.'</a></li>&nbsp;';
}
if($total >= 2) {
	$_page = 2;
	$url = str_replace('{destoon_page}', $_page, $demo_url);
	$pages .= $page == $_page ? '<li class="active"><a href="'.$url.'">'.$_page.'</a></li>&nbsp;' : '<li><a href="'.$url.'">'.$_page.'</a></li>&nbsp;';
}
if($total >= 3) {
	$pages .= '&nbsp;&#8230;&nbsp;';
	if($total > 4) {
		if($page <= 2) {
			$min = 3; $max = 3 + $step*2;
		} else if($page >= $total - 1) {
			$min = $total - 2 - $step*2; $max = $total - 2;
		} else {
			$min = $page - $step; $max = $page + $step;
		}
		if($min < 3) $min = 3;
		if($max > $total - 2) $max = $total - 2;
		if($page == 3) while($max < $page + $step*2 && $max < $total - 2) { $max++; }
		if($page == 4) while($max < $page + $step*2 - 1 && $max < $total - 2) { $max++; }
		if($page == $total - 3) while($min > $page - $step*2 + 1 && $min - 1 > 2) { $min--;}
		if($page == $total - 2) while($min > $page - $step*2 && $min - 1 > 2) { $min--; }
		for($_page = $min; $_page <= $max; $_page++) {
			$url = $_page == 1 ? $home_url : str_replace('{destoon_page}', $_page, $demo_url);
			$pages .= $page == $_page ? '<li class="active"><a href="'.$url.'">'.$_page.'</a></li>&nbsp;' : '<li><a href="'.$url.'">'.$_page.'</a></li>&nbsp;';
		}
		$pages .= '&nbsp;&#8230;&nbsp;';
	}
	if($total >= 4) {
		$_page = $total - 1;
		$url = $_page == 1 ? $home_url : str_replace('{destoon_page}', $_page, $demo_url);
		$pages .= $page == $_page ? '<li class="active"><a href="'.$url.'">'.$_page.'</a></li>&nbsp;' : '<li><a href="'.$url.'">'.$_page.'</a></li>&nbsp;';
	}
	if($total >= 3) {
		$_page = $total;
		$url = $_page == 1 ? $home_url : str_replace('{destoon_page}', $_page, $demo_url);
		$pages .= $page == $_page ? '<li class="active"><a href="'.$url.'">'.$_page.'</a></li>&nbsp;' : '<li><a href="'.$url.'">'.$_page.'</a></li>&nbsp;';
	}
}
$_page = $page >= $total ? 1 : $page + 1;
$url = $_page == 1 ? $home_url : str_replace('{destoon_page}', $_page, $demo_url);
$pages .= '<li><a href="'.$url.'">'.$L['next_page'].'</a></li>';
?>