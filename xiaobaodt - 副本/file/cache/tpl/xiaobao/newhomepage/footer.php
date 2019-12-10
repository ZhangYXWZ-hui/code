<?php defined('IN_DESTOON') or exit('Access Denied');?><!-- footer -->
   <div class="footer uk-margin-large-top">
       <div class="w1180">
       <div class="foot_top">
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
                    <li><a href="<?php echo $MODULE['28']['linkurl'];?>">找产品</a></li>
                    <li><a href="<?php echo $MODULE['28']['linkurl'];?>">找兼职</a></li>
                    <li><a href="<?php echo $MODULE['21']['linkurl'];?>"></a></li>
                </ul>
            </div> 
            <div class="gywm">
                <h3>厂家服务</h3>
                <ul>
                    <li><a href="http://www.51lick.com/service/investment" rel="nofollow">招商加盟</a></li>
                    <li><a href="http://www.51lick.com/service/plan" rel="nofollow">包销策划</a></li>
                </ul>
            </div> 
            <div class="gywm">
                <h3>商务合作</h3>
                <ul>
                    <li><a href="/about/daili.html">代理合作</a></li>
                    <li><a href="/about/guanggao.html">广告服务</a></li>
                   <!--  <li><a <?php if($DT['qq']) { ?>
href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $DT['qq'];?>&site=qq&menu=yes"<?php } ?>
>在线咨询</a></li>-->
                </ul>
            </div> 
            <div class="gywm">
                <h3>关于我们</h3>
                <ul>
                    <li><a href="http://www.51lick.com/about/" rel="nofollow">了解我们</a></li>
                    <li><a href="http://jobs.51job.com/all/co3586149.html#syzw" rel="nofollow">加入我们</a></li>
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
                <p>Copyright © 2014-2017 xiaobaodt.com All Rights Reserved. 公司备案号：<?php echo $DT['icpno'];?></p>
           </div>
       </div>
   </div>
   <!-- footer end -->
</body>
</html>