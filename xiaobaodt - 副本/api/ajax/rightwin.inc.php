<?php
defined('IN_DESTOON') or exit('Access Denied');
isset($locname) or exit;
$curtime = time();

function getDiv($pid,$pagesize,$type,$ext=''){
    global $db,$DT_PRE,$curtime;
    $str = '';
    $rs = $db->query("SELECT p.pid as pid, a.aid as aid, a.image_src as image_src, a.image_url as image_url, a.image_alt as image_alt  FROM {$DT_PRE}ad_place p LEFT JOIN {$DT_PRE}ad a ON p.pid = a.pid WHERE p.pid = $pid and a.status = 3 and ($curtime >= a.fromtime and $curtime <= a.totime) ORDER BY a.listorder asc LIMIT 0,$pagesize");

    while($r = $db->fetch_array($rs)) {
        $str .= "<li><a href=\"{$r[image_url]}\"><img src=\"{$r[image_src]}\" alt=\"{$r[image_alt]}\"/></a></li>";
    }
    if($ext != ''){
        $str .= $ext;
    }
    return $str;
}

if($locname == "xiaobao"){
    // 广告位48 第二个参数是显示几个
    $str = getDiv(48,4,$locname);
}else if($locname == "app"){
    $str = getDiv(51,2,$locname);
}else if($locname == "lianxi"){
    $str = getDiv(52,1,$locname);
}else if($locname == "tell"){
    $str = getDiv(53,1,$locname);
}else if($locname == "mail"){
    $ext = "<li><a href=\"/member/register.php\" class=\"btn\">立即注册</a></li>";
    $str = getDiv(54,3,$locname,$ext);
}

echo json_encode(array("content"=>'<div class="ibar_plugin_content"><ul class="content">'.$str.'</ul></div>'));
exit;


