<?php
  include_once('./_common.php');
  $g5['title'] = '코로나 19 자가 점검표(COVID-19 Self Diagnosis)';
  $gnb_css = 'info';
  include_once(G5_THEME_PATH.'/head.php');
  $img_url = G5_IMG_URL.'/pc';
if($member['mb_id'] == ""){
  echo "<script>alert('로그인이 필요한 서비스입니다.');location.replace('/bbs/login.php')</script>";
  exit;
}
if(G5_IS_MOBILE){ 
    echo("<script>location.replace('/m/covid19.php')</script>");
}
?>
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL?>/pikaday.css" crossorigin="anonymous">
 <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script src="<?php echo G5_JS_URL?>/pikaday.js" type="text/javascript"></script>
<script src="<?php echo G5_JS_URL?>/pikaday.jquery.js" type="text/javascript"></script>

<!-- <form name="selfdiag" id="self" method="POST"  enctype="multipart/form-data" autocomplete="off"> -->
<div id="selfDiag">
  <img src="<?php echo $img_url; ?>/covid_title.jpg">
  <div class="covid">
<div id="profile">
  <table class="table profile">
    <tr>
      <td scope="col" class="label">점검자</td>
      <td scope="col"><?php echo $member['mb_name']?></td>
      <td scope="col" class="label">점검일시</td>
      <td scope="col" colspan="2" style="position:relative;"> <img src="<?php echo G5_IMG_URL?>/calendar.png?v=202005010142"> <input type="text" id="datepicker" name="date" value="" placeholder="날짜를 지정하세요"></td>
    </tr>
    <tr>
      <td class="label">회원구분</td>
      <td><?php echo $member['mb_1']?></td>
      <td class="label">소속</td>
      <td><?php echo $member['mb_2']?></td>
    </tr>
    <?php if($member['mb_3']){ ?>
         <tr>
      <td class="label">소속업체</td>
      <td colspan="3"><?php echo $member['mb_3']?></td>
    </tr>
    <?php } ?>       
     <tr>
      <td class="label">전달사항</td>
      <td colspan="3">코로나19 자가점검 (매일 오전 11시 50분 전까지 작성하여 제출)</td>
    </tr>
</table>
<button type="button" class="btn" id="btn_search">조 회</button>
</div>

  <input type="hidden" name="memberid" value="<?php echo $member['mb_id']?>">
<div class="survey">
<table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">항목</th>
      <th scope="col">점검사항</th>
      <th scope="col" colspan="2">점검내용</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" rowspan="10">1</th>
      <td rowspan="10">증상종류<br>(Symptoms)</td>
      <td rowspan="10">어제 이후 본인 또는 본인의 동거인 중 아래의 증상이 발생된 경우가 있습니까?
<span>(Within the last day, have you or any family member(s) experience any of the following symptoms?)</span>
<span class="ref"># 중복체크 가능(Choose one or more)</span></td>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="0"></td>
       <td>발열-37.5℃이상<br>(Fever-37.5℃ or over)</td>
    </tr>
    <tr>
    <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="1"></td>
      <td>기침<br>(Dry cough)</td>
    </tr>
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="2"></td>
      <td>인후통<br>(Throat pain or discomfort)</td>
    </tr>  
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="3"></td> 
      <td>권태감<br>(Fatigue)</td>
    </tr>  
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="4"></td> 
      <td>가래<br>(Thick mucus/phlegm)</td>
    </tr>    
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="5"></td>
      <td>호흡곤란 및 폐렴<br>(Difficulty with breathing or pneumonia)</td>
    </tr> 
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="6"></td>
      <td>두통<br>(Headache)</td>
    </tr>    
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="7"></td>
      <td>객혈, 오심<br>(Hemoptysis, nausea)</td>
    </tr>    
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="8"></td>
      <td>설사<br>(Diarrhea)</td>
    </tr>   
    <tr>
      <td><input type="checkbox" class="symptoms checkbox" name="val1[]" value="9"></td>
      <td>없음( NO )</td>
    </tr>
    <tr>
      <th scope="row" rowspan="2">2</th>
      <td rowspan="2">대면접촉 유무<br>(Close Contact)</td>
      <td rowspan="2">어제 이후 본인 또는 본인의 동거인 중 확진자 또는 앞선 질문의 증상들이 나타난 유증상자와 대면 접촉한 적이 있습니까?
