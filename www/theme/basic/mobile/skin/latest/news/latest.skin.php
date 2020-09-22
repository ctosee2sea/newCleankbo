<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<div class="lt">
    <ul>
    <?php for ($i=0; $i<count($list); $i++) { ?>
        <li>
            <?php
            //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\">";
						echo "<span class='txt'>";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];

            if ($list[$i]['comment_cnt'])
                echo " <span class=\"cnt_cmt\">".$list[$i]['comment_cnt']."</span>";

                // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
                // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

                if (isset($list[$i]['icon_new']))    echo " " . $list[$i]['icon_new'];
						echo "</span>";
						$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 190, 170, false, true, 'top');
						if($thumb['src']) {
							$img_content = $thumb['src'];
						} else if($list[$i]['wr_1'] != ""){
							$img_content = $list[$i]['wr_1'];
						} else {
							$img_content = $latest_skin_url.'/img/noimage.png';
						}
						echo "<img src='{$img_content}' class='thumb'>";
						echo "<span class='date'>".str_replace('-', '.', $list[$i]['datetime'])."</span>";
            echo "</a>";						
            ?>
        </li>
    <?php } ?>
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
    <li>게시물이 없습니다.</li>
    <?php } ?>
    </ul>    
		<div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span class="sound_only"><?php echo $bo_subject ?></span></a></div>
</div>
