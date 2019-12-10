<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<title><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
<?php echo $DT['sitename'];?></title>
<link rel="stylesheet" type="text/css" href="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/style.css" />
<style type="text/css">
#msgbox{z-index:5;position:absolute;background:#333333;border-radius:5px;top:100px;left:40%;color:#FFFFFF;padding:15px;font-size:14px;letter-spacing:2px;opacity:0.9;filter:alpha(opacity=90);}
</style>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/admin.js"></script>
</head>
<body>
<div id="msgbox" style="display:none;"></div>
<?php echo dmsg();?>