<span>(Within the last day, have you or any family member(s) have come into close contact with a person tested positive for COVID-19 or under investigation with the above symptoms?)</span></td>
      <td><input type="checkbox" class="close checkbox" name="val2" value="0"></td>
       <td>예( YES )</td>
    </tr>
    <tr>
      <td><input type="checkbox" class="close checkbox" name="val2" value="1"></td>
      <td>없음( NO )</td>
    </tr>
    <tr>
      <th scope="row" rowspan="2">3</th>
      <td rowspan="2">확진자 동선 방문여부<br>(Possible Exposure)</td>
      <td rowspan="2">어제 이후 본인 또는 본인 동거인 중 확진자가 다녀간 곳이나 해당 동선을 방문한 적 있나요?
<span>(Within the last day, have you or any family member(s) visited areas affected with COVID-19)</span></td>
    <td><input type="checkbox" class="socialdistance checkbox" name="val3" value="0"></td>
       <td>예( YES )</td>
    </tr>
    <tr>
      <td><input type="checkbox" class="socialdistance checkbox" name="val3" value="1"></td>
      <td>없음( NO )</td>
    </tr>
    <tr>
      <th scope="row" rowspan="2">4</th>
      <td rowspan="2">기본수칙 준수유무<br>(Preventative Measures)</td>
      <td rowspan="2">어제 본인은 마스크 상시 착용, 손 청결 유지 등 코로나19 감염증 예방 기본 수칙을 준수하셨습니까?<br>
<span>(Within the last day, have you followed all the preventative measures for COVID-19, such as wearing masks and taking 
care of hand hygiene?)</span></td>
       <td><input type="checkbox" class="preventative checkbox" name="val4" value="0"></td>
       <td>예( YES )</td>
    </tr>
    <tr>
      <td><input type="checkbox" class="preventative checkbox" name="val4" value="1"></td>
      <td>아니오( NO )</td>
    </tr>
        <tr>
      <th scope="row">5</th>
      <td>의심사항 보고<br>(immediate Report)</td>
      <td>2~3번 항목에 “예”로 대답한 경우 또는 특이사항이 있거나 코로나19 감염에 대한 걱정/의심이 되는 상황이 있다면 대면 접촉자, 장소, 시간 등을 구단 혹은 KBO 코로나19 담당자/관리자에게 바로 알려주시기 바라며, 필요시 질병관리본부 콜센터(☎1339, 지역번호+120), 관할보건소 문의 및 선별진료소 방문 등을 통해 전문 의료인의 진료를 받기 바랍니다. 
<span>(If you or any family member(s) answered “Yes” to Question 2~3, and begin to develop concerns or COVID-19 related symptoms, please reach out to KBO or your club immediately for guidance with all necessary location tracking information, and also consult with KCDC Call Center at 1339, a local code+120 or a local health center if necessary.)</span></td>
     <td><input type="checkbox" class="checkbox" name="val5" value="0" disabled></td>
       <td>예<br>(Will do)</td>
    </tr>
  </tbody>
</table>
<?php if($member['mb_4'] != 'y'){ ?>
<p id="p-agree">개인정보 활용에 동의합니다.<input type="checkbox" name="GPDR" value="y"><span id="agree">전문보기</span></p> 
<?php } ?>
<?php if($member['mb_5'] != 'y'){ ?>
<p id="p-agree">KBO 코로나19 자가점검 관련 SMS 수신 및 PUSH 서비스에 동의합니다.<input type="checkbox" name="SMS" value="y"></p> 
<?php } ?>
<p id="sponsorby">※ 본 사업은 문화체육관광부와 국민체육진흥공단의 재정후원을 받았습니다.</p>
<p id="sponsorby">※ 질병관리본부(KCDC) 홈페이지 <a href="http://www.cdc.go.kr/cdc" target="_blank">[바로가기]</a></p>
</div>
</div>
<div class="btns">
<button type="button" class="btn" id="btn_submit">제 출</button>
<button type="button" class="btn" id="btn_modify">수 정</button>
</div>

