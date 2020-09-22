<?php
	include_once('./_common.php');
// if($member['mb_id'] == ""){
//         echo "<script>alert('로그인이 필요한 서비스입니다.');location.replace('/bbs/login.php')</script>";
//         exit;
// }
	$g5['main_title'] = '신고센터';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<style>
			#report_form_wrap {margin-bottom:30px;padding:0 15px;}
			.report_title {padding:35px 0 13px;color:#222529;font-size:17px;border-bottom:2px solid #00489d;}
			#report_form_wrap .row {padding-bottom:13px;border-bottom:1px solid #e4e4e4;}
			#report_form_wrap .row.filebox {border:0;}
			#report_form_wrap .lb {display:block;padding:18px 0 14px;color:#222529;font-size:13px;font-weight:bold;}
			#report_form_wrap .inpt {width:100%;height:45px;color:#222529;font-size:14px;border:1px solid #e4e4e4;background-color:#f3f3f3;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;}
			#report_form_wrap .chk_grp label {display:inline-block;margin-right:14px;height:30px;color:#222529;font-size:14px;}
			#report_form_wrap .chk_grp input[type="radio"] {margin-right:12px;}
			#report_form_wrap .txta {width:100%;height:215px;color:#222529;font-size:14px;border:1px solid #e4e4e4;background-color:#f3f3f3;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;}
			.btntype1, .btntype2 {display:inline-block;min-width:49%;padding:18px 7px 17px;text-align:center;color:#fff;font-size:14px;background-color:#00489d;line-height:1.0;border:0;}
			.btntype2 {color:#aaa;background-color:#f3f3f3;}
			.filebox input[type="file"] { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip:rect(0,0,0,0); border: 0; }
			.filebox label { display: inline-block; margin-bottom:10px; padding: 7px 10px; width:20%;height:29px; color: #aaa; font-size: 14px; line-height: 29px; vertical-align: middle; background-color: #fdfdfd; cursor: pointer; border: 1px solid #ebebeb; border-bottom-color: #e2e2e2; border-radius: 3px; text-align:center;} 
			.filebox .upload-name { display: inline-block; margin-bottom:10px; padding: 7px 10px; width:62%; height:29px; font-size: 14px; font-family: inherit; line-height: normal; vertical-align: middle; background-color: #f5f5f5; border: 1px solid #ebebeb; border-bottom-color: #e2e2e2; border-radius: 3px; -webkit-appearance: none; /* 네이티브 외형 감추기 */ -moz-appearance: none; appearance: none; }
			.report_banner {
				position: relative;
			}
			.more {
				position: absolute;
				display: block;
				cursor: pointer;
				width: 45%;
				height: 3%;
				left: 5%;
			}
			.more1 {
				bottom: 10%;
			}
			.more2 {
				bottom:7%;
			}
		</style>
		<div class="body-wrap">
			<div class="report_banner">
			<img src="<?php echo $img_url; ?>/report_banner.png" class="img_fix">
				<span class="more more1" onclick="pdf(14)"></span>
				<span class="more more2" onclick="pdf(15)"></span>
		</div>
		<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<div id="toggleView">
	<div id="nav">
	<span id="prev">Previous</span>
    <span id="next">Next</span>
  &nbsp; &nbsp;
  <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
</div>
<style>
	#toggleView {
		width:100vw;
		height:100vh;
		margin:0 auto;
		position:fixed;    
   		top:0;right:0;bottom:0;left:0;
   		background:#fff;
   		z-index:999;
   		display: none;
	}
 	 #the-canvas-close {
    	position:fixed;
    	top:30px;
    	right:30px;
    	color:#000;
    	font-size:30px;
    	cursor: pointer;
    	z-index:999;
	}
	#nav {
		margin:30px auto;
		text-align:center;
		width:100%;
	}
	#nav span {
		display:inline-block;
	}
	#prev, #next {
		border:1px solid #000;
		width:50px;
		text-align:center;
		padding:10px;
		cursor: pointer;
	}
	#the-canvas {
		margin:0 auto;
		width:100%;
	}
</style>
<div id="the-canvas-close">&times;</div>
<canvas id="the-canvas"></canvas>
</div>
<script>
	// If absolute URL from the remote server is provided, configure the CORS
