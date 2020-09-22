<?php

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    // echo "mobile";
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once(G5_THEME_PATH.'/head.php');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/main.css">', 1);
add_javascript('<script src="'.G5_URL.'/js/jquery.cycle2.min.js"></script>', 1);
add_javascript('<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>', 1);


if($_GET['test']){
    //add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/main.css">', 3);

//echo G5_THEME_URL.'/css/main.css';exit;
}
?>
<script>
    if($('body').width() < 1050) {
        location.href="http://cleankbo.com/index.php?device=mobile";
    }
</script>
<style>
    .bannerSet {margin-left: 0.5%;border:1px solid #ccc;}
    .bannerSet .item {width:33%;float:left;}
    .bannerSet .item img {width:100%;}
    .bannerSet .item:nth-child(3) {margin-right:0%;}
    .bannerSet .item:nth-child(6) {margin-right:0%;}
    .news {clear: both;width:50%;margin:auto;}
    .news h4 {font-size: 24px;letter-spacing: 5px;text-align:;padding:60px 0px 30px;border-bottom: 1px solid #ddd;color:white;}
    .news h4 span {font-size: 16px;letter-spacing: auto;font-weight: normal;}
    .news h4 a {color:white;}
    .news ul ,
    .news ul li {list-style-type: none;padding:0px;margin:0px;background: white;}
    .news ul li {display: block;position: relative;height:90px;overflow: none;padding:5px;margin-bottom: 10px;box-shadow: 0px 3px 3px #eee;}
    .news ul li .img {width:30%;position: absolute;height:80px;overflow: hidden;}
    .news ul li img {max-width:100%;}
    .news ul li p {padding-left:33%;font-size: 16px;height:80px;overflow: hidden;line-height: 20px;color:#333;}
    .news ul li p a {color:#666;}
    .news ul li p span {display: block;height:20px;font-size: 14px;text-align: left;color:#aaa;}
    .news ul li p strong {display: block;height:20px;overflow:hidden;color:#333;}
    #mid-area-1 {height:auto;margin-bottom: 0px;padding-bottom: 40px;}
    #mid-area-3 {height:auto;padding-bottom: 50px;padding-top: 20px;}
    .lt .lt_title {margin-top: 20px;}
</style>
<div id="mid-area-1">

        <div class="bannerSet">

            <!-- 자가점검 -->
            <div class="item"><a href="/page/covid19.php"><img src="<?php echo G5_IMG_URL; ?>/banner/pc/covid19_pc.jpg" id="covid19"></a></div>
            <!-- 온라인교육 -->
            <div class="item"><a href="/page/lecture.php"><img src="<?php echo G5_IMG_URL; ?>/banner/pc/lecture_pc_new.jpg" id="online"></a></div>
            <!-- 9월통신문 -->
            <div class="item"><a href="/bbs/board.php?bo_table=notice&wr_id=45"><img src="<?php echo G5_IMG_URL; ?>/banner/pc/notice_2009.jpg" id="july20"></a></div>
            <!-- 불법스포츠도박 -->
            <div class="item"><img src="<?php echo G5_IMG_URL; ?>/banner/pc/illegal_pc.jpg"></div>
            <!-- 비디오판독영상 -->
            <div class="item"><a href="https://www.kborc.com"><img src="<?php echo G5_IMG_URL; ?>/banner/pc/replay_center_pc.jpg" id="replaycenter"></a></div>
            <div class="item"><a href="<?php echo G5_URL; ?>/bbs/board.php?bo_table=notice&wr_id=44"><img src="<?php echo G5_IMG_URL ?>/banner/pc/guidebook_pc.jpg" class="img_fix"></a></div>
        </div>
    </div>
            <div id="mid-area-3">               
                <div class="mid-area-3-01" style="width: 1052px;margin: 0 auto;">
                    <?php 
                    if(!$_GET['test']){
                        echo latest("theme/news", 'notice', 4, 25);
}
                    ?>

                </div>
            </div>
<!-- 공사중 배너 시작 -->
<!-- 공사중 배너 끝 -->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
