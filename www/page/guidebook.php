<?php
	include_once('./_common.php');

	$g5['title'] = '가이드북';
	$gnb_css = 'media';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';

?>
<?php 
	if(G5_IS_MOBILE){ ?>
	<img src="/img/page2.jpg" style="width:100%;">
	<?php }else{ ?>
	<style>
		#center_intro{width: 100%;min-width: 1050px;margin: 0 auto;} 
		#center_intro .md_img {margin: 0 auto;text-align: center;background-position-x: center;}
		</style>
<div id="media_menu">
    <div class="menu_area">
        <div class="menu_item color_off line_83" onclick="location.href='<?php echo G5_BBS_URL; ?>/board.php?bo_table=news'">NEWS</div>
        <div class="menu_item color_off line_83" onclick="location.href='<?php echo G5_BBS_URL; ?>/board.php?bo_table=notice'">공지사항</div>
        <div class="menu_item color_off line_83" onclick="location.href='<?php echo G5_BBS_URL; ?>/board.php?bo_table=webtoon'">웹툰</div>
              <div class="menu_item color_on line_83" onclick="location.href='<?php echo G5_URL; ?>/page/guidebook.php'">클린베이스볼 가이드북</div>
    </div>
</div>
		<div id="center_intro" style="border:1px solid #333">
			<div class="md_img"><img src="<?php echo $img_url; ?>/guidebook.jpg" style="width:640px;margin:0 auto;"></div>
			<div class="btn_cursor" style="transform: translate(-50%,-50%);bottom:0px;left:50%;position: absolute;">
				<a href="<?php echo $G5_url; ?>/m/2020_cleankbo_guidebook.pdf" target="_blank"><img src="<?php $G5_url; ?>/img/pdf.png?ver=20200318">PDF 다운로드</a>
				<a href="<?php echo $G5_url; ?>/page/flipbook.php" target="_blank"><img src="<?php $G5_url; ?>/img/ebook.png?ver=20200318">E-BOOK</a>
			</div>
		</div>

	<?php
	}
?>
<Style>
	@charset "utf-8";
/* SIR 지운아빠 */
.btn_cursor a {
	padding:10px 30px;
	border:1px solid #666;
	width: 150px;
    display: inline-block;
    text-align: center;
    font-size:16px;
}
.btn_cursor img {
	width:25px;
}
.btn_cursor a:hover {
	text-decoration:none;
}
/* ### 기본 스타일 커스터마이징 시작 ### */
#container_title{font-size: 36px; font-weight: bold; color: #333333; height: 184px; line-height: 184px; width: 1050px; margin: 0 auto; text-align: center; letter-spacing: 10px;border-bottom:6px solid #e4e4e4;}

/* 게시판 서브 메뉴 */
#media_menu{height: 83px;padding: 40px 0 50px 0;width: 1050px;margin: 0 auto;}
#media_menu .menu_area{width: 100%;height: 100%;margin: 0 auto;}
#media_menu .menu_area .menu_item{border: 1px solid #e4e4e4; width: 260px; font-size: 18px; float: left; text-align: center; cursor: pointer; }

/* 게시판 버튼 */
/* 목록 버튼 */
#bo_list a.btn_b01 {}
#bo_list a.btn_b01:focus, #bo_list a.btn_b01:hover {}
#bo_list a.btn_b02 {}
#bo_list a.btn_b02:focus, #bo_list a.btn_b02:hover {}
#bo_list a.btn_admin {} /* 관리자 전용 버튼 */
#bo_list a.btn_admin:focus, #bo_list .btn_admin:hover {}

/* 읽기 버튼 */
#bo_v a.btn_b01 {}
#bo_v a.btn_b01:focus, #bo_v a.btn_b01:hover {}
#bo_v a.btn_b02 {}
#bo_v a.btn_b02:focus, #bo_v a.btn_b02:hover {}
#bo_v a.btn_admin {} /* 관리자 전용 버튼 */
#bo_v a.btn_admin:focus, #bo_v a.btn_admin:hover {}

/* 쓰기 버튼 */
#bo_w .btn_confirm {} /* 서식단계 진행 */
#bo_w .btn_submit {}
#bo_w button.btn_submit {}
#bo_w fieldset .btn_submit {}
#bo_w .btn_cancel {}
#bo_w button.btn_cancel {}
#bo_w .btn_cancel:focus, #bo_w .btn_cancel:hover {}
#bo_w a.btn_frmline, #bo_w button.btn_frmline {} /* 우편번호검색버튼 등 */
#bo_w button.btn_frmline {}

