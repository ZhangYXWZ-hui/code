<?php
/**
 * 程序开发：dt采集专家
 * 支持论坛：bbs.destoon.cc
 * 采集咨询QQ：346655709
 * 采集软件入库接口 For Destoon
 * 支持POST或GET两种方式发送数据
例如：
 * 返回状态会直接输出，请注意判断
 * 为了系统安全，强烈建议修改spider.php文件名
 */
$verify=1;//是否开启身份验证，1开启0关闭
$auth = '123456'; //验证密钥 最少6位
$spider_status = 3; //信息状态 2为待审核 3为通过 0为通过软件发送
$emaildomain="zgny.com";//用户邮箱域名，采集不到邮箱的时候给用户指定一个邮箱,格式为：username@emaildomain
$prefix='';//用户名前缀，给采集来的用户名前增加字符区分重名的真实会员，可为空
$suffix='';//用户名后缀，给采集来的用户名前增加字符区分重名的真实会员，可为空
$width='80';//缩略图宽度
$height='80';//缩略图宽度
$randskin=0;//企业网站随机模版，1开启，0关闭 需要在后台用户组管理开启企业会员使用模版功能
$debug=1;//调试模式，1开启，0关闭 排查BUG专用,平时请关闭
$logfile='destoon.cclog.txt';//调试日志,在网站根目录下,请保证此文件存在权限为可写.linux为777权限
	
define('DT_ADMIN', true);
require '../common.inc.php';
error_reporting(0);
include $CFG['charset'].'function.php';

