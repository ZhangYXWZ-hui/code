<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","index");?>
<?php $JS=array("js/quick_links.js","js/index_fun.js","js/base.js");?>
<?php $is_not_index = true;?>
<?php include template("header");?>
    <!-- banner -->
    <div class="banner">
        <div class="w1180">
            <div class="ban-right">
                <div class="login">
                    <div class="uk-thumbnail" id="destoon_login">
                    <?php if($_userid) { ?>
                        <?php $user = userinfo($_username);?>
                     <!--    <img src="/api/avatar/show.php?username=<?php echo $_username;?>&size=large&time=1493443658" alt=""> -->
                        <div style="width: 62px;height: 62px;margin: 0 auto;background: url(/api/avatar/show.php?username=<?php echo $_username;?>&size=large) center center;background-size: 100% 100%;border-radius: 100%;"></div>
                        <div class="uk-thumbnail-caption">
                            <h4>Hi，<?php echo $user['truename'];?>您好</h4>
                        </div>
                    <?php } else { ?>
                        <img src="<?php echo DT_SKIN;?>/images/icon1100.png" alt="">
                        <div class="uk-thumbnail-caption">
                            <h4>Hi，尊敬的客户您好</h4>
                        </div>
                        <ul class="uk-grid uk-grid-collapse">
                            <li class="uk-width-1-2"><a href="/member/login.php" class="btn btn-color1">登录</a></li>
                            <li class="uk-width-1-2"><a href="/member/register.php" class="btn btn-color2">注册</a></li>
                        </ul>
                    <?php } ?>
                    </div>
                    <ul class="tb uk-grid uk-grid-collapse">
                        <li  class="uk-width-1-2">
                            <div class="uk-thumbnail">
                                <img src="<?php echo DT_SKIN;?>/images/icon1101.png" alt="">
                                <h4  class="uk-thumbnail-caption">智能撮合</h4>
                            </div>
                        </li>
                        <li class="uk-width-1-2">
                            <div class="uk-thumbnail">
                                <img src="<?php echo DT_SKIN;?>/images/icon1102.png" alt="">
                                <h4  class="uk-thumbnail-caption">银行监管</h4>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="chp uk-thumbnail">
                    <?php echo ad(67);?>
                </div>
            </div>
            <div class="ban-center">
                <?php echo ad(27);?>
                <ul class="uk-grid uk-grid-collapse uk-text-center">
                    <li class="uk-width-1-3"><?php echo ad(28);?></li>
                    <li class="uk-width-1-3"><?php echo ad(29);?></li>
                    <li class="uk-width-1-3"><?php echo ad(30);?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- main -->
    <div class="main " data-uk-scrollspy>
        <div class="danju w1180">
            <ul class="uk-grid uk-grid-collapse uk-margin-large-top">
                <li class="uk-width-1-7 uk-text-center uk-padding">
                    <img src="<?php echo DT_SKIN;?>/images/icon_17.png" alt="">
                    <h4>更新任务</h4>
                    <h3><?php echo $DT['data_jrcj'];?>个</h3>
                </li>
                <li class="uk-width-1-7 uk-text-center">
                    <img src="<?php echo DT_SKIN;?>/images/icon_19.png" alt="">
                    <h4>新增应标</h4>
                    <h3><?php echo $DT['data_yb'];?>单</h3>                    
                </li>
                <li class="uk-width-1-7 uk-text-center">
                    <img src="<?php echo DT_SKIN;?>/images/icon_21.png" alt="">
                    <h4>新增中标</h4>
                    <h3><?php echo $DT['data_zhb'];?>单</h3>                    
                </li>
                <li class="uk-width-1-7 uk-text-center">
                    <img src="<?php echo DT_SKIN;?>/images/icon_23.png" alt="">
                    <h4>招商企业</h4>
                    <h3><?php echo $DT['data_rzh'];?>家</h3>                    
                </li>
                <li class="uk-width-1-7 uk-text-center">
                    <img src="<?php echo DT_SKIN;?>/images/icon_25.png" alt="">
                    <h4>代理商</h4>
                    <h3><?php echo $DT['data_dls'];?>家</h3>                    
                </li>
                <li class="uk-width-1-7 uk-text-center">
                    <img src="<?php echo DT_SKIN;?>/images/icon_27.png" alt="">
                    <h4>兼职销售</h4>
                    <h3><?php echo $DT['data_jm'];?>人</h3>                    
                </li>
                <li class="uk-width-1-7 uk-text-center">
                    <img src="<?php echo DT_SKIN;?>/images/icon_29.png" alt="">
                    <h4>撮合服务</h4>
                    <h3><?php echo $DT['data_jzh'];?>单</h3>
                </li>
            </ul>
        </div>
        <div class="uk-display-block uk-margin-large-top w1180"><?php echo ad(49);?></div>
        <div class="mypp w1180 uk-margin-large-top" id="mypp">
            <div class="title uk-margin-small-bottom"><h2><?php echo $MODULE['13']['name'];?></h2><a href="<?php echo $MODULE['13']['linkurl'];?>">更多 ></a></div>
            <?php $brand = tag("moduleid=5&condition=level = 4 and status=3&pagesize=1&order=edittime desc&template=null");?>
            <div class="uk-float-left">
