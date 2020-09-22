<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<div class="viewport">
	<div id="nav">
	<button id="prev">Previous</button>
    <button id="next">Next</button>
  &nbsp; &nbsp;
  <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
</div>
<style>
	.viewport {
		width:1050px;
		margin:0 auto;
	}
	#nav {
		text-align:center;
		width:100%;
	}
	#the-canvas {
		margin:0 auto;
		display:block;
	}
</style>
<canvas id="the-canvas"></canvas>
</div>
<script>
	// If absolute URL from the remote server is provided, configure the CORS
// header on that server.

function parse_query_string(query) {
  var vars = query.split("&");
  var query_string = {};
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    var key = decodeURIComponent(pair[0]);
    var value = decodeURIComponent(pair[1]);
    // If first entry with this name
    if (typeof query_string[key] === "undefined") {
      query_string[key] = decodeURIComponent(value);
      // If second entry with this name
    } else if (typeof query_string[key] === "string") {
      var arr = [query_string[key], decodeURIComponent(value)];
      query_string[key] = arr;
      // If third or later entry with this name
    } else {
      query_string[key].push(decodeURIComponent(value));
    }
  }
  return query_string;
}
var query = window.location.search.substring(1);
var qs = parse_query_string(query);



// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

 //
  // In cases when the pdf.worker.js is located at the different folder than the
  // PDF.js's one, or the PDF.js is executed via eval(), the workerSrc property
  // shall be specified.
  //
if(qs.ele == '14') {
  var url = '/m/kbo14.pdf';
} else {
  var url = '/m/kbo15.pdf';
}
  var pdfDoc = null,
      pageRendering = true,
      pageNumPending = null,
      scale = 2,
      pageNum=1,
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
  loadingTask.promise.then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    document.getElementById('page_count').textContent = pdfDoc.numPages;
    // Initial/first page rendering
    renderPage(pageNum);
  });
</script>
<?php

	// include_once('./_common.php');

	// ob_end_clean();

	// $filepath = G5_PATH.'/m/kboR14R15.pdf';
	// $filepath = addslashes($filepath);
	// if (!is_file($filepath) || !file_exists($filepath))
 //    alert('파일이 존재하지 않습니다.');
	
	// $original = iconv('utf-8', 'euc-kr', 'kboR14R15.pdf');

	// if(preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])) {
	// 		header("content-type: doesn/matter");
	// 		header("content-length: ".filesize("$filepath"));
	// 		header("content-disposition: attachment; filename=\"$original\"");
	// 		header("content-transfer-encoding: binary");
	// } else {
	// 		header("content-type: file/unknown");
	// 		header("content-length: ".filesize("$filepath"));
	// 		header("content-disposition: attachment; filename=\"$original\"");
	// 		header("content-description: php generated data");
	// }
	// header("pragma: no-cache");
	// header("expires: 0");
	// flush();

	// $fp = fopen($filepath, 'rb');

	// // 4.00 대체
	// // 서버부하를 줄이려면 print 나 echo 또는 while 문을 이용한 방법보다는 이방법이...
	// //if (!fpassthru($fp)) {
	// //    fclose($fp);
	// //}

	// $download_rate = 10;

	// while(!feof($fp)) {
	// 		//echo fread($fp, 100*1024);
	// 		/*
	// 		echo fread($fp, 100*1024);
	// 		flush();
	// 		*/

	// 		print fread($fp, round($download_rate * 1024));
	// 		flush();
	// 		usleep(1000);
	// }
	// fclose ($fp);
	// flush();
?>