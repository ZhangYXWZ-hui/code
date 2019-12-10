<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/style-ldb2.2");?> 
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template("header");?>
<!-- container -->
<section class="colorGray" style="padding-top:15px;">
    <div class="container">
        <div class="uk-grid uk-grid-small">
            <div class="uk-width-1-4 uk-margin-bottom">
                <div class="ranking">
                    <ul class="uk-grid uk-grid-collapse uk-text-center rankTit" data-uk-switcher="{connect:'#subnav-pill-content-1'}">
                        <li class="uk-active uk-width-1-2">
                            <h3 class="uk-margin-top uk-margin-small-bottom"><a href="">招商综合排行</a></h3>
                        </li>
                        <li class="uk-width-1-2">
                            <h3 class="uk-margin-top uk-margin-small-bottom"><a href="">最近排行</a></h3>
                        </li>
                    </ul>
                    <ul id="subnav-pill-content-1" class="uk-switcher rankCon">
                        <li class="uk-active">
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-2-10 rankConTit">排名</li>
                                <li class="uk-width-5-10 rankConTit">项目</li>
                                <li class="uk-width-3-10 rankConTit">
                                    <p class="uk-float-right uk-margin-small-right">招商指数</p>
                                </li>
                                <?php $tag = tag("moduleid=5&table=keyword&condition=moduleid=5 and status=3&pagesize=9&order=total_search desc&key=total_search&template=null");?> 
                                <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?> 
                                <?php if($i == 6) { ?>
                            </ul>
                            <ul class="uk-grid uk-grid-collapse rankConGray">
                                <?php } ?>
                                <li class="uk-width-2-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
"><span><?php echo $i+1;?></span></li>
                                <li class="uk-width-5-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle"><a href="<?php echo $MODULE['5']['linkurl'];?>search.php?kw=<?php echo urlencode($t['word']);?>"><?php echo $t['keyword'];?></a></li>
                                <li class="uk-width-3-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle uk-flex-right"><?php echo $t['total_search'];?><i class="iconfont <?php if($i < 6) { ?>icon-shangsheng<?php } else { ?>icon-xiajiang<?php } ?>
"></i></li>
                                <?php if($i != count($tag)-1) { ?>
                                <li class="uk-width-1-1 rankConBor"></li>
                                <?php } ?>
 
                                <?php } } ?>
                            </ul>
                        </li>
                        <li>
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-2-10 rankConTit">排名</li>
                                <li class="uk-width-5-10 rankConTit">项目</li>
                                <li class="uk-width-3-10 rankConTit">
                                    <p class="uk-float-right uk-margin-small-right">招商指数</p>
                                </li>
                                <?php $tag = tag("moduleid=5&table=keyword&condition=moduleid=5 and status=3&pagesize=9&order=month_search desc&key=month_search&template=null");?> 
                                <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?> 
                                <?php if($i == 4) { ?>
                            </ul>
                            <ul class="uk-grid uk-grid-collapse rankConGray">
                                <?php } ?>
                                <li class="uk-width-2-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
"><span><?php echo $i+1;?></span></li>
                                <li class="uk-width-5-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle"><a href="<?php echo $MODULE['5']['linkurl'];?>search.php?kw=<?php echo urlencode($t['word']);?>"><?php echo $t['keyword'];?></a></li>
                                <li class="uk-width-3-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle uk-flex-right"><?php echo $t['month_search'];?><i class="iconfont <?php if($i < 4) { ?>icon-shangsheng<?php } else { ?>icon-xiajiang<?php } ?>
"></i></li>
                                <?php if($i != count($tag)-1) { ?>
                                <li class="uk-width-1-1 rankConBor"></li>
                                <?php } ?>
 
                                <?php } } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-2-4">
                <div class="ranking">
                    <ul class="uk-grid uk-grid-collapse rankTit2">
                        <li class="uk-width-1-2">
                            <h3 class="uk-margin-top uk-margin-small-bottom"><a href="#"><i class="iconfont icon-huo"></i>今日热搜</a></h3>
                        </li>
                        <li class="uk-width-1-2">
                            <h3 class="uk-margin-top uk-margin-small-bottom"><a href="#">今日成交</a></h3>
                        </li>
                    </ul>
                    <ul class="rankCon uk-grid uk-grid-small">
                        <li class="uk-width-1-2">
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-2-10 rankConTit">排名</li>
                                <li class="uk-width-5-10 rankConTit">项目</li>
                                <li class="uk-width-3-10 rankConTit">
                                    <p class="uk-float-right uk-margin-small-right">搜索指数</p>
                                </li>
                                <?php $tag = tag("moduleid=5&table=keyword&condition=moduleid=5 and status=3&pagesize=9&order=today_search desc&key=today_search&template=null");?> 
                                <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?> 
                                <?php if($i == 2) { ?>
                            </ul>
                            <ul class="uk-grid uk-grid-collapse rankConGray">
                                <?php } ?>
                                <li class="uk-width-2-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