<!-- <button type="button" class="btn" id="btn_modify">수 정</button> -->


<div id="agreeContent">
  <span id="close-agree">&times;</span>
  <textarea readonly>
    [코로나19 자가점검 관련 개인정보 수집 및 이용에 대한 안내]
1. 수집하는 개인정보 항목
KBO클린베이스볼은 회원에게 다양한 서비스를 제공하기 위해 다음과 같은 개인정보를 수집하고 있습니다.
• ο 개인회원 : 이름 , 생년월일(주민등록상), 로그인ID , 비밀번호 , 전화번호 , 휴대전화번호 , 주소 , 이메일 , 본인인증값 , 성별 , 서비스 이용기록 , 접속 로그 
• ο 개인정보 수집방법 : 홈페이지(회원가입), '쿠키(cookie)'나 로그에 의한 정보, 상담 요청 정보(전화, 이메일, 게시판 등)
• ο 모바일 이용 시: 폰 주소록, 위치 정보(현 위치 기능 이용 시)는 회원의 동의 시 수집 

또한 서비스 이용 과정에서 아래와 같은 정보들이 자동으로 생성되어 수집될 수 있습니다. 
IP address, 쿠키, 방문 일시, 서비스 이용 기록, 불량 이용 기록, 기기 정보 
2. 개인정보의 수집 및 이용목적
KBO 클린베이스볼 수집한 개인정보를 회원 신분 및 서비스 이용의사 확인을 위하여 다음의 목적에서 활용합니다.
• ο 회원 관리 
o 회원제 서비스 이용에 따른 본인 확인, 개인 식별, 불량회원의 부정 이용 방지와 비인가 사용 방지, 가입 의사 확인, 가입 횟수 제한, 연령 확인, 만 14세 미만 아동 개인정보 수집 시 법정 대리인 동의여부 확인, 불만 처리 등 민원 처리, 고지사항 전달, 탈퇴의사 확인
• ο 코로나19 자가점검에 활용 
o 코로나19(COVID-19) 자가점검에 한하여, 접속 여부 또는 회원의 서비스 이용에 대한 통계

KBO 클린베이스볼은 수집한 개인정보를 수집 및 이용목적 외의 다른 용도로 이용하거나 회원의 동의 없이 제3자에게 이를 제공하지 않습니다. 
3. 개인정보의 보유 및 이용기간
원칙적으로, 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 다음의 정보에 대해서는 아래의 이유로 명시한 기간 동안 보존합니다.
보존 항목 : 로그인ID
보존 근거 : 컨텐츠 이용ID 중복방지
보존 기간 : 1년
보존 항목 : 본인인증값
보존 근거 : 악용목적에 의한 가입 및 탈퇴방지
보존 기간 : 탈퇴일로 3일

보존 항목 : 부정이용 기록
보존 근거 : 부정방지 이용
보존 기간 : 1년

그리고 관계법령의 규정에 의하여 보존할 필요가 있는 경우 KBO 클린베이스볼은 아래와 같이 관계법령에서 정한 일정한 기간 동안, 해당 법령이 정하는 보존 방법에 따라 회원정보를 보관합니다.
보존 항목 : 웹사이트 방문기록
보존 근거 : 통신비밀보호법 제2조 제11호 마목 및 사목, 제15조의2 제2항, 동법 시행령 제41조 제2항 제2호
보존 기간 : 1년

