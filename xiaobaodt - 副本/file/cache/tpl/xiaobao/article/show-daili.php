<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/list");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template('header');?> 
<div class="bg mt">
<div class="main ">
    
<a href="<?php echo $MODULE['1']['linkurl'];?>" class="glide_1 glide">小宝招商</a> &gt; <a href="<?php echo $MOD['linkurl'];?>" class="glide_2 glide"><?php echo $MOD['name'];?></a> &gt;<span class="glide_3 glide"><?php echo $MOD['name'];?>详情</span> 
   
    <div class="part" >
    <h1 class="cuti uk-margin-bottom-remove"><?php echo $title;?></h1>
        <ul class="part_1 uk-padding-remove">
        <li class="qian">渠道类型：<?php echo get_qudao($qudao);?></li>
        <li class="qian">所在地区：<?php echo area_pos($areaid, ' ');?></li>
        <li class="qian">所属行业：<?php echo cat_pass($catid, 'catname',1);?>&gt;<?php echo cat_pass($catid, 'catname');?></li>
        <li class="qian">成立时间：<?php echo $starttime;?></li>
        </ul>
            <div class="uk-clearfix"></div>
            <h2 class=" part_2 uk-margin-bottom-remove cuti3" ><span class="xian"></span>联系方式</h2>

            <div class="uk-width-1-2 part-2_1" >

            <div class="uk-grid uk-grid-collapse">
                <div class=" uk-width-1-2">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="qian uk-width-2-5 distance" >
                            联系人
                            </div>
                            <div class="cuti2 uk-width-3-5 distance">
                            <?php if($_groupid == 7) { ?><?php echo $lianxiren;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class=" uk-width-1-2">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="qian uk-width-2-5 distance">
                            办公电话
                            </div>
                            <div class="cuti2 uk-width-3-5 distance" >
                            <?php if($_groupid == 7) { ?><?php echo $tel;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class=" uk-width-1-2">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="qian uk-width-2-5 distance" >
                            联系电话
                            </div>
                            <div class="cuti2 uk-width-3-5 distance">
                            <?php if($_groupid == 7) { ?><?php echo $mobiles;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class=" uk-width-1-2">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="qian uk-width-2-5 distance">
                            传真号码
                            </div>
                            <div class="cuti2 distance uk-width-3-5 " >
                            <?php if($_groupid == 7) { ?><?php echo $chuanzhen;?><?php } else { ?><a href="#modal" data-uk-modal="{center:true}">(VIP查看)</a><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <h2 class="uk-margin-bottom-remove titl cuti3"><span  class="xian"></span>公司简介</h2>
        <p class="uk-margin-bottom-remove part-2_1" ><?php echo $introduce;?></p>
        
    </div>
     <div class="part_3" >
    
    <h2 class="uk-margin-bottom-remove cuti3" ><span class="xian"></span>经营信息</h2>
        <div class="uk-grid uk-grid-collapse part-2_1" >
        <div class=" qian1 uk-width-1-4 distance1">
            年度营业额
            </div>
            
            <div class=" qian1 uk-width-1-4 distance1" >
            流动资金
            </div>
            
            <div class=" qian1 uk-width-1-4 distance1">
            代理品牌数
            </div>
            
            <div class=" qian1 uk-width-1-4 distance1">
            销售人员
            </div>
            
            <div class=" cuti uk-width-1-4 distance2">
            <?php echo $yearyye;?>万
            </div>
            
            <div class=" cuti uk-width-1-4 distance2" >
            <?php echo $ldzj;?>万
            </div>
            
            <div class=" cuti uk-width-1-4 distance2" >
            <?php echo $pps;?>个
            </div>
            
            <div class=" cuti uk-width-1-4 distance2" >
            <?php echo $xiaoshou;?>个
            </div>
            
                  <div class=" qian1 uk-width-1-4 distance1">
            月均销售额
            </div>
            
            <div class=" qian1 uk-width-1-4 distance1">
            仓储面积
            </div>
            
            <div class=" qian1 uk-width-1-4 distance1">
            物流车辆
            </div>
            
            <div class=" qian1 uk-width-1-4 distance1">
            网点数量
            </div>
            
            <div class=" cuti uk-width-1-4 distance2">
            <?php echo $monthmoney;?>万
            </div>
            
            <div class=" cuti uk-width-1-4 distance2">
            <?php echo $cangchu;?>㎡
            </div>
            
            <div class=" cuti uk-width-1-4 distance2" >
            <?php echo $wlcl;?>辆
            </div>
            
            <div class=" cuti uk-width-1-4 distance2">
            <?php echo $wdsl;?>个
            </div>
        </div>
        
        <div class="underline"></div>
        <p class="cuti3 mt10"><span  class="spac">仓库地址:</span><?php echo $ckdz;?></p>
        <p class="cuti3 mt10"><span  class="spac">发货地址:</span><?php echo $fhdz;?></p>
        
    </div>
    </div>
 </div>
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