"><span><?php echo $i+1;?></span></li>
                                <li class="uk-width-5-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle"><a href="<?php echo $MODULE['5']['linkurl'];?>search.php?kw=<?php echo urlencode($t['word']);?>"><?php echo $t['keyword'];?></a></li>
                                <li class="uk-width-3-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle uk-flex-right"><?php echo $t['today_search'];?><i class="iconfont <?php if($i < 4) { ?>icon-shangsheng<?php } else { ?>icon-xiajiang<?php } ?>
"></i></li>
                                <?php if($i != count($tag)-1) { ?>
                                <li class="uk-width-1-1 rankConBor"></li>
                                <?php } ?>
 
                                <?php } } ?>
                            </ul>
                        </li>
                        <li class="uk-width-1-2">
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-2-10 rankConTit">排名</li>
                                <li class="uk-width-5-10 rankConTit">项目</li>
                                <li class="uk-width-3-10 rankConTit">
                                    <p class="uk-float-right uk-margin-small-right">搜索指数</p>
                                </li>
                                <?php $tag = tag("moduleid=5&table=keyword&condition=moduleid=5 and status=3&pagesize=9&order=today_search desc&key=today_search&template=null");?> 
                                <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?> 
                                <?php if($i == 2) { ?>
                            </ul>
                            <ul class="uk-grid uk-grid-collapse rankConGray">
                                <?php } ?>
                                <li class="uk-width-2-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
"><span><?php echo $i+1;?></span></li>
                                <li class="uk-width-5-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle"><a href="<?php echo $MODULE['5']['linkurl'];?>search.php?kw=<?php echo urlencode($t['word']);?>"><?php echo $t['keyword'];?></a></li>
                                <li class="uk-width-3-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle uk-flex-right"><?php echo $t['today_search'];?><i class="iconfont <?php if($i < 4) { ?>icon-shangsheng<?php } else { ?>icon-xiajiang<?php } ?>
"></i></li>
                                <?php if($i != count($tag)-1) { ?>
                                <li class="uk-width-1-1 rankConBor"></li>
                                <?php } ?>
 
                                <?php } } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-1-4">
                <div class="ranking">
                    <ul class="uk-grid uk-grid-collapse uk-text-center rankTit" data-uk-switcher="{connect:'#subnav-pill-content-2'}">
                        <li class="uk-active uk-width-1-2">
                            <h3 class="uk-margin-top uk-margin-small-bottom"><a href="#">需求综合排行</a></h3>
                        </li>
                        <li class="uk-width-1-2">
                            <h3 class="uk-margin-top uk-margin-small-bottom"><a href="#">最近排行</a></h3>
                        </li>
                    </ul>
                    <ul id="subnav-pill-content-2" class="uk-switcher rankCon">
                        <li class="uk-active">
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-2-10 rankConTit">排名</li>
                                <li class="uk-width-5-10 rankConTit">项目</li>
                                <li class="uk-width-3-10 rankConTit">
                                    <p class="uk-float-right uk-margin-small-right">需求指数</p>
                                </li>
                                <?php $tag = tag("moduleid=5&condition=status=3&pagesize=9&order=hits desc&template=null");?> 
                                <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?> 
                                <?php if($i == 2) { ?>
                            </ul>
                            <ul class="uk-grid uk-grid-collapse rankConGray">
                                <?php } ?>
                                <li class="uk-width-2-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
"><span><?php echo $i+1;?></span></li>
                                <li class="uk-width-5-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle"><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>"><?php echo dsubstr($t['title'],16);?></a></li>
                                <li class="uk-width-3-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle uk-flex-right"><?php echo $t['today_search'];?><i class="iconfont <?php if($i < 4) { ?>icon-shangsheng<?php } else { ?>icon-xiajiang<?php } ?>
