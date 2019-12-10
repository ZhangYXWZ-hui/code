<?php defined('IN_DESTOON') or exit('Access Denied');?><?php $CSS = array("css/uikit.min","base","css/style-mypp");?>
<?php $JS=array("js/uikit.min.js","js/base.js");?>
<?php include template('header');?>
<!-- container -->
    <section class="colorGray">
        <div class="container">
            <ul class="uk-grid uk-grid-small uk-text-center">
                <?php echo ad(68);?>
            </ul>
        </div>
    </section>
    <!-- wines -->
    <section>
        <div class="container">
            <div class="wines">
                <div class="uk-grid uk-grid-small winesTit">
                    <div class="uk-width-4-5 uk-margin-top">
                        <h3>名酒</h3>
                    </div>
                    <div class="uk-width-1-5 uk-margin-top">
                        <ul class="uk-grid uk-grid-small uk-text-center winesCru">
<?php $catson = get_maincat(1,5);?>
<?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
<li><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
<?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse uk-margin-top">
                        <div class="uk-width-1-5">
                            <div class="winConRed">
                                <?php echo ad(31);?>
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
<?php $str = get_cat(1);?>
                                <?php $tag = tag("moduleid=5&condition=catid in (".$str['arrchildid'].") and (level = 1 or level = 5)&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" title="<?php echo $t['title'];?>" title="<?php echo $t['title'];?>"><?php echo dsubstr($t['title'],40,'...');?>
</a></p>
                                        <span class="uk-float-left winConSTred">佣金 <?php echo $t['fee'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
<?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="winesAD">
                    <div class="colorGray">
                        <?php echo ad(32);?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fmgg -->
    <section>
        <div class="container fmgg">
            <div class="wines">
                <div class="uk-grid uk-grid-small winesTit">
                    <div class="uk-width-4-5 uk-margin-top">
                        <h3>快消品</h3>
                    </div>
                    <div class="uk-width-1-5 uk-margin-top">
                        <ul class="uk-grid uk-grid-small uk-text-center winesCru">
<?php $catson = get_maincat(48,5);?>
<?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
<li><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>" target="_blank" title="<?php echo $c['catname'];?>"><?php echo $c['catname'];?></a></li>
<?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse uk-margin-top">
                        <div class="uk-width-1-5">
                            <div class="winConRed winConGreen">
                                <?php echo ad(33);?>
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
<?php $str = get_cat(48);?>
                                <?php $tag = tag("moduleid=5&condition=(level = 1 or level = 5 )and catid in (".$str['arrchildid'].")&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" target="_blank" title="<?php echo $t['title'];?>"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a></p>
                                        <span class="uk-float-left winConSTred">佣金 <?php echo $t['fee'];?>元</span>
                                        <span class="uk-float-right"><?php $tt = get_cat($t['catid']);echo $tt['catname'];?></span>
                                    </div>
                                </li>
<?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="winesAD">
                    <div class="colorGray">
                        <?php echo ad(34);?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- artifice -->
    <section>
        <div class="container fmgg">
            <div class="wines">
                <div class="uk-grid uk-grid-small winesTit">
                    <div class="uk-width-4-5 uk-margin-top">
                        <h3>高科技</h3>
                    </div>
                    <div class="uk-width-1-5 uk-margin-top">
                        <ul class="uk-grid uk-grid-small uk-text-center winesCru">
                        <?php $catson = get_maincat(286,5);?>
<?php if(is_array($catson)) { foreach($catson as $i => $c) { ?>
<li><?php echo $c['catname'];?></li>
<?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="winesCon">
                    <div class="uk-grid uk-grid-collapse uk-margin-top">
                        <div class="uk-width-1-5">
                            <div class="winConRed winConBlue">
                                <?php echo ad(35);?>
                            </div>
                        </div>
                        <div class="uk-width-4-5">
                            <ul class="uk-grid uk-grid-collapse">
                               <?php $str = get_cat(286);?>
                                <?php $tag = tag("moduleid=5&condition=(level = 1 or level = 5) and catid in (286,".$str['arrchildid'].")&pagesize=8&template=null");?>
                                <?php if(is_array($tag)) { foreach($tag as $t) { ?>
                                <li class="uk-width-1-4">
                                    <div class="winConBox">
                                        <a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" target="_blank" title="<?php echo $t['title'];?>"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>"></a>
                                        <p><a href="<?php echo userurl($t['username'], 'file=sell&itemid='.$t['itemid'], $domain);?>" target="_blank" title="<?php echo $t['title'];?>"><?php echo $t['title'];?></a></p>
                                        <span class="uk-float-left winConSTred">佣金 <?php echo $t['fee'];?>元</span>
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
    </section>
<?php include template('footer');?> 
</body>
</html>
