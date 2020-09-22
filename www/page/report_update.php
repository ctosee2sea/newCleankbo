<?php
include_once('./_common.php');

/*if($is_guest)
    alert('회원이시라면 로그인 후 이용해 보십시오.', './login.php?url='.urlencode(G5_URL.'/m/report.php'));*/

$msg = array();
$upload_size = 5242880;

$category = array('승부조작','도핑','스포츠도박','부정신고');
if(!in_array($rp_category, $category))
		alert('신고항목을 올바르게 지정해 주십시오.');

$rp_name = '';
if (isset($_POST['rp_name'])) {
    $rp_name = substr(trim($_POST['rp_name']),0,255);
    $rp_name = preg_replace("#[\\\]+$#", "", $rp_name);
}
if ($rp_name == '') {
    $msg[] = '<strong>이름</strong>을 입력하세요.';
}

$rp_subject = '';
if (isset($_POST['rp_subject'])) {
    $rp_subject = substr(trim($_POST['rp_subject']),0,255);
    $rp_subject = preg_replace("#[\\\]+$#", "", $rp_subject);
}
if ($rp_subject == '') {
    $msg[] = '<strong>제목</strong>을 입력하세요.';
}

$rp_content = '';
if (isset($_POST['rp_content'])) {
    $rp_content = substr(trim($_POST['rp_content']),0,65536);
    $rp_content = preg_replace("#[\\\]+$#", "", $rp_content);
}
if ($rp_content == '') {
    $msg[] = '<strong>내용</strong>을 입력하세요.';
}

if (!empty($msg)) {
    $msg = implode('<br>', $msg);
    alert($msg);
}

if($rp_hp)
    $rp_hp = preg_replace('/[^0-9\-]/', '', strip_tags($rp_hp));

$rp_email = '';
if (isset($_POST['rp_email'])) {
    $rp_email = substr(trim($_POST['rp_email']),0,255);
//    $rp_email = preg_replace("#[\\\]+$#", "", $rp_email);
}
// 090710
if (substr_count($rp_content, '&#') > 50) {
    alert('내용에 올바르지 않은 코드가 다수 포함되어 있습니다.');
    exit;
}

$upload_max_filesize = ini_get('upload_max_filesize');

if (empty($_POST)) {
    alert("파일 또는 글내용의 크기가 서버에서 설정한 값을 넘어 오류가 발생하였습니다.\\npost_max_size=".ini_get('post_max_size')." , upload_max_filesize=".$upload_max_filesize."\\n사이트관리자 또는 서버관리자에게 문의 바랍니다.");
}

for ($i=1; $i<=5; $i++) {
    $var = "rp_$i";
    $$var = "";
    if (isset($_POST['rp_'.$i]) && $_POST['rp_'.$i]) {
        $$var = trim($_POST['rp_'.$i]);
    }
}

// 파일개수 체크
$file_count   = 0;
$upload_count = count($_FILES['bf_file']['name']);

for ($i=1; $i<=$upload_count; $i++) {
    if($_FILES['bf_file']['name'][$i] && is_uploaded_file($_FILES['bf_file']['tmp_name'][$i]))
        $file_count++;
}

if($file_count > 2)
    alert('첨부파일을 2개 이하로 업로드 해주십시오.');

// 디렉토리가 없다면 생성합니다. (퍼미션도 변경하구요.)
@mkdir(G5_DATA_PATH.'/rp', G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH.'/rp', G5_DIR_PERMISSION);

$chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));

