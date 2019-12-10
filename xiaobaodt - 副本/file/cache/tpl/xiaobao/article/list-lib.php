<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/style-ldb2.2");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template("header");?>
    <!-- container -->
    <section class="colorGray">
        <div class="container">
            <div class="proTit">
                <h3 class="uk-heading-line uk-text-center"><span><?php $cat = get_cat($catid);echo $cat['catname'];?>项目排行榜 &nbsp;</span></h3>
            </div>
            <div class="proRankCon">
                <ul>
                    <li class="proRanTit proRan-1">排名</li>
                    <li class="proRanTit proRan-2">项目</li>
                    <li class="proRanTit proRan-3">行业</li>
                    <li class="proRanTit proRan-4">地区</li>
                    <li class="proRanTit proRan-5">搜索指数</li>
                    <?php $cat2 = tag("table=category&condition=catname = '".$cat['catname']."' and moduleid = 5&pagesize=1&template=null");?>
                    <?php $tag = tag("moduleid=5&condition=catid in (".$cat2['0']['arrchildid'].") and status=3&pagesize=9&order=hits desc&template=null");?>
                    <?php if(is_array($tag)) { foreach($tag as $i => $t) { ?>
                    <li class="proRan-1 uk-margin-top"><span><?php echo $i+1;?></span></li>
                    <li class="proRan-2 uk-margin-top"><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>"><?php echo dsubstr($t['title'],40);?></a></li>
                    <li class="proRan-3 uk-margin-top"><?php $c = get_cat($t['catid']); echo $c['catname'];?></li>
                    <li class="proRan-4 uk-margin-top"><?php $area = $t[areaid]?get_area($t[areaid]):''; echo $area[areaname];?></li>
                    <li class="proRan-5 uk-margin-top"><?php echo $t['hits'];?><i class="iconfont icon-shangsheng"></i></li>
                    <?php if($i < 3) { ?>
                    <li class="proRan-6 proRanDesc">
                        <p><?php echo dsubstr($t['introduce'],100,'...');?></p>
                    </li>
                    <?php } else { ?>
                    <?php if($i != count($tag)-1) { ?>
                    <li class="proRan-7 proRanBor"></li>
                    <?php } ?>
                    <?php } ?>
                    <?php } } ?>
                 
                </ul>
            </div>
        </div>
    </section>
<?php include template("footer");?>