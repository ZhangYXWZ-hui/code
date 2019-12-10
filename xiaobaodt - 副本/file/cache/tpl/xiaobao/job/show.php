<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/list");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template('header');?>
<div class="bg mt">
<div class="main">
<a href="<?php echo $MODULE['1']['linkurl'];?>" class="glide_1 glide">小宝招商</a> &gt; <a href="<?php echo $MOD['linkurl'];?>" class="glide_2 glide"><?php echo $MOD['name'];?></a> &gt;<span class="glide_3 glide"><?php echo $MOD['name'];?>详情</span> 
    <div class="detail">
    <p class="font_1"><?php echo $title;?></p>
        <div class="line"></div>
        <div  class="space1">
        <div class="uk-grid uk-grid-collapse">
            <div class="uk-width-2-5">
                <h3 class="font_2">行业</h3>
                    <p class="font_3"><?php echo cat_pass($catid, 'catname');?></p>
                </div>
                
                <div class="uk-width-3-5">
                <h3 class="font_2">工作经历</h3>
                    <p class="font_3"><?php echo $gzjl;?></p>
                </div>
                
                <div class="uk-width-2-5 space2">
                <h3 class="font_2">工作职务</h3>
                    <p class="font_3"><?php echo $gzzw;?></p>
                </div>
                
                <div class="uk-width-3-5 space2">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-3-4">
                        <h3 class="font_2">年收入</h3>
                   <p class="font_3"><?php echo $nsr;?>万</p>
                        </div>
                        <div class="uk-width-1-4">
                        <h3 class="font_2">最高学历</h3>
                   <p class="font_3"><?php echo $zgxl;?></p>
                        </div>
                    </div>
                </div>
                
                <div class="uk-width-1-1 space3">
                <h5 ><span class="xian"></span>联系方式</h5>
                </div>
                
                <div class="uk-width-9-12">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-1-2 space4">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-2-5 space5">
                        <p class="font_5">电话</p>
                        </div>
                        <div class="uk-width-3-5 space5">
                        <p  class="font_6"><?php if($_groupid == 7) { ?><?php echo $mobile;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
</p>
                        </div>
                    </div>
                </div>
                
               <div class="uk-width-1-2 space4">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-2-5 space5">
                        <p class="font_5">QQ</p>
                        </div>
                        <div class="uk-width-3-5 space5">
                        <p class="font_6"><?php if($_groupid == 7) { ?><?php echo $qq;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
</p>
                        </div>
                    </div>
                </div>
                
                        <div  class="uk-width-1-2 space4">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-2-5 space6">
                        <p class="font_5">微信</p>
                        </div>
                        <div class="uk-width-3-5 space6">
                        <p class="font_6"><?php if($_groupid == 7) { ?><?php echo $wechat;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
</p>
                        </div>
                    </div>
                </div>
                
               <div class="uk-width-1-2 space4">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-2-5 space6">
                        <p class="font_5">邮箱</p>
                        </div>
                        <div class="uk-width-3-5 space6">
                        <p class="font_6"><?php if($_groupid == 7) { ?><?php echo $email;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
</p>
                        </div>
                    </div>
                </div>
                
                        <div class="uk-width-1-2 space4">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-2-5 space6" >
                        <p class="font_5">所在地区</p>
                        </div>
                        <div class="uk-width-3-5 space6">
                        <p class="font_4"><?php echo area_pos($areaid, ' ');?></p>
                        </div>
                    </div>
                </div>
                
               <div class="uk-width-1-2 space4">
                <div class="uk-grid uk-grid-collapse ">
                    <div class="uk-width-2-5 space6">
                        <p class="font_5">所在地址</p>
                        </div>
                        <div class="uk-width-3-5 space6">
                        <p class="font_4"><?php echo $address;?></p>
                        </div>
                    </div>
                </div>
                    </div>
                    
                </div>
            
            </div>
        </div>
    </div>
</div>
</div>
<div id="" class="clear"></div>
 <!-- 模态对话框 -->
<div id="modal" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-lightbox">
<a href="" class="uk-modal-close uk-close"></a>
<a href="/member/charge.php?action=pay" target="_blank"><img src="/skin/xiaobao/images/pay.jpg" width="352" height="288" alt=""></a>
</div>
</div>
<?php include template('footer');?> 
</body>
</html>