4. 개인정보의 파기절차 및 방법
KBO 클린베이스볼은 원칙적으로 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 파기절차 및 방법은 다음과 같습니다.
• ο 파기절차 
o 회원님이 회원가입 등을 위해 입력하신 정보는 목적이 달성된 후 별도의 DB로 옮겨져(종이의 경우 별도의 서류함) 내부 방침 및 기타 관련 법령에 의한 정보보호 사유에 따라(보유 및 이용기간 참조) 일정 기간 저장된 후 파기됩니다.별도 DB로 옮겨진 개인정보는 법률에 의한 경우가 아니고서는 보유되는 이외의 다른 목적으로 이용되지 않습니다.
• ο 파기방법 
o - 전자적 파일형태로 저장된 개인정보는 기록을 재생할 수 없는 기술적 방법을 사용하여 삭제합니다.
o - 종이에 출력된 개인정보는 분쇄기로 분쇄하거나 소각을 통하여 파기합니다.


5. 개인정보 수집·이용·제공에 대한 동의철회(회원탈퇴)
회원은 개인정보 수집,이용 및 제공에 대해 가입 시 동의하신 내용을 언제든지 철회하실 수 있습니다.
동의철회(회원탈퇴)는 홈페이지 상단에 있는 고객센터 > 회원탈퇴 메뉴를 클릭하여 본인확인 절차를 거치신 후 직접 탈퇴신청을 하시거나, 개인정보관리책임자에게 서면, 전화 또는 E-mail로 연락하시면 개인정보를 파기하는 등 필요한 조치를 하겠습니다.

6. 개인정보 제공
KBO 클린베이스볼은 이용자의 개인정보를 원칙적으로 외부에 제공하지 않습니다. 다만, 아래의 경우에는 예외로 합니다.
• - 이용자들이 사전에 동의한 경우
• - 법령의 규정에 의거하거나, 수사 목적으로 법령에 정해진 절차와 방법에 따라 수사기관의 요구가 있는 경우

7. 수집한 개인정보의 위탁
KBO 클린베이스볼은는 서비스 이행을 위해 아래와 같이 외부 전문업체에 위탁하여 운영하고 있습니다.
KBOP는 고객정보 취급을 위탁 받은 업체가 개인정보 보호와 관련 하여 제반의 조치를 취하도록 관리하고 있습니다.
• - 본인인증, 아이핀인증 : 오케이네임
• - 문자메세지 전송 : 뿌리오

8. 이용자 및 법정대리인의 권리와 그 행사 방법
이용자 및 법정 대리인은 언제든지 등록되어 있는 자신 혹은 당해 만 14세 미만 아동의 개인정보를 조회하거나 수정할 수 있으며 가입해지를 요청할 수도 있습니다.
이용자 혹은 만 14세 미만 아동의 개인정보 조회/수정을 위해서는 ‘개인정보변경’(또는 ‘회원정보수정’ 등)을 가입해지(동의철회)를 위해서는 “회원탈퇴”를 클릭 하여 본인 확인 절차를 거치신 후 직접 열람, 정정 또는 탈퇴가 가능합니다. 혹은 개인정보관리책임자에게 서면, 전화 또는 이메일로 연락하시면 지체 없이 조치하겠습니다.
귀하가 개인정보의 오류에 대한 정정을 요청하신 경우에는 정정을 완료하기 전까지 당해 개인정보를 이용 또는 제공하지 않습니다. 또한 잘못된 개인정보를 제3자 에게 이미 제공한 경우에는 정정 처리결과를 제3자에게 지체 없이 통지하여 정정이 이루어지도록 하겠습니다.
KBO 클린베이스볼은 이용자 혹은 법정 대리인의 요청에 의해 해지 또는 삭제된 개인정보에 대해 KBO클린베이스볼이 수집하는 개인정보의 보유 및 이용기간”에 명시된 바에 따라 처리하고 그 외의 용도로 열람 또는 이용할 수 없도록 처리하고 있습니다.