/* 기본 테이블 */
/* 목록 테이블 */
#bo_list {}
#bo_list .tbl_head01 {}
#bo_list .tbl_head01 caption {}
#bo_list .tbl_head01 thead th {padding:16px 0;color:#aaa;font-size:15px;background-color:#f3f3f3;border:0;}
#bo_list .tbl_head01 thead a {color:#aaa;}
#bo_list .tbl_head01 thead th input {} /* middle 로 하면 게시판 읽기에서 목록 사용시 체크박스 라인 깨짐 */
#bo_list .tbl_head01 tfoot th {}
#bo_list .tbl_head01 tfoot td {}
#bo_list .tbl_head01 tbody th {}
#bo_list .tbl_head01 td {height:86px;color:#666;font-size:16px;}
#bo_list .tbl_head01 a {}
#bo_list td.empty_table {}

/* 읽기 내 테이블 */
#bo_v .tbl_head01 {}
#bo_v .tbl_head01 caption {}
#bo_v .tbl_head01 thead th {}
#bo_v .tbl_head01 thead a {}
#bo_v .tbl_head01 thead th input {} /* middle 로 하면 게시판 읽기에서 목록 사용시 체크박스 라인 깨짐 */
#bo_v .tbl_head01 tfoot th {}
#bo_v .tbl_head01 tfoot td {}
#bo_v .tbl_head01 tbody th {}
#bo_v .tbl_head01 td {}
#bo_v .tbl_head01 a {}
#bo_v td.empty_table {}

/* 쓰기 테이블 */
#bo_w table {}
#bo_w caption {}
#bo_w .frm_info {}
#bo_w .frm_address {}
#bo_w .frm_file {}

#bo_w .tbl_frm01 {}
#bo_w .tbl_frm01 th {}
#bo_w .tbl_frm01 td {}
#bo_w .tbl_frm01 textarea, #bo_w tbl_frm01 .frm_input {}
#bo_w .tbl_frm01 textarea {}
/*
#bo_w .tbl_frm01 #captcha {}
#bo_w .tbl_frm01 #captcha input {}
*/
#bo_w .tbl_frm01 a {}

/* 필수입력 */
#bo_w .required, #bo_w textarea.required {}

#bo_w .cke_sc {}
#bo_w button.btn_cke_sc{}
#bo_w .cke_sc_def {}
#bo_w .cke_sc_def dl {}
#bo_w .cke_sc_def dl:after {}
#bo_w .cke_sc_def dt, #bo_w .cke_sc_def dd {}
#bo_w .cke_sc_def dt {}
#bo_w .cke_sc_def dd {}

/* ### 기본 스타일 커스터마이징 끝 ### */

/* 게시판 목록 */
#bo_list .td_board {width:120px;text-align:center}
#bo_list .td_chk {width:30px;text-align:center}
#bo_list .td_date {width:60px;text-align:center}
#bo_list .td_datetime {width:110px;text-align:center}
#bo_list .td_group {width:100px;text-align:center}
#bo_list .td_mb_id {width:100px;text-align:center}
#bo_list .td_mng {width:80px;text-align:center}
#bo_list .td_name {width:100px;text-align:center}
#bo_list .td_nick {width:100px;text-align:center}
#bo_list .td_num {width:50px;text-align:center}
#bo_list .td_numbig {width:80px;text-align:center}

#bo_list .txt_active {color:#5d910b}
#bo_list .txt_expired {color:#ccc}

#bo_cate h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_cate ul {margin-bottom:10px;padding-left:1px;zoom:1}
#bo_cate ul:after {display:block;visibility:hidden;clear:both;content:""}
#bo_cate li {float:left;margin-bottom:-1px}
#bo_cate a {display:block;position:relative;margin-left:-1px;padding:6px 0 5px;width:90px;border:1px solid #ddd;background:#f7f7f7;color:#888;text-align:center;letter-spacing:-0.1em;line-height:1.2em;cursor:pointer}
#bo_cate a:focus, #bo_cate a:hover, #bo_cate a:active {text-decoration:none}
#bo_cate #bo_cate_on {z-index:2;border:1px solid #565e60;background:#fff;color:#565e60;font-weight:bold}

.td_subject img {margin-left:3px}

