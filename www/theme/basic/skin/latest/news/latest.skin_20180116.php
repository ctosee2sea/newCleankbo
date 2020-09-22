<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="lt">
    <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>" class="lt_title"><img src="<?php echo $latest_skin_url; ?>/img/title_news.png" alt="<?php echo $bo_subject; ?>"></a>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php
            //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\">";
						$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 263, 240, false, true, 'top');
						if($thumb['src']) {
							$img_content = $thumb['src'];
						} else if($list[$i]['wr_1'] != ""){
							$img_content = $list[$i]['wr_1'];
						} else {
							$img_content = $latest_skin_url.'/img/noimage.png';
						}
						echo "<img src='{$img_content}' class='thumb'>";

            echo "<span class='title'>".$list[$i]['subject']."</span>";

						echo "<span class='date'>".str_replace('-', '.', $list[$i]['datetime'])."</span>";

            echo "</a>";

            ?>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>    
		<div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><img src="<?php echo $latest_skin_url; ?>/img/more.png" alt="<?php echo $bo_subject ?>"></a></div>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