<?php if($brand['0']['pinpailogo']) { ?>
<a href="<?php echo userurl($brand['0']['username'], 'file=sell&itemid='.$brand['0']['itemid'], $domain);?>"><img src="<?php echo $brand['0']['pinpailogo'];?>" alt="" class="" width="214" height="313"></a>
<?php } ?>
</div>
            <ul class="uk-float-left uk-grid uk-grid-collapse">
            <?php $tagarr = tag("moduleid=5&condition=level = 3 or level = 5 and status=3&pagesize=10&order=edittime desc&template=null");?>
            <?php if(is_array($tagarr)) { foreach($tagarr as $t) { ?>
                <li class="uk-width-1-5 uk-text-center"><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>"><img src="<?php echo $t['pinpailogo'];?>" alt="" width="190" height="155"></a></li>
            <?php } } ?>
            </ul>
            <div class="uk-clearfix"></div>
        </div>
        <?php echo ad(26);?>
        <?php $cat = get_maincat(0,5,-1,1);?>

<?php if($cat['0']['style'] == '#000000') { ?>
<!--名酒招商开始-->
<div class="mjzs w1180 uk-margin-large-top" id="<?php echo pinyin1($cat['0']['catname']);?>">            
            <div class="title  uk-margin-small-bottom"><h2><?php echo $cat['0']['catname'];?></h2><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $cat['0']['linkurl'];?>">更多 ></a></div>
            <div class="wines">
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(47);?>
                                <ul class="uk-grid uk-grid-collapse">
                                    <?php $catson = get_maincat($cat['0']['catid'],5);?>
                                    <?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
                                    <?php if($i < 8) { ?>
                                    <li class="uk-width-1-2"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
                                    <?php } ?>
                                    <?php } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                                <?php $str = get_cat($cat['0']['catid']);?>
                                <?php $tag = tag("moduleid=5&condition=status=3 and catid in (".$str['arrchildid'].")&order=edittime desc&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],30,'...');?></a></p>
                                        <span class="uk-float-left winConSTred">赏金&nbsp;<?php echo $t['jine'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--名酒招商结束-->
        <?php echo ad(44);?>
<?php } ?>
<?php if($cat['1']['style'] == '#000000') { ?>
<!--粮油调味品开始-->
<div class="mjzs w1180 uk-margin-large-top" id="<?php echo pinyin1($cat['1']['catname']);?>">            
            <div class="title  uk-margin-small-bottom"><h2><?php echo $cat['1']['catname'];?></h2><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $cat['1']['linkurl'];?>">更多 ></a></div>
            <div class="wines">
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(55);?>
                                <ul class="uk-grid uk-grid-collapse">
                                    <?php $catson = get_maincat($cat['1']['catid'],5);?>
                                    <?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
                                    <?php if($i < 8) { ?>
                                    <li class="uk-width-1-2"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
                                    <?php } ?>
                                    <?php } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                                <?php $str = get_cat($cat['1']['catid']);?>
                                <?php $tag = tag("moduleid=5&condition=status=3 and catid in (".$str['arrchildid'].")&order=edittime desc&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],30,'...');?></a></p>
                                        <span class="uk-float-left winConSTred">赏金&nbsp;<?php echo $t['jine'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--粮油调味品结束-->
        <?php echo ad(61);?>
<?php } ?>
<?php if($cat['2']['style'] == '#000000') { ?>
<!--饮料加盟开始-->
<div class="mjzs w1180 uk-margin-large-top" id="<?php echo pinyin1($cat['2']['catname']);?>">            
            <div class="title  uk-margin-small-bottom"><h2><?php echo $cat['2']['catname'];?></h2><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $cat['2']['linkurl'];?>">更多 ></a></div>
            <div class="wines">
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(56);?>
                                <ul class="uk-grid uk-grid-collapse">
                                    <?php $catson = get_maincat($cat['2']['catid'],5);?>
                                    <?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
                                    <?php if($i < 8) { ?>
                                    <li class="uk-width-1-2"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
                                    <?php } ?>
                                    <?php } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                                <?php $str = get_cat($cat['2']['catid']);?>
                                <?php $tag = tag("moduleid=5&condition=status=3 and catid in (".$str['arrchildid'].")&order=edittime desc&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],30,'...');?></a></p>
                                        <span class="uk-float-left winConSTred">赏金&nbsp;<?php echo $t['jine'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--饮料加盟结束-->
        <?php echo ad(62);?>
<?php } ?>
<?php if($cat['3']['style'] == '#000000') { ?>
<!--冲调礼盒招商开始-->
<div class="mjzs w1180 uk-margin-large-top" id="<?php echo pinyin1($cat['3']['catname']);?>">            
            <div class="title  uk-margin-small-bottom"><h2><?php echo $cat['3']['catname'];?></h2><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $cat['3']['linkurl'];?>">更多 ></a></div>
            <div class="wines">
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(57);?>
                                <ul class="uk-grid uk-grid-collapse">
                                    <?php $catson = get_maincat($cat['3']['catid'],5);?>
                                    <?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
                                    <?php if($i < 8) { ?>
                                    <li class="uk-width-1-2"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
                                    <?php } ?>
                                    <?php } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                                <?php $str = get_cat($cat['3']['catid']);?>
                                <?php $tag = tag("moduleid=5&condition=status=3 and catid in (".$str['arrchildid'].")&order=edittime desc&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],30,'...');?></a></p>
                                        <span class="uk-float-left winConSTred">赏金&nbsp;<?php echo $t['jine'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--冲调礼盒招商结束-->
        <?php echo ad(63);?>
<?php } ?>
<?php if($cat['4']['style'] == '#000000') { ?>
<!--生鲜食品开始-->
<div class="mjzs w1180 uk-margin-large-top" id="<?php echo pinyin1($cat['4']['catname']);?>">            
            <div class="title  uk-margin-small-bottom"><h2><?php echo $cat['4']['catname'];?></h2><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $cat['4']['linkurl'];?>">更多 ></a></div>
            <div class="wines">
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(58);?>
                                <ul class="uk-grid uk-grid-collapse">
                                    <?php $catson = get_maincat($cat['4']['catid'],5);?>
                                    <?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
                                    <?php if($i < 8) { ?>
                                    <li class="uk-width-1-2"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
                                    <?php } ?>
                                    <?php } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                                <?php $str = get_cat($cat['4']['catid']);?>
                                <?php $tag = tag("moduleid=5&condition=status=3 and catid in (".$str['arrchildid'].")&order=edittime desc&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],30,'...');?></a></p>
                                        <span class="uk-float-left winConSTred">赏金&nbsp;<?php echo $t['jine'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--生鲜食品结束-->
        <?php echo ad(64);?>
<?php } ?>
<?php if($cat['5']['style'] == '#000000') { ?>
<!--保健食品开始-->
<div class="mjzs w1180 uk-margin-large-top" id="<?php echo pinyin1($cat['5']['catname']);?>">            
            <div class="title  uk-margin-small-bottom"><h2><?php echo $cat['5']['catname'];?></h2><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $cat['5']['linkurl'];?>">更多 ></a></div>
            <div class="wines">
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(59);?>
                                <ul class="uk-grid uk-grid-collapse">
                                    <?php $catson = get_maincat($cat['5']['catid'],5);?>
                                    <?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
                                    <?php if($i < 8) { ?>
                                    <li class="uk-width-1-2"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
                                    <?php } ?>
                                    <?php } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                                <?php $str = get_cat($cat['5']['catid']);?>
                                <?php $tag = tag("moduleid=5&condition=status=3 and catid in (".$str['arrchildid'].")&order=edittime desc&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],30,'...');?></a></p>
                                        <span class="uk-float-left winConSTred">赏金&nbsp;<?php echo $t['jine'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--保健食品结束-->
        <?php echo ad(65);?>
<?php } ?>
<?php if($cat['6']['style'] == '#000000') { ?>
<!--高科技开始-->
<div class="mjzs w1180 uk-margin-large-top" id="<?php echo pinyin1($cat['6']['catname']);?>">            
            <div class="title  uk-margin-small-bottom"><h2><?php echo $cat['6']['catname'];?></h2><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $cat['6']['linkurl'];?>">更多 ></a></div>
            <div class="wines">
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(60);?>
                                <ul class="uk-grid uk-grid-collapse">
                                    <?php $catson = get_maincat($cat['6']['catid'],5);?>
                                    <?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
                                    <?php if($i < 8) { ?>
                                    <li class="uk-width-1-2"><a href="<?php echo $MODULE['6']['linkurl'];?><?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
                                    <?php } ?>
                                    <?php } } ?>
                                </ul> 
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                                <?php $str = get_cat($cat['6']['catid']);?>
                                <?php $tag = tag("moduleid=5&condition=status=3 and catid in (".$str['arrchildid'].")&order=edittime desc&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],30,'...');?></a></p>
                                        <span class="uk-float-left winConSTred">赏金&nbsp;<?php echo $t['jine'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--高科技结束-->
<?php echo ad(66);?>
<?php } ?>
        <div class="cnxh w1180 uk-margin-large-top " id="cnxh">
            <div class="title uk-margin-small-bottom"><h2>猜你喜欢</h2><a href="<?php echo $MODULE['28']['linkurl'];?>">更多 ></a></div>
            <div class="uk-grid uk-grid-collapse">
                <?php $tag = tag("moduleid=5&condition=status = 3&pagesize=4&order=rand() desc&template=null");?>
                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                 <div class="uk-width-1-4">
                    <div>
                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt=""></a>
                        <h3><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['alt'];?>" target="_blank"><?php echo dsubstr($t['title'],50,'...');?></a></h3>
                        <h4 style="float:left;">行业：<?php $tt=get_cat($t['catid']);echo $tt['catname'];?>
                        <span style="float:right;padding-left:30px">模式：<?php echo dsubstr($t['moshi'],12,'');?></span></h4>
                        <div class="cnxh2">
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-1-2">
                                    <h4>赏金金额</h4>
                                    <h3><?php echo $t['jine'];?>元</h3>
                                </li>
                                <li class="uk-width-1-2">
                                    <h4>关注度</h4>
                                    <h3><?php echo $t['hits'];?></h3>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } } ?>
          
            </div>
        </div>
        <?php echo ad(45);?>
        <div class="hyzx  w1180 uk-margin-large-top ">
            <div class="title uk-margin-small-bottom hd">
                <h2><?php echo $MODULE['21']['name'];?></h2>
                <?php $cat = get_maincat(0,21);?>
                <ul class="uk-float-right" >
                    <?php if(is_array($cat)) { foreach($cat as $c) { ?>
                    <li><a href="<?php echo cat_url($c['catid']);?>"><?php echo $c['catname'];?></a></li>
                    <?php } } ?>
                </ul>
            </div>
            <div class="bd">

                <?php if(is_array($cat)) { foreach($cat as $c) { ?>
                <ul >
                    <li>
                        <?php $catpp = get_cat($c['catid']);$catarr =$catpp["arrchildid"];?>

                        <?php if($catarr) { ?>
<?php $catn = get_cat($catarr);?>
                        <div class="hyzxm">
                            <div class="hyzxm2">
                                <!---
                                <div class="title2"><h4><?php echo $catn['catname'];?></h4> <a href="<?php echo cat_url($catarr);?>">更多 ></a></div>
                                --->
                                <ul class="uk-list uk-list-line">
                                    <?php $tag1 = tag("moduleid=21&condition=catid = ".$catarr." and thumb <> ''&offset=0&pagesize=1&template=null&order=addtime desc")?>

                                    <li class="hyzxmli">
                                        <img src="<?php echo $tag1['0']['thumb'];?>" alt="" class="uk-align-left">
                                        <h5 ><a href="<?php echo $tag1['0']['linkurl'];?>"><?php echo dsubstr($tag1['0']['title'],40,'...');?></a></h5>
                                        <p ><?php echo dsubstr($tag1['0']['introduce'],50,'...');?></p>
                                        <div class="uk-clearfix"></div>
                                    </li>
                                    <?php $tag2 = tag("moduleid=21&condition=catid = ".$catarr."&offset=1&pagesize=3&template=null&order=addtime desc")?>
                                    <?php if(is_array($tag2)) { foreach($tag2 as $t) { ?>
                                    <li>
                                        <h5><a href="<?php echo $t['linkurl'];?>"><?php echo dsubstr($t['title'],36,'...');?></a></h5>
                                        <p><?php echo dsubstr($t['introduce'],100,'...');?>
                                        <br><?php echo timetodate($t['addtime'],3);?>
                                        </p>
                                    </li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
<div class="hyzxm">
                            <div class="hyzxm2">
                                <!---
                                <div class="title2"><h4><?php echo $catn['catname'];?></h4> <a href="<?php echo cat_url($catarr);?>">更多 ></a></div>
                                -->
                                <ul class="uk-list uk-list-line">
                                    <?php $tag1 = tag("moduleid=21&condition=catid = ".$catarr." and thumb <> ''&pagesize=1&offset=4&template=null&order=addtime desc")?>

                                    <li class="hyzxmli">
                                        <img src="<?php echo $tag1['0']['thumb'];?>" alt="" class="uk-align-left">
                                        <h5 ><a href="<?php echo $tag1['0']['linkurl'];?>"><?php echo dsubstr($tag1['0']['title'],40,'...');?></a></h5>
                                        <p ><?php echo dsubstr($tag1['0']['introduce'],50,'...');?></p>
                                        <div class="uk-clearfix"></div>
                                    </li>
                                    <?php $tag2 = tag("moduleid=21&condition=catid = ".$catarr."&offset=5&pagesize=3&template=null&order=addtime desc")?>
                                    <?php if(is_array($tag2)) { foreach($tag2 as $t) { ?>
                                    <li>
                                        <h5><a href="<?php echo $t['linkurl'];?>"><?php echo dsubstr($t['title'],36,'...');?></a></h5>
                                        <p><?php echo dsubstr($t['introduce'],100,'...');?>
                                        <br><?php echo timetodate($t['addtime'],3);?>
                                        </p>
                                    </li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
<?php $tag5 = tag("moduleid=21&condition=catid = ".$catarr." and thumb <> ''&offset=8&pagesize=1&template=null&order=addtime desc")?>
<?php if($tag5) { ?>
<div class="hyzxm">
                            <div class="hyzxm2">
                                <!---
                                <div class="title2"><h4><?php echo $catn['catname'];?></h4> <a href="<?php echo cat_url($catarr);?>">更多 ></a></div>
                                -->
                                <ul class="uk-list uk-list-line">                                    

                                    <li class="hyzxmli">
                                        <img src="<?php echo $tag5['0']['thumb'];?>" alt="" class="uk-align-left">
                                        <h5 ><a href="<?php echo $tag5['0']['linkurl'];?>"><?php echo dsubstr($tag5['0']['title'],40,'...');?></a></h5>
                                        <p ><?php echo dsubstr($tag5['0']['introduce'],50,'...');?></p>
                                        <div class="uk-clearfix"></div>
                                    </li>
                                    <?php $tag6 = tag("moduleid=21&condition=catid = ".$catarr."&offset=9&pagesize=3&template=null&order=addtime desc")?>

                                    <?php if(is_array($tag6)) { foreach($tag6 as $t) { ?>
                                    <li>
                                        <h5><a href="<?php echo $t['linkurl'];?>"><?php echo dsubstr($t['title'],36,'...');?></a></h5>
                                        <p><?php echo dsubstr($t['introduce'],100,'...');?>
                                        <br><?php echo timetodate($t['addtime'],3);?>
                                        </p>
                                    </li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
<?php } ?>
                        <?php } ?>
                        <div class="uk-clearfix"></div>
                    </li>
                </ul>
                <?php } } ?>
            </div>
        </div>
        <div class="ssxx  w1180 uk-margin-large-top ">
            <div class="title hd">
                <h2>实时信息</h2>
                <ul class="uk-float-left">
                    <li><a href="<?php echo $MODULE['5']['linkurl'];?>">我要招商</a></li>
                    <li><a href="<?php echo $MODULE['28']['linkurl'];?>">我要代理</a></li>
                </ul>
                <a href="<?php echo $MODULE['28']['linkurl'];?>">更多 ></a>
            </div>
            <div class="bd">
            <ul >
                <li>
                    <?php $tag = tag("moduleid=5&template=null&pagesize=18&order=addtime desc")?>
                    <div class="ssxxm">
                        <ul class="uk-list">
                        <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?>
                            <?php if($i != 0  && $i%6==0) { ?>
                                </ul>
                            </div>
                            <div class="ssxxm">
                            <ul class="uk-list">
                            <?php } ?>
                            <li><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>"><?php echo dsubstr($t['title'],30);?></a><span><?php echo friend_date($t['edittime']);?></span></li>
                           
                        <?php } } ?>
                        </ul>
                    </div>
                    <div class="uk-clearfix"></div>
                </li>
            </ul >
            <ul>
                <li>
                    <?php $tag = tag("moduleid=28&template=null&pagesize=18&order=addtime desc")?>
                    <div class="ssxxm">
                        <ul class="uk-list">
                        <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?>
                            <?php if($i != 0 && $i != 18 && $i%6==0) { ?>
                                </ul>
                            </div>
                            <div class="ssxxm">
                            <ul class="uk-list">
                            <?php } ?>
                            <?php $time = round((time()-$t['addtime'])/3600);?>
                            <li><a href="<?php echo $t['linkurl'];?>"><?php echo dsubstr($t['title'],30);?></a><span><?php if(time()-$t['addtime']>3600*24) { ?><?php echo timetodate($t['addtime'],3);?><?php } else { ?><?php echo $time;?>小时前<?php } ?>
</span></li>
                           
                        <?php } } ?>
                        </ul>
                    </div>
                    <div class="uk-clearfix"></div>
                </li>
            </ul>
            </div>
        </div>
        <div class="hzmt w1180 uk-margin-top">
            <div class="title uk-margin-small-bottom"><h2>合作媒体</h2></div>
            <ul class="uk-clearfix">
            <?php $tag = tag("table=link&condition=typeid=2&pagesize=7&template=null");?>
            <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                <li class="uk-float-left"><a href="<?php echo $t['linkurl'];?>"><img src="<?php echo $t['thumb'];?>" alt=""></a></li>
            <?php } } ?>
            </ul>
        </div>
        <div class="yqlj w1180 uk-margin-top">
            <div class="title uk-margin-small-bottom"><h2>友情链接</h2></div>
            <ul class="uk-clearfix">
                <?php $tag = tag("table=link&condition=typeid=1&pagesize=7&template=null");?>
                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                <li class="uk-float-left"><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></li>
                <?php } } ?>
            </ul>
        </div>
    </div>
    <!-- main end-->
    <!-- 侧栏 -->
    <div class="winfl">
        <ul>
<?php $cat = get_maincat(0,5,-1,1);?>
<li><a href="#mypp" data-uk-smooth-scroll>名优<br/>品牌</a></li>
<?php if(is_array($cat)) { foreach($cat as $k => $t) { ?>
<?php if($t['style'] == '#000000'&& $k<7) { ?>
<li><a href="#<?php echo pinyin1($t['catname']);?>" data-uk-smooth-scroll><?php echo dsubstr($t['catname'],8,'');?></a></li>
<?php } ?>
<?php } } ?>
            <li><a href="#cnxh" data-uk-smooth-scroll>猜你<br/>喜欢</a></li>
        </ul>
    </div>
<?php include template("footer");?>