// 가변 파일 업로드
$file_upload_msg = '';
$upload = array();
for ($i=1; $i<=count($_FILES['bf_file']['name']); $i++) {
    $upload[$i]['file']     = '';
    $upload[$i]['source']   = '';
    $upload[$i]['del_check'] = false;

    $tmp_file  = $_FILES['bf_file']['tmp_name'][$i];
    $filesize  = $_FILES['bf_file']['size'][$i];
    $filename  = $_FILES['bf_file']['name'][$i];
    $filename  = get_safe_filename($filename);

    // 서버에 설정된 값보다 큰파일을 업로드 한다면
    if ($filename) {
        if ($_FILES['bf_file']['error'][$i] == 1) {
            $file_upload_msg .= '\"'.$filename.'\" 파일의 용량이 서버에 설정('.$upload_max_filesize.')된 값보다 크므로 업로드 할 수 없습니다.\\n';
            continue;
        }
        else if ($_FILES['bf_file']['error'][$i] != 0) {
            $file_upload_msg .= '\"'.$filename.'\" 파일이 정상적으로 업로드 되지 않았습니다.\\n';
            continue;
        }
    }

    if (is_uploaded_file($tmp_file)) {
        // 관리자가 아니면서 설정한 업로드 사이즈보다 크다면 건너뜀
        if (!$is_admin && $filesize > $upload_size) {
            $file_upload_msg .= '\"'.$filename.'\" 파일의 용량('.number_format($filesize).' 바이트)이 게시판에 설정('.number_format($upload_size).' 바이트)된 값보다 크므로 업로드 하지 않습니다.\\n';
            continue;
        }

        //=================================================================\
        // 090714
        // 이미지나 플래시 파일에 악성코드를 심어 업로드 하는 경우를 방지
        // 에러메세지는 출력하지 않는다.
        //-----------------------------------------------------------------
        $timg = @getimagesize($tmp_file);
        // image type
        if ( preg_match("/\.({$config['cf_image_extension']})$/i", $filename) ||
             preg_match("/\.({$config['cf_flash_extension']})$/i", $filename) ) {
            if ($timg['2'] < 1 || $timg['2'] > 16)
                continue;
        }
        //=================================================================


        // 프로그램 원래 파일명
        $upload[$i]['source'] = $filename;
        $upload[$i]['filesize'] = $filesize;

        // 아래의 문자열이 들어간 파일은 -x 를 붙여서 웹경로를 알더라도 실행을 하지 못하도록 함
        $filename = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $filename);

        shuffle($chars_array);
        $shuffle = implode('', $chars_array);

        // 첨부파일 첨부시 첨부파일명에 공백이 포함되어 있으면 일부 PC에서 보이지 않거나 다운로드 되지 않는 현상이 있습니다. (길상여의 님 090925)
        $upload[$i]['file'] = abs(ip2long($_SERVER['REMOTE_ADDR'])).'_'.substr($shuffle,0,8).'_'.replace_filename($filename);

        $dest_file = G5_DATA_PATH.'/rp/'.$upload[$i]['file'];

        // 업로드가 안된다면 에러메세지 출력하고 죽어버립니다.
        $error_code = move_uploaded_file($tmp_file, $dest_file) or die($_FILES['bf_file']['error'][$i]);

        // 올라간 파일의 퍼미션을 변경합니다.
        chmod($dest_file, G5_FILE_PERMISSION);
    }
}

$row = sql_fetch(" select MIN(rp_num) as min_rp_num from cbc_report ");
$rp_num = $row['min_rp_num'] - 1;

$sql = " insert into cbc_report
						set rp_num          = '$rp_num',
								mb_id           = '{$member['mb_id']}',
								rp_name         = '$rp_name',
								rp_email        = '$rp_email',
								rp_hp           = '$rp_hp',
								rp_category     = '$rp_category',
								rp_html         = '$rp_html',
								rp_subject      = '$rp_subject',
								rp_content      = '$rp_content',
								rp_status       = '$rp_status',
								rp_file1        = '{$upload[1]['file']}',
								rp_source1      = '{$upload[1]['source']}',
								rp_file2        = '{$upload[2]['file']}',
								rp_source2      = '{$upload[2]['source']}',
								rp_ip           = '{$_SERVER['REMOTE_ADDR']}',
								rp_datetime     = '".G5_TIME_YMDHIS."',
								rp_1            = '$rp_1',
								rp_2            = '$rp_2',
								rp_3            = '$rp_3',
								rp_4            = '$rp_4',
								rp_5            = '$rp_5' ";
sql_query($sql);

$result_url = G5_URL;

if ($file_upload_msg)
    alert($file_upload_msg, $result_url);
else
    alert('신고가 접수되었습니다.', $result_url);
?>
