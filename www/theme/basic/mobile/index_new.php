 <?php

//header('Location: http://cleankbo.com/adm/img/notice_mobile.jpg');
//exit;

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
<style>
	.bannerSet {padding:10px 0px;background: #fff;}
	.item {height:100px;overflow:hidden;box-shadow: 0px 3px 3px #eee;margin-bottom: 10px;border: 1px solid #ddd;}
	.news {}
	.news h4 {font-size: 24px;letter-spacing: 5px;text-align: center;padding:20px;border-bottom: 1px solid #ddd;}
	.news ul ,
	.news ul li {list-style-type: none;padding:0px;margin:0px;}
	.news ul li {display: block;position: relative;height:90px;overflow: none;padding:5px;margin-bottom: 10px;box-shadow: 0px 3px 3px #eee;}
	.news ul li .img {width:30%;position: absolute;height:80px;overflow: hidden;}
	.news ul li img {max-width:100%;}
	.news ul li p {padding-left:33%;font-size: 16px;height:80px;overflow: hidden;line-height: 20px;color:#333;}
	.news ul li p a {color:#666;}
	.news ul li p span {display: block;height:20px;font-size: 14px;text-align: left;color:#aaa;}
	.news ul li p strong {display: block;height:20px;overflow:hidden;color:#333;}
</style>
	<div class="bannerSet">
		
				<div class="item"><a href="/m/covid19.php"><img src="<?php echo G5_IMG_URL ?>/banner/mobile/covid19_m.jpg" class="img_fix"></a></div>
				<div class="item"><a href="/m/lecture.php"><img src="<?php echo G5_IMG_URL ?>/banner/mobile/lecture_m_new.jpg" class="img_fix"></a></div>
				<div class="item"><a href="/bbs/board.php?bo_table=notice&wr_id=45"><img src="<?php echo G5_IMG_URL ?>/banner/mobile/notice_2009.jpg" class="img_fix"></a></div>
				<div class="item"><img src="<?php echo G5_IMG_URL ?>/banner/mobile/illegal_m.jpg" class="img_fix"></div>
				<div class="item"><a href='https://www.kborc.com' target="_blank"><img src="<?php echo G5_IMG_URL ?>/banner/mobile/replay_center_m.jpg" class="img_fix"></a></div>
				<div class="item"><a href="<?php echo G5_URL; ?>/m/guidebook.php"><img src="<?php echo G5_IMG_URL ?>/banner/mobile/guidebook_m.jpg" class="img_fix"></a></div>
	</div>
	<div class="news">
		<h4>공지사항</h4>
		<?php
					//  최신글
					// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
					// 스킨은 입력하지 않을 경우 관리자 > 환경설정의 최신글 스킨경로를 기본 스킨으로 합니다.

					// 사용방법
					// latest(스킨, 게시판아이디, 출력라인, 글자수);
					echo latest('theme/news', 'notice', 3, 25);
				?>
		<!--ul>
			<li>
				<a href="#" class="img"><img src="http://cleankbo.com/data/editor/1908/thumb-002840b845a9ae028ed414c9196dbbf1_1565859718_0561_600x849.jpg" alt=""></a>
				<p><a href="#">
            		<strong>불법 사행행위 신고 및 도박문제 상담 안내 포스터</strong>
            		<span>2020.12.31</span>
            		공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 
				</a></p>
			</li>
			<li>
				<a href="#" class="img"><img src="http://cleankbo.com/data/editor/1908/thumb-002840b845a9ae028ed414c9196dbbf1_1565859718_0561_600x849.jpg" alt=""></a>
				<p><a href="#">
            		<strong>불법 사행행위 신고 및 도박문제 상담 안내 포스터</strong>
            		<span>2020.12.31</span>
            		공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 
				</a></p>
			</li>
			<li>
				<a href="#" class="img"><img src="http://cleankbo.com/data/editor/1908/thumb-002840b845a9ae028ed414c9196dbbf1_1565859718_0561_600x849.jpg" alt=""></a>
				<p><a href="#">
            		<strong>불법 사행행위 신고 및 도박문제 상담 안내 포스터</strong>
            		<span>2020.12.31</span>
            		공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 공지사항의 내용이 여기에 들어갑니다. 
				</a></p>
			</li>
		</ul-->
	</div>
	<!--div class="bannerSet">
				<div class="item"><a href="<?php echo G5_URL; ?>/m/guidebook.php"><img src="<?php echo G5_IMG_URL ?>/mobile/m_guidebook.jpg" class="img_fix"></a></div>
		
	</div-->

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>