// header on that server.

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

 //
  // In cases when the pdf.worker.js is located at the different folder than the
  // PDF.js's one, or the PDF.js is executed via eval(), the workerSrc property
  // shall be specified.
  //
  var url;
  function pdf(arg) {
  	console.log(arg);
	if(arg == 14) {
  	 url = '/m/kbo14.pdf';
	} else {
	 url = '/m/kbo15.pdf';
	}
  }
  
  var pdfDoc = null,
      pageRendering = true,
	  pageNum=1,
      pageNumPending = null,
      scale = 2,
      canvas = document.getElementById('the-canvas'),
      ctx = canvas.getContext('2d');
  /**
   * Get page info from document, resize canvas accordingly, and render page.
   * @param num Page number.
   */
  function renderPage(num) {
    pageRendering = true;
    // Using promise to fetch the page
    pdfDoc.getPage(num).then(function(page) {
      var viewport = page.getViewport({ scale: scale, });
      canvas.height = viewport.height;
      canvas.width = viewport.width;
      // Render PDF page into canvas context
      var renderContext = {
        canvasContext: ctx,
        viewport: viewport,
      };
      var renderTask = page.render(renderContext);
      // Wait for rendering to finish
      renderTask.promise.then(function () {
        pageRendering = false;
        if (pageNumPending !== null) {
          // New page rendering is pending
          renderPage(pageNumPending);
          pageNumPending = null;
        }
      });
    });
    // Update page counters
    document.getElementById('page_num').textContent = num;
  }
  /**
   * If another page rendering in progress, waits until the rendering is
   * finised. Otherwise, executes rendering immediately.
   */
  function queueRenderPage(num) {
    if (pageRendering) {
      pageNumPending = num;
    } else {
      renderPage(num);
    }
  }
  /**
   * Displays previous page.
   */
  function onPrevPage() {
    if (pageNum <= 1) {
      return;
    }
    pageNum--;
    queueRenderPage(pageNum);
  }
  document.getElementById('prev').addEventListener('click', onPrevPage);
  /**
   * Displays next page.
   */
  function onNextPage() {
    if (pageNum >= pdfDoc.numPages) {
      return;
    }
    pageNum++;
    queueRenderPage(pageNum);
  }
  document.getElementById('next').addEventListener('click', onNextPage);
  /**
   * Asynchronously downloads PDF.
   */
  var loadingTask = pdfjsLib.getDocument(url);
</script>
			<?php if($member['mb_id'] =='') {
$url = '/m/page/report.php';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
// if ($is_member) {
//     if ($url)
//         goto_url($url);
//     else
//         goto_url($url);
// }

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";

// 로그인 스킨이 없는 경우 관리자 페이지 접속이 안되는 것을 막기 위하여 기본 스킨으로 대체
$login_file = $member_skin_path.'/login.skin.php';
if (!file_exists($login_file))
    $member_skin_path   = G5_SKIN_PATH.'/member/basic';

include_once($member_skin_path.'/login.skin.php');
 } else { ?>
				<div id="report_form_wrap">
				<h2 class="report_title">신고하기</h2>
				<form name="fwrite" id="fwrite" action="<?php echo G5_URL; ?>/m/report_update.php" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">	
					<div class="row">
						<label for="rp_name" class="lb">신고인 이름</label>
						<input type="text" id="rp_name" name="rp_name" class="inpt" required>
					</div>
					<div class="row">
						<label for="rp_tel"  class="lb">연락처</label>
						<input type="text" id="rp_tel" name="rp_hp" class="inpt" required>
					</div>
					<div class="row">
						<p class="lb">신고항목</p>
						<div class="chk_grp">
							<label><input type="radio" name="rp_category" value="승부조작">승부조작</label>
							<label><input type="radio" name="rp_category" value="도핑">도핑</label>
							<label><input type="radio" name="rp_category" value="스포츠도박">스포츠 도박</label>
							<label><input type="radio" name="rp_category" value="부정신고">그외 KBO리그 부정 신고</label>
						</div>
					</div>
					<div class="row">
						<label for="rp_subject"  class="lb">신고제목</label>
						<input type="text" id="rp_subject" name="rp_subject" class="inpt" required maxlength="255">
					</div>
					<div class="row">
						<label for="rp_content"  class="lb">신고내용</label>
						<textarea id="rp_content" name="rp_content" class="txta"></textarea>
					</div>
					<div class="row filebox">
						<p class="lb">파일첨부</p>
						<input class="upload-name bf_file1" value="파일선택" disabled="disabled">
						<label for="bf_file1">파일첨부</label>
						<input type="file" id="bf_file1" name="bf_file[1]" class="upload-hidden">
						<input class="upload-name bf_file2" value="파일선택" disabled="disabled">
						<label for="bf_file2">파일첨부</label>
						<input type="file" id="bf_file2" name="bf_file[2]" class="upload-hidden">
					</div>
					<div class="btn_wrap">
						<button type="submit" id="btn_submit" class="btntype1">등록하기</button>
						<button type="button" class="btntype2">취소하기</button>
					</div>
				</form>
			</div>
			<?php } ?>
		</div>
		<script>
	    function fwrite_submit(f)
	    {
				var hp = f.rp_hp.value.replace(/[0-9\-]/g, "");
        if(hp.length > 0) {
            alert("휴대폰번호는 숫자, - 으로만 입력해 주십시오.");
            return false;
        }
				var cate = $('input[name=rp_category]:checked').val();
				if(!cate) {
            alert("신고항목을 선택해 주십시오.");
            return false;
				}

				document.getElementById("btn_submit").disabled = "disabled";

        return true;
			}
			$(document).ready(function(){ 
				var fileTarget = $('.filebox .upload-hidden'); 
				fileTarget.on('change', function(){ // 값이 변경되면 				
					if(window.FileReader){ // modern browser 					
						var filename = $(this)[0].files[0].name; 
					} else { // old IE 
						var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출 
					} 
					var id = $(this).attr('id');
					// 추출한 파일명 삽입 
					$(this).siblings('.'+id).val(filename); 
				}); 
				$('#toggleView').hide();
			}); 
				$('.more').click(function(){
					$('#toggleView').show();
		  var loadingTask = pdfjsLib.getDocument(url);
  loadingTask.promise.then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    document.getElementById('page_count').textContent = pdfDoc.numPages;
    // Initial/first page rendering
    renderPage(pageNum);
  });
				})
				$('#the-canvas-close').click(function(){
					$('#toggleView').hide();
				})
				$('.more1').click(function(){

				})
		</script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>
