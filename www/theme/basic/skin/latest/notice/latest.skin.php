<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
            <?php
	echo "<li><dl><dt>NOTICE</dt>";
        echo "<dd><a href=\"".$list[$i]['href']."\">";
        echo $list[$i]['subject']."</a></dd>";
	echo "<dd>".str_replace('-', '.', $list[$i]['datetime'])."</dd>";
        echo "</dl></li>";
            ?>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