9. 이용자의 의무
이용자는 자신의 개인정보를 보호할 의무가 있으며, KBO 클린베이스볼의 귀책사유 없이 ID, 비밀번호, 접근매체 등의 양도·대여·분실이나 로그인 상태에서 이석 등 이용자 본인의 부주의나 브라우져 취약점, 관계법령에 의한 보안조치로 차단할 수 없는 방법이나 기술을 사용한 해킹 등 KBO 클린베이스볼의 상당한 주의에도 불구하고 통제할 수 없는 인터넷 상의 문제 등으로 개인정보가 유출되어 발생한 문제에 대해 회사는 일체의 책임을 지지 않습니다.
• 가. 이용자는 자신의 개인정보를 최신의 상태로 유지해야 하며, 이용자의 부정확한 정보 입력으로 발생하는 문제의 책임은 이용자 자신에게 있습니다.
• 나. 타인의 개인정보를 도용한 회원가입 또는 주민등록번호 등을 도용할 경우 마켓이용 금지 및 주민등록법에 의거하여 처벌될 수 있습니다.
• 다. 이용자는 아이디, 비밀번호 등에 대해 보안을 유지할 책임이 있으며 제3자에게 이를 양도하거나 대여할 수 없습니다.
• 라. 이용자는 KBO 클린베이스볼의 서비스를 이용한 후에는 반드시 로그인 계정을 종료하고 웹 브라우저 프로그램을 종료해야 합니다.
• 마. 이용자는 "정보 통신망 이용촉진 및 정보보호 등에 관한 법률", “개인정보보호법”, "주민등록법" 등 기타 개인정보에 관한 법률을 준수하여야 합니다.

10. 개인정보 자동수집 장치의 설치, 운영 및 그 거부에 관한 사항
KBO 클린베이스볼은 귀하의 정보를 수시로 저장하고 찾아내는 ‘쿠키(cookie)’ 등을 운용합니다. 쿠키란 KBO 클린베이스볼 웹사이트를 운영하는데 이용되는 서버가 귀하의 브라우저에 보내는 아주 작은 텍스트 파일로서 귀하의 컴퓨터 하드디스크에 저장됩니다. KBO 클린베이스볼은 다음과 같은 목적을 위해 쿠키를 사용합니다.
• ▶ 쿠키 등 사용 목적 
o - 회원과 비회원의 접속 빈도나 방문 시간 등을 분석, 이용자의 취향과 관심분야를 파악 및 자취 추적, 각종 이벤트 참여 정도 및 방문 회수 파악 등을 통한 타겟 마케팅 및 개인 맞춤 서비스 제공 귀하는 쿠키 설치에 대한 선택권을 가지고 있습니다. 따라서, 귀하는 웹 브라우저에서 옵션을 설정함으로써 모든 쿠키를 허용하거나, 쿠키가 저장될 때마다 확인을 거치거나, 아니면 모든 쿠키의 저장을 거부할 수도 있습니다.
• ▶ 쿠키 설정 거부 방법 
o 예: 쿠키 설정을 거부하는 방법으로는 회원님이 사용하시는 웹 브라우저의 옵션을 선택함으로써 모든 쿠키를 허용하거나 쿠키를 저장할 때마다 확인을 거치거나, 모든 쿠키의 저장을 거부할 수 있습니다.
o 설정방법 예 (인터넷 익스플로어의 경우)
o : 웹 브라우저 상단의 도구 > 인터넷 옵션 > 개인정보
o 단, 귀하께서 쿠키 설치를 거부하였을 경우 로그인이 되지 않거나, 예매가 불가하여 서비스 제공에 어려움이 있을 수 있습니다.

