<?php defined('IN_DESTOON') or exit('Access Denied');?>    <!-- footer -->
    <div class="footer uk-margin-large-top">
        <div class="w1180">
            <div class="gywm">
                <h3>新手帮助</h3>
                <ul>
                    <li><a href="/member/register.php">商家参与</a></li>
                    <li><a href="/member/register.php">企业参与</a></li>
                     <!--<li><a href="/about/about.html"></a></li>-->
                </ul>
            </div>    
            <div class="gywm">
                <h3>兼职代理</h3>
                <ul>
                   <!--  <li><a href="<?php echo $MODULE['28']['linkurl'];?>">找产品</a></li>-->
<li><a href="/sell/">找产品</a></li>    
                    <li><a href="/job/">找兼职</a></li>
                    <li><a href="<?php echo $MODULE['21']['linkurl'];?>"></a></li>
                </ul>
            </div> 
            <div class="gywm">
                <h3>厂家服务</h3>
                <ul>
                    <li><a href="http://www.51lick.com/service/investment">招商加盟</a></li>
                    <li><a href="http://www.51lick.com/service/plan">包销策划</a></li>
                </ul>
            </div> 
            <div class="gywm">
                <h3>商务合作</h3>
                <ul>
                    <li><a href="http://www.51lick.com/news/info/1/94">代理合作</a></li>
                    <li><a href="http://www.51lick.com/service/bigdata/">广告服务</a></li>
                   <!--  <li><a <?php if($DT['qq']) { ?>
href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $DT['qq'];?>&site=qq&menu=yes"<?php } ?>
>在线咨询</a></li>-->
                </ul>
            </div> 
            <div class="gywm">
                <h3>关于我们</h3>
                <ul>
                    <li><a href="http://www.51lick.com/about/" rel="nofollow">了解我们</a></li>
                    <li><a href="http://jobs.51job.com/all/co3586149.html" rel="nofollow">加入我们</a></li>
                    <li><a href="http://www.51lick.com/contact" rel="nofollow">联系我们</a></li>
                </ul>
            </div> 
            <div class="weixin">
                <img src="<?php echo $DT['app'];?>" alt="">
                <img src="<?php echo $DT['wechat'];?>" alt="">
            </div>
            <div class="lxwm">
                <h3>服务支持</h3>
                <h3 class="tell"><?php echo $DT['telephone'];?></h3>
                <h3>周一至周日 9:00-18:00 </h3>
                <a 
<?php if($DT['qq']) { ?>
href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $DT['qq'];?>&site=qq&menu=yes"<?php } ?>
 class="uk-button" target="_blank">在线咨询</a>
            </div>
            <div class="uk-clearfix"></div>
            <div class="uk-margin-top uk-hr"></div>
            <div class="cright uk-margin">
                <p>Copyright © 2014-2017 xiaobaodt.com All Rights Reserved. <?php echo $DT['icpno'];?></p>
            </div>
        </div>
    </div>
    <!-- footer end -->
    <!--右侧贴边导航quick_links.js控制-->
    
    <script type="text/javascript" src="<?php echo DT_SKIN;?>/js/jquery.SuperSlide.2.1.1.js"></script>
    <?php if($JS) { ?>
    <?php if(is_array($JS)) { foreach($JS as $js) { ?>
    <script type="text/javascript" src="<?php echo DT_SKIN;?><?php echo $js;?>"></script>
    <?php } } ?>
    <?php } ?>
<script type="text/javascript">
var destoon_member = '';
    var destoon_login  = '';
if(get_cookie('auth')) {
        $.get("<?php echo $MOD['linkurl'];?>ajax.php?action=username",function (data) {
            var user = JSON.parse(data)
            if(user.username){
        destoon_member = '<span>你好，<a href="/member/my.php"><i>'+user.username+'</i></a></span>&nbsp;&nbsp;<span><a href="/member/my.php"><i>管理中心</i></a>&nbsp;&nbsp;<a href="/member/logout.php" ><i>退出</i></a></span>';
                destoon_login  = '<div style="width: 62px;height: 62px;margin: 0 auto;background: url(/api/avatar/show.php?username='+user.username+'}&size=large) center center;background-size: 100% 100%;border-radius: 100%;"></div>'
                               + '<div class="uk-thumbnail-caption">'
                               + '  <h4>Hi，'+user.username+'下午好</h4>'
                               + '</div>'
            }else{
        destoon_member = '<span>你好</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>请<a href="/member/login.php" target="_blank"><i>登录</i></a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?php echo DT_PATH;?>member/register.php" target="_blank"><i>免费注册</i></a></span>&nbsp;&nbsp;&nbsp;&nbsp;';
                destoon_login  = '<img src="/skin/xiaobao/images/icon1100.png" alt="">'
                               + '<div class="uk-thumbnail-caption">'
                               + '  <h4>Hi，下午好</h4>'
                               + '</div>'
                               + '<ul class="uk-grid uk-grid-collapse">'
                               + '  <li class="uk-width-1-2"><a href="/member/login.php" class="btn btn-color1">登录</a></li>'
                               + '  <li class="uk-width-1-2"><a href="/member/register.php" class="btn btn-color2">注册</a></li>'
                               + '</ul>';
            }
            $('#destoon_member').html(destoon_member);
            if($('#destoon_login'))$('#destoon_login').html(destoon_login);
        })
}else{
destoon_member += '<span>你好</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>请<a href="<?php echo DT_PATH;?>member/login.php" target="_blank"><i>登录</i></a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?php echo DT_PATH;?>member/register.php" target="_blank"><i>免费注册</i></a></span>&nbsp;&nbsp;&nbsp;&nbsp;';
        destoon_login  = '<img src="/skin/xiaobao/images/icon1100.png" alt="">'
                    + '<div class="uk-thumbnail-caption">'
                    + '  <h4>Hi，下午好</h4>'
                    + '</div>'
                    + '<ul class="uk-grid uk-grid-collapse">'
                    + '  <li class="uk-width-1-2"><a href="/member/login.php" class="btn btn-color1">登录</a></li>'
                    + '  <li class="uk-width-1-2"><a href="/member/register.php" class="btn btn-color2">注册</a></li>'
                    + '</ul>';
}
$('#destoon_member').html(destoon_member);
    if($('#destoon_login'))$('#destoon_login').html(destoon_login);
</script>
</body>
</html>