<?php
defined('IN_DESTOON') or exit('Access Denied');
if(!$_userid) exit;
echo json_encode(array("username"=>$_username));
?>