/* 게시판 목록 공통 */
.bo_fx {margin-bottom:5px;zoom:1}
.bo_fx:after {display:block;visibility:hidden;clear:both;content:""}
.bo_fx ul {margin:0;padding:0;list-style:none}
#bo_list_total {float:left;padding-top:5px}
.btn_bo_user {float:right;margin:0;padding:0;list-style:none}
.btn_bo_user li {float:left;margin-left:5px}
.btn_bo_adm {float:left}
.btn_bo_adm li {float:left;margin-right:5px}
.btn_bo_adm input {padding:8px;border:0;background:#e8180c;color:#fff;text-decoration:none;vertical-align:middle}
.bo_notice td {background:#f5f6fa}
.bo_notice td a {font-weight:bold}
.td_num strong {color:#000}
.bo_cate_link {display:inline-block;margin:0 3px 0 0;padding:0 6px 0 0;border-right:1px solid #e7f1ed;color:#999 !important;font-weight:bold;text-decoration:none} /* 글제목줄 분류스타일 */
.bo_current {color:#e8180c}
#bo_list .cnt_cmt {display:inline-block;margin:0 0 0 3px;font-weight:bold}

#bo_sch {margin-bottom:50px;height:110px;line-height:110px;text-align:center;border:1px solid #e4e4e4;}
#bo_sch legend {position:absolute;margin:0;padding:0;font-size:0;line-height:0;text-indent:-9999em;overflow:hidden}
#bo_sch .frm_input {width:198px;height:44px;line-height:44px;color:#333;font-size:15px;border:1px solid #e4e4e4;background-color:#f3f3f3;}
#bo_sch .btn_submit {width:68px;height:46px;color:#333;font-size:15px;border:1px solid #e4e4e4;background-color:#fff;}
#bo_sch select {width:113px;height:44px;color:#aaa;font-size:15px;border:1px solid #e4e4e4;text-indent:18px;background-color:#f3f3f3;}

/* 게시판 쓰기 */
#char_count_desc {display:block;margin:0 0 5px;padding:0}
#char_count_wrap {margin:5px 0 0;text-align:right}
#char_count {font-weight:bold}

#autosave_wrapper {position:relative}
#autosave_pop {display:none;z-index:10;position:absolute;top:24px;right:117px;padding:8px;width:350px;height:auto !important;height:180px;max-height:180px;border:1px solid #565656;background:#fff;overflow-y:scroll}
html.no-overflowscrolling #autosave_pop {height:auto;max-height:10000px !important} /* overflow 미지원 기기 대응 */
#autosave_pop strong {position:absolute;font-size:0;line-height:0;overflow:hidden}
#autosave_pop div {text-align:right}
#autosave_pop button {margin:0;padding:0;border:0;background:transparent}
#autosave_pop ul {margin:10px 0;padding:0;border-top:1px solid #e9e9e9;list-style:none}
#autosave_pop li {padding:8px 5px;border-bottom:1px solid #e9e9e9;zoom:1}
#autosave_pop li:after {display:block;visibility:hidden;clear:both;content:""}
#autosave_pop a {display:block;float:left}
#autosave_pop span {display:block;float:right}
.autosave_close {cursor:pointer}
.autosave_content {display:none}

/* 게시판 읽기 */
#bo_v {margin-bottom:20px;padding-bottom:20px}

#bo_v_table {position:absolute;top:0;right:16px;margin:0;padding:0 5px;height:25px;background:#ff3061;color:#fff;font-weight:bold;line-height:2.2em}

#bo_v_title {padding:42px 0 42px 12px;color:#333;font-size:24px;font-weight:bold;background-color:#fff;border-top:1px solid #e4e4e4;border-bottom:1px solid #e4e4e4;text-align:center;}
#bo_v_title .date {display:block;padding-top:22px;color:#aaa;font-size:17px;}

#bo_v_info {padding:0 0 10px;border-bottom:1px solid #ddd}
#bo_v_info h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_v_info strong {display:inline-block;margin:0 15px 0 5px;font-weight:normal}
#bo_v_info .sv_member,
#bo_v_info .sv_guest,
#bo_v_info .member,
#bo_v_info .guest {font-weight:bold}

#bo_v_file {}
#bo_v_file h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_v_file ul {margin:0;padding:0;list-style:none}
#bo_v_file li {padding:0 10px;border-bottom:1px solid #eee;background:#f5f6fa}
#bo_v_file a {display:inline-block;padding:8px 0 7px;width:100%;color:#000;word-wrap:break-word}
#bo_v_file a:focus, #bo_v_file a:hover, #bo_v_file a:active {text-decoration:none}
#bo_v_file img {float:left;margin:0 10px 0 0}
.bo_v_file_cnt {display:inline-block;margin:0 0 3px 16px}

#bo_v_link {}
#bo_v_link h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_v_link ul {margin:0;padding:0;list-style:none}
#bo_v_link li {padding:0 10px;border-bottom:1px solid #eee;background:#f5f6fa}
#bo_v_link a {display:inline-block;padding:8px 0 7px;width:100%;color:#000;word-wrap:break-word}
#bo_v_link a:focus, #bo_v_link a:hover, #bo_v_link a:active {text-decoration:none}
.bo_v_link_cnt {display:inline-block;margin:0 0 3px 16px}

#bo_v_top {margin:0 0 10px;padding:10px 0;zoom:1}
#bo_v_top:after {display:block;visibility:hidden;clear:both;content:""}
#bo_v_top h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_v_top ul {margin:0;padding:0;list-style:none}

#bo_v_bot {margin-top:53px;zoom:1}
#bo_v_bot:after {display:block;visibility:hidden;clear:both;content:""}
#bo_v_bot h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_v_bot ul {margin:0;padding:0;list-style:none}

.bo_v_nb {float:left}
.bo_v_nb li {float:left;margin-right:5px}
.bo_v_com {float:right}
.bo_v_com li {float:left;margin-left:5px}

#bo_v_atc {margin-top:62px;min-height:200px;height:auto !important;height:200px;border-bottom:1px solid #e4e4e4;}
#bo_v_atc_title {position:absolute;font-size:0;line-height:0;overflow:hidden}

#bo_v_img {margin:0 0 10px;width:100%;overflow:hidden;zoom:1}
#bo_v_img:after {display:block;visibility:hidden;clear:both;content:""}
#bo_v_img img {margin-bottom:20px;max-width:100%;height:auto}

#bo_v_con {margin-bottom:30px;width:100%;line-height:1.7em;color:#333;font-size:15px;word-break:break-all;overflow:hidden}
#bo_v_con a {color:#000;text-decoration:underline}
#bo_v_con img {max-width:100%;height:auto}

#bo_v_act {margin-bottom:30px;text-align:center}
#bo_v_act .bo_v_act_gng {position:relative}
#bo_v_act a {margin-right:5px;vertical-align:middle}
#bo_v_act strong {color:#ff3061}
#bo_v_act_good, #bo_v_act_nogood {display:none;position:absolute;top:30px;left:0;padding:10px 0;width:165px;background:#ff3061;color:#fff;text-align:center}

#bo_v_sns {margin:0 0 20px;padding:0;list-style:none;zoom:1}
#bo_v_sns:after {display:block;visibility:hidden;clear:both;content:""}
#bo_v_sns li {float:left;margin:0 5px 0 0}

/* 게시판 댓글 */
#bo_vc {margin:0 0 20px;padding:20px 20px 10px;border:1px solid #e5e8ec;background:#f5f8f9}
#bo_vc h2 {margin-bottom:10px}
#bo_vc article {padding:0 0 10px;border-top:1px dotted #ccc}
#bo_vc header {position:relative;padding:15px 0 5px}
#bo_vc header .icon_reply {position:absolute;top:15px;left:-20px}
#bo_vc .sv_wrap {margin-right:15px}
#bo_vc .member, #bo_vc .guest, #bo_vc .sv_member, #bo_vc .sv_guest {font-weight:bold}
.bo_vc_hdinfo {display:inline-block;margin:0 15px 0 5px}
#bo_vc h1 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_vc a {color:#000;text-decoration:none}
#bo_vc p {padding:0 0 5px;line-height:1.8em}
#bo_vc p a {text-decoration:underline}
#bo_vc p a.s_cmt {text-decoration:none}
#bo_vc_empty {margin:0;padding:20px !important;text-align:center}
#bo_vc #bo_vc_winfo {float:left}
#bo_vc footer {zoom:1}
#bo_vc footer:after {display:block;visibility:hidden;clear:both;content:""}

.bo_vc_act {float:right;margin:0;list-style:none;zoom:1}
.bo_vc_act:after {display:block;visibility:hidden;clear:both;content:""}
.bo_vc_act li {float:left;margin-left:5px}

#bo_vc_w {position:relative;margin:0 0 10px;padding:0 0 20px;border-bottom:1px solid #cfded8}
#bo_vc_w h2 {position:absolute;font-size:0;line-height:0;overflow:hidden}
#bo_vc_w #char_cnt {display:block;margin:0 0 5px}

#bo_vc_sns {margin:0;padding:0;list-style:none;zoom:1}
#bo_vc_sns:after {display:block;visibility:hidden;clear:both;content:""}
#bo_vc_sns li {float:left;margin:0 20px 0 0}
#bo_vc_sns input {margin:0 0 0 5px}

.attatch ul li{list-style:none;float:left;width:100%;height:37px;}
.detail td{border:1px solid #000000;}
.detail table{border-collapse: collapse;}
.detail .img{text-align:center;}

</Style>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