"></i></li>
                                <?php if($i != count($tag)-1) { ?>
                                <li class="uk-width-1-1 rankConBor"></li>
                                <?php } ?>
 
                                <?php } } ?>
                            </ul>
                        </li>
                        <li>
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-2-10 rankConTit">排名</li>
                                <li class="uk-width-5-10 rankConTit">项目</li>
                                <li class="uk-width-3-10 rankConTit">
                                    <p class="uk-float-right uk-margin-small-right">需求指数</p>
                                </li>
                                <?php $tag = $tag = tag("moduleid=5&condition=status=3&pagesize=9&order=hits desc&template=null");?> 
                                <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?> 
                                <?php if($i == 2) { ?>
                            </ul>
                            <ul class="uk-grid uk-grid-collapse rankConGray">
                                <?php } ?>
                                <li class="uk-width-2-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
"><span><?php echo $i+1;?></span></li>
                                <li class="uk-width-5-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle"><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>"><?php echo dsubstr($t['title'],16);?></a></li>
                                <li class="uk-width-3-10 <?php if($i == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle uk-flex-right"><?php echo $t['hits'];?><i class="iconfont <?php if($i < 4) { ?>icon-shangsheng<?php } else { ?>icon-xiajiang<?php } ?>
"></i></li>
                                <?php if($i != count($tag)-1) { ?>
                                <li class="uk-width-1-1 rankConBor"></li>
                                <?php } ?>
 
                                <?php } } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="uk-grid uk-grid-small">
            <?php $cat = get_maincat(0,31);?> 
            <?php if(is_array($cat)) { foreach($cat as $i => $c) { ?> 
            <?php if($i != 0 && $i%4==0) { ?>
        </div>
        <div class="uk-grid uk-grid-small">
            <?php } ?>
            <div class="uk-width-1-4 uk-margin-top">
                <div class="ranking ranking2">
                    <div class="rankPic uk-text-center">
                        <?php echo ad(46);?>
                    </div>
                    <div class="rankBor">
                        <div class="rankTit3">
                            <h3 class="uk-margin-small"><i class="iconfont icon-shipinyinliao"></i><?php echo $c['catname'];?><span class="uk-float-right"><a href="<?php echo $c['linkurl'];?>">更多></a></span></h3>
                        </div>
                        <ul class="rankCon">
                            <li>
                                <ul class="uk-grid uk-grid-collapse">
                                    <li class="uk-width-2-10 rankConTit">排名</li>
                                    <li class="uk-width-5-10 rankConTit">项目</li>
                                    <li class="uk-width-3-10 rankConTit">
                                        <p class="uk-float-right uk-margin-small-right">招商指数</p>
                                    </li>
                                    <?php $cat2 = tag("table=category&condition=catname = '".$c['catname']."' and moduleid = 5&pagesize=1&template=null");?> 
                                    <?php $tag = tag("moduleid=5&condition=catid in (".$cat2['0']['arrchildid'].") and status=3&pagesize=9&order=hits desc&template=null");?>
                                    <?php if(is_array($tag)) { foreach($tag as $ii => $t) { ?>
                                    <li class="uk-width-2-10 <?php if($ii == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
"><span><?php echo $ii+1;?></span></li>
                                    <li class="uk-width-5-10 <?php if($ii == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle"><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>"><?php echo dsubstr($t['title'],16);?></a></li>
                                    <li class="uk-width-3-10 <?php if($ii == 0) { ?>uk-margin-top<?php } else { ?>uk-margin-small-top<?php } ?>
 uk-flex uk-flex-middle uk-flex-right"><?php echo $t['hits'];?><i class="iconfont <?php if($ii > 5) { ?>icon-xiajiang<?php } else { ?>icon-shangsheng<?php } ?>
"></i></li>
                                    <?php if($ii != count($tag)-1) { ?>
                                    <li class="uk-width-1-1 rankConBor"></li><?php } ?>
 
                                    <?php if($ii == 2) { ?>
                                </ul>
                                <ul class="uk-grid uk-grid-collapse rankConGray">
                                    <?php } ?>
 
                                    <?php } } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
<?php include template("footer");?>