11. 개인정보에 관한 민원서비스
KBO 클린베이스볼을 이용함에 개인정보침해에 대한 신고나 상담이 필요하신 경우에는 아래 기관에 문의하시기 바랍니다.
• 1.개인분쟁조정위원회 (http://www.1336.or.kr/1336)
• 2.정보보호마크인증위원회 (http://www.eprivacy.or.kr/02-580-0533~4)
• 3.대검찰청 인터넷범죄수사센터 (http://www.spo.go.kr/02-3480-3600)
• 4.경찰청 사이버테러대응센터 (http://www.ctrc.go.kr/02-392-0330)

기타 개인정보에 관한 상담이 필요한 경우에는 개인정보침해신고센터로 문의하실 수 있습니다.

+ 개인정보침해신고센터
전화번호 :02-1336 (ARS 2번) / 팩스 : 02-405-4729 이메일: privacy@kisa.or.kr

(시행일) 본 방침은 코로나19 자가점검에 한하여 시행하며 2020년 4월 27일부터 시행됩니다.
</textarea>
</div>
</div>

<script>
    $('input[name="val1[]"]').eq(7).on('change', function() {
    if($('input[name="val1[]"]').eq(7).prop("checked")){ $('input[name="val1[]"]').prop("checked", false);$(this).prop("checked",true);}
  })
  $('.close').on('change', function() {
        $('.close').not(this).prop('checked', false);
        $('.socialdistance:checked').val() == 1 && $('.close:checked').val() == 1 ? $('input[name="val5"]').attr("disabled",true).prop('checked',false) : $('input[name="val5"]').prop( "disabled", false ) 
    });
  $('.socialdistance').on('change', function() {
        $('.socialdistance').not(this).prop('checked', false);
        $('.socialdistance:checked').val() == 1 && $('.close:checked').val() == 1 ? $('input[name="val5"]').attr("disabled",true).prop('checked',false) : $('input[name="val5"]').prop( "disabled", false ) 
    });
    $('.preventative').on('change', function() {
        $('.preventative').not(this).prop('checked', false);

    });

  function validate(){
      if($('#datepicker').val().length < 1) {
        alert("증상종류를 입력하세요");return false;
      }

      if($('.symptoms:checked').length < 1) {
        alert("증상종류를 입력하세요");return false;
      }

      if($('.close:checked').length != 1) {
        alert("대면접촉 유무를 입력하세요");return false;
      }

      if($('.socialdistance:checked').length != 1) {
        alert("외부접촉 유무를 입력하세요");return false;
      }

      if($('.preventative:checked').length != 1) {
        alert("기본수칙 준수유무를 입력하세요");return false;
     }
<?php if($member['mb_4'] != 'y') {?>
        if($('input[name="GPDR"]:checked').length != 1) {
        alert("개인 정보 활용에 동의해주세요");return false;
    }
  <?php } ?>
  <?php if($member['mb_5'] != 'y') {?>
        if($('input[name="SMS"]:checked').length != 1) {
        alert("KBO 코로나19 자가점검 관련 SMS 수신에 동의해주세요");return false;
    }
  <?php } ?>


     document.getElementById("btn_submit").disabled = "disabled";
     return true;
    }

      var idx, date,mid,val1=[],val2,val3,val4,val5,gpdr, sms,status,trigger;
// $('#calendar').pikaday({ firstDay: 1 });
  function insertVal(name, val){
    if(typeof(val) ==='object'){
     for(i in val){
      console.log($('input[name="'+name+'[]"]').eq(val[i]));
      $('input[name="'+name+'[]"]').eq(val[i]).prop("checked", true);
      }
    } else {
          val = parseInt(val);
        $('input[name="'+name+'"]').eq(val).prop("checked", true);
    }
  }

var field = document.getElementById('datepicker');
var picker = new Pikaday({
      field: document.getElementById('datepicker'),
      format: 'YYYY-MM-DD',
      maxDate: new Date(),
      onSelect: function(date) {
          field.value = picker.toString();
      }
});
picker.setDate(new Date());

$('#btn_search').click(function(){
        $.ajax({
            url: "./covid19_update.php",
            type: "POST",
            data: {
                "w":"wm",
                "mid": "<?php echo $member[mb_id] ?>",
                "date": $('input[name="date"]').val(),
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(response)
            {
                if (response.data !="")
                {
                response['data']['val1'] = response['data']['val1'].split(',');
                  for(k in response.data){
                    insertVal(k, response.data[k]);
                  }
               alert('작성된 자가 검진이 있습니다. 조회 하시고 수정하세요');
               idx = response.data['idx'];
               response['data']['val2'] == '0' || response['data']['val3'] == '0' ? $('input[name="val5"]').attr("disabled",false) : $('input[name="val5"]').attr("disabled",true)
               $('#btn_submit').hide();
               $('#btn_modify').show();
                }
                else
                {
                    alert('자가검진 내역이 없습니다. 작성해주세요');
                   $('input').prop('checked',false);
                   $('#btn_submit').show();
                   $('#btn_modify').hide();
                   document.getElementById("btn_submit").disabled = false;
                   document.getElementById("btn_modify").disabled = true;
                }
           },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
      });

     

        return true;
    })
$('#btn_submit').click(function(e){
   // e.preventDefault();
      $('input[name="val5"]').prop('checked') ? val5 = 0 : val5=1
   // $('input[name="val5"]:checked')
      $("input[name='val1[]']:checked").each(function() {
       val1.push($(this).val());
      });
      var alertv = val1.filter(function(element){return element == '7';})[0];
      if(alertv !='7' || $('input[name="val2"]:checked').val() =='0' || $('input[name="val3"]:checked').val() =='0' ) {
          trigger = 'y';
      } else {
        trigger = 'n';
      }
      val1 = val1.filter(function(a, b){ return val1.indexOf(a) === b;});
      if(validate() == false){
        return false;
      }
        $.ajax({
            url: "./covid19_update.php",
            type: "POST",
            data: {
                "w":"wr",
                "mid": "<?php echo $member[mb_id] ?>",
                "date": $('input[name="date"]').val(),
                "val1": val1.join(),
                "val2": $('input[name="val2"]:checked').val(),
                "val3": $('input[name="val3"]:checked').val(),
                "val4": $('input[name="val4"]:checked').val(),
                "val5": val5,
                "trigger": trigger,
                <?php if($member['mb_4'] != 'y') {?>
                "gpdr": $('input[name="GPDR"]:checked').val(),
                <?php } ?>
                <?php if($member['mb_5'] != 'y') {?>
                "sms": $('input[name="SMS"]:checked').val()
                <?php } ?>
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(response)
            {
                // user is logged in successfully in the back-end
                // let's redirect
                if (response.success == "1")
                {
                  alert($('input[name="date"]').val()+" 저장이 완료되었습니다");
                    // location.href = 'my_profile.php';
                    location.reload();
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
      });

      document.getElementById("btn_submit").disabled = "disabled";
    })
$('#btn_modify').click(function(){
   // e.preventDefault();
   $('input[name="val5"]').prop('checked') ? val5 = 0 : val5=1
      $("input[name='val1[]']:checked").each(function() {
       val1.push($(this).val());
      });
   var alertv = val1.filter(function(element){return element == '7';})[0];
      if(alertv !='7' || $('input[name="val2"]:checked').val() =='0' || $('input[name="val3"]:checked').val() =='0' ) {
          trigger = 'y';
      } else {
        trigger = 'n';
      }
      if(validate() == false){
        return false;
      }
        $.ajax({
            url: "./covid19_update.php",
            type: "POST",
            data: {
                "w":"wu",
                "idx": idx,
                "mid": "<?php echo $member[mb_id] ?>",
                "date": $('input[name="date"]').val(),
                "val1": val1.join(),
                "val2": $('input[name="val2"]:checked').val(),
                "val3": $('input[name="val3"]:checked').val(),
                "val4": $('input[name="val4"]:checked').val(),
                "val5": val5,
                "trigger":trigger,
                <?php if($member['mb_4'] != 'y') {?>
                "gpdr": $('input[name="GPDR"]:checked').val(),
                <?php } ?>
                <?php if($member['mb_5'] != 'y') {?>
                "sms": $('input[name="SMS"]:checked').val()
                <?php } ?>
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(response)
            {
                // user is logged in successfully in the back-end
                // let's redirect
                if (response.success == "1")
                {
                  alert($('input[name="date"]').val()+" 수정이 완료되었습니다");
                  location.reload();
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
      });

        // if (subject) {
        //     alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        //     f.wr_subject.focus();
        //     return false;
        // }

        // if (content) {
        //     alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        //     if (typeof(ed_wr_content) != "undefined")
        //         ed_wr_content.returnFalse();
        //     else
        //         f.wr_content.focus();
        //     return false;
        // }

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    })
$('#agree').click(function(){
  $('#agreeContent').show();
})
$('#close-agree').click(function(){
  $('#agreeContent').hide();
})
</script>
<Style>
  @charset "utf-8";
/* SIR 지운아빠 */
.btns {
  margin:0 auto 50px;
  text-align:center;
}
#p-agree {
  margin:10px 0 0 10px;
}
#p-agree  input {
  margin:10px;
}
#close-agree {
  font-size:50px;
  position: absolute;
  top:30px;
  right:30px;
  color:#fff;
}
#agreeContent {
  background:rgba(0,0,0,0.8);
  display:none;
  width:100%;
  height:100%;
  position:fixed;
  top:0;
  left:0;
}
#agreeContent textarea {
  transform:translate(-50%,-50%);
  display: block;
  margin-bottom: 10px;
  padding: 5px;
  width: 740px;
  min-height:500px;
  height:50%;
  border: 1px solid #e9e9e9;
  background: #f7f7f7;
  position:fixed;
  top:50%;
  left:50%;
  width:740px;
  height:50vh;
  padding:30px;
}
#agree {
  padding:5px 10px 3px 10px;
  background-color:red;
  border-radius:10px;
  color:#fff;
  margin:0 0 10px;
  display:inline-block;
}
#sponsorby {
  font-weight:800;
  margin:10px auto;
  text-align:left;
}
#container {
  background-color: #00143F;
}
table {
    border-collapse: collapse;
}
.table td, .table th {
  border:1px solid #969696;
  color:#474747;
  padding:15px;
}
.table td span {
  color:#004A99;
  display:block;
  padding:15px 0 0;
  font-size:12px;
  font-weight:300;
}
#profile {
  margin:50px auto 80px;
}
#profile button {
  margin:0 auto;
  display:table;
}
.profile {
  width:80%;
  margin:50px auto 0px;
  padding:30px;
  display:block;
}
.profile .label, .survey th {
  background-color: #00143F;
  color:#fff;
  font-weight: 800;
}
.profile td, .survey td {
  background-color:#fff;
  border:1px solid #969696;
    font-weight: 700;
    font-size:14px;
}

.survey th {
  text-align:center;
}
.profile td:nth-child(1), .profile td:nth-child(3) {
  width:20%;
}
.profile td:nth-child(2), .profile td:nth-child(4) {
  width:30%;
}
.survey tbody td, .survey tbody th {
   vertical-align:middle;
}
.survey tbody tr th:nth-child(1) {
  width:5%;
}
.survey tbody tr td:nth-child(2) {
  width:15%;
}
.survey tbody tr td:nth-child(3) {
  width:57%;
}
.survey tbody tr td:nth-child(4) {
  width:3%;
}
.survey tbody tr td:nth-child(5) {
  width:20%;
}
.covid {
  position:relative;
  background:#fff;
  padding:50px;
  margin:50px auto;
}
.covid::before {
  padding:10px;
  content:'';
  width:100%;
  height:100%;
  position:absolute;
  background:#BDBDBD;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%) rotate(2deg);
  opacity:.6;
  z-index:-1;
}

.table input {
  height:20px;
}
#datepicker {

}
#datepicker-button{
  position:absolute;
  right:15px;
}
.btn {
  display:inline-table;
  margin:30px 0 0;
  padding:10px 30px;
  text-align:center;
  background:#fff;
  border:1px solid #969696;
}

#submit.btn {
  background:#444;
  color:#fff;
}
#modify.btn {
  border:1px solid #121212;
  color:#000;
}
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
#selfDiag {padding: 40px 0 50px 0;width: 1050px;margin: 0 auto;position: relative;}
#selfDiag .menu_area{width: 100%;height: 100%;margin: 0 auto;}
#selfDiag .menu_area .menu_item{border: 1px solid #e4e4e4; width: 260px; font-size: 18px; float: left; text-align: center; cursor: pointer; }


</Style>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
