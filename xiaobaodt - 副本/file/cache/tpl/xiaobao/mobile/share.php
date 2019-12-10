<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'mobile');?>
<style type="text/css">
.qrcode {height:200px;background:#FFFFFF;text-align:center;padding:10px 0;display:none;}
.qrcode div {line-height:20px;font-size:12px;color:#666666;}
.share {height:180px;background:#FFFFFF;text-align:center;padding:10px 0;}
.share li {width:25%;float:left;}
.share img {border-radius:15px;}
.share span {display:block;font-size:12px;padding:2px 0 12px 0;}
</style>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="javascript:Dback('<?php echo $linkurl;?>');" data-direction="reverse"><img src="static/img/icon-back.png" width="24" height="24"/><span>返回</span></a>
</div>
<div class="head-bar-title">分享好友</div>
<div class="head-bar-right">
<a href="channel.php" data-transition="slideup"><span>频道</span></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<div class="qrcode">
<img src="<?php echo DT_PATH;?>api/qrcode.png.php?auth=<?php echo $auth;?>" width="140" height="140"/>
<div></div>
</div>
<div class="share">
<ul>
<li onclick="$('.qrcode').hide();$('.qrcode div').html('请用微信扫一扫上面的二维码打开网址<br/>点右上方的分享按钮，选择发送给朋友<br/><a href=&#34;http://app.destoon.com/scan/&#34; rel=&#34;external&#34; style=&#34;color:#2E7DC6;text-decoration:none;&#34;>如何扫描？</a>');$('.qrcode').slideDown('fast');"><img src="static/img/share-wx.png" width="60" height="60"/><span>微信好友</span></li>
<li onclick="$('.qrcode').hide();$('.qrcode div').html('请用微信扫一扫上面的二维码打开网址<br/>点右上方的分享按钮，选择分享到朋友圈<br/><a href=&#34;http://app.destoon.com/scan/&#34; rel=&#34;external&#34; style=&#34;color:#2E7DC6;text-decoration:none;&#34;>如何扫描？</a>');$('.qrcode').slideDown('fast');"><img src="static/img/share-py.png" width="60" height="60"/><span>微信朋友圈</span></li>
<li onclick="$('.qrcode').hide();$('.qrcode div').html('请用手机QQ扫一扫上面的二维码打开链接<br/>点右上方的分享按钮，选择发送给好友<br/><a href=&#34;http://app.destoon.com/scan/&#34; rel=&#34;external&#34; style=&#34;color:#2E7DC6;text-decoration:none;&#34;>如何扫描？</a>');$('.qrcode').slideDown('fast');"><img src="static/img/share-qq.png" width="60" height="60"/><span>QQ好友</span></li>
<li onclick="$('.qrcode').hide();$('.qrcode div').html('请用手机QQ扫一扫上面的二维码打开链接<br/>点右上方的分享按钮，选择分享到QQ空间<br/><a href=&#34;http://app.destoon.com/scan/&#34; rel=&#34;external&#34; style=&#34;color:#2E7DC6;text-decoration:none;&#34;>如何扫描？</a>');$('.qrcode').slideDown('fast');"><img src="static/img/share-qzone.png" width="60" height="60"/><span>QQ空间</span></li>
<li onclick="$('.qrcode').hide();"><a href="http://www.jiathis.com/send/?webid=tsina&url=<?php echo urlencode($linkurl);?>&title=<?php echo urlencode($item['title']);?>" target="_blank" rel="external"><img src="static/img/share-weibo.png" width="60" height="60"/><span>新浪微博</span></a></li>
<li onclick="$('.qrcode').hide();"><a href="http://www.jiathis.com/send/?webid=tqq&url=<?php echo urlencode($linkurl);?>&title=<?php echo urlencode($item['title']);?>" target="_blank" rel="external"><img src="static/img/share-tqq.png" width="60" height="60"/><span>腾讯微博</span></a></li>
<li onclick="$('.qrcode').hide();"><a href="<?php echo $sms;?>" rel="external"><img src="static/img/share-sms.png" width="60" height="60"/><span>短信</span></a></li>
<li onclick="$('.qrcode').hide();"><a href="mailto:?subject=<?php echo $item['title'];?>&body=<?php echo $linkurl;?>" rel="external"><img src="static/img/share-email.png" width="60" height="60"/><span>邮件</span></a></li>
</ul>
</div>
<?php include template('footer', 'mobile');?>