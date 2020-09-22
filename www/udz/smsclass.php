<?
class SMS
{

	//Work Keynoty 계정 정보
	var $accessKey = 'r4UhpX9tHVVeezprJbeF'; //x-ncp-iam-access-key
	// var $authKey = 'ArlgNBq4jmMp8TyibOEz';//X-NCP-auth-key;
	var $secretKey = 'wiaqZv40DZT4kloOib0zSyHwNHjlvOtahVbwutVk'; //X-NCP-service-secret;
	var $serviceId = 'ncp:sms:kr:259699115164:cleankbo'; //serviceId

	var $contentType = "COMM";
	var $type = "sms";
	// var $type = "sms";
	var $countryCode = "82";

	var $from = "0234604600";
	var $to = [];

	var $subject = "";
	var $content = "";
	var $timestamp = "";
	var $signiture = "";
	var $reserveTime = "";
	var $method = "POST";
	var $json = "";
	var $fileName = "";
	var $fileBody = "";
	var $multi = false;

	var $host = "https://sens.apigw.ntruss.com";
	var $url = "/sms/v2/services/{serviceId}/messages";
	var $reservationUrl = "/sms/v2/services/{serviceId}/reservations/";
	function __construct ($accessKey=null,$secretKey=null,$serviceId=null,$plusFriendId=null,$method="POST") {
		if ($accessKey) $this->accessKey = $accessKey;
		if ($secretKey) $this->secretKey = $secretKey;
		if ($serviceId) $this->serviceId = $serviceId;
		if ($method) $this->method = $method;
		$this->timestamp = round( microtime( true ) * 1000 );
		// p ($this->timestamp);
		$this->url = str_replace("{serviceId}",$this->serviceId,$this->url);
		$this->reservationUrl = str_replace("{serviceId}",$this->serviceId,$this->reservationUrl);
	}
	function setType($type) {
		// p ("setNumber");
		$this->type = $type;
		return $this;
	}
	function setNumber($number) {
		// p ("setNumber");
		$this->to = str_replace("-","",$number);
		return $this;
	}
	function setFrom($number) {
		// p ("setNumber");
		$this->from = str_replace("-","",$number);
		return $this;
	}	
	function setSubject($subject) {
		// p ("setNumber");
		$this->subject = $subject;
		return $this;
	}	
	function setReserveTime($dateTime=null) {
		// yyyy-MM-dd HH:mm
		// p ($dateTime);
		$this->reserveTime = $dateTime;
		// $this->reserveTime = "2020-06-27 04:40";
		return $this;
	}
	function setMulti($multi=true) {
		$this->multi = $multi;
		return $this;
	}	
	function setFile($fileName,$fileBody) {
		$this->setType("MMS");
		$this->fileName = $fileName;
		$this->fileBody = $fileBody;
		return $this;
	}	
	function setMsg($content) {
		// $this->content = str_replace("\r\n",'\r\n',$content);
		$this->content = $content;
		if (mb_strlen($content, 'euc-kr')<=80) $this->setType("SMS"); 
		return $this;
	}
	function setMessages($messages) {
		// $this->content = str_replace("\r\n",'\r\n',$content);
		$this->messages = $messages;
		return $this;
	}
	function check ($reserveId) {

		$this->signiture = base64_encode(
			hash_hmac(
				'sha256', // Hmac 중 sha256으로 해시를 생성함
				$this->method." "   // POST로 데이터를 보냄. (아래 cURL 참조)
				.$this->reservationUrl.$reserveId.'/reserve-status' // /sms/v2/~~~~~/messages
				.PHP_EOL
				.$this->timestamp  // 13453245632 (타임스탬프 값)
				.PHP_EOL
				.$this->accessKey,
				$this->secretKey,
				true
			)
		);
	    $headers = array (
	    	'accept: application/json; charset=UTF-8',
	    	'x-ncp-apigw-timestamp:'.$this->timestamp,	
	    	'x-ncp-iam-access-key:'.$this->accessKey,
	    	'x-ncp-apigw-signature-v2:'.$this->signiture,
	    	'Content-Type: application/json; charset=utf-8');
	    // print_r($headers);
	    $ch = curl_init ();
	    // p ($this->host.$this->url);
	    // p ($this->host.$this->reservationUrl.$reserveId);
	    curl_setopt ( $ch, CURLOPT_URL, $this->host.$this->reservationUrl.$reserveId.'/reserve-status' );
	    // curl_setopt ( $ch, CURLOPT_POST, true );
	    // curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
	    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
	    // curl_setopt ( $ch, CURLOPT_POSTFIELDS, $json );

	    $result = curl_exec ( $ch );
	    curl_close ( $ch );
	    return $result;
	}
	function cancel ($reserveId) {

		$this->signiture = base64_encode(
			hash_hmac(
				'sha256', // Hmac 중 sha256으로 해시를 생성함
				$this->method." "   // POST로 데이터를 보냄. (아래 cURL 참조)
				.$this->reservationUrl.$reserveId // /alimtalk/v2/~~~~~/messages
				.PHP_EOL
				.$this->timestamp  // 13453245632 (타임스탬프 값)
				.PHP_EOL
				.$this->accessKey,
				$this->secretKey,
				true
			)
		);
	    $headers = array (
	    	'accept: application/json; charset=UTF-8',
	    	'x-ncp-apigw-timestamp:'.$this->timestamp,	
	    	'x-ncp-iam-access-key:'.$this->accessKey,
	    	'x-ncp-apigw-signature-v2:'.$this->signiture,
	    	'Content-Type: application/json; charset=utf-8');
	    print_r($headers);
	    $ch = curl_init ();
	    // p ($this->host.$this->url);
	    // p ($this->host.$this->reservationUrl.$reserveId);
	    curl_setopt ( $ch, CURLOPT_URL, $this->host.$this->reservationUrl.$reserveId );
	    // curl_setopt ( $ch, CURLOPT_POST, true );
	    // curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
	    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );
	    // curl_setopt ( $ch, CURLOPT_POSTFIELDS, $json );

	    $result = curl_exec ( $ch );
	    curl_close ( $ch );
	    return $result;
	}

	function send () {
		$this->signiture = base64_encode(
			hash_hmac(
				'sha256', // Hmac 중 sha256으로 해시를 생성함
				$this->method." "   // POST로 데이터를 보냄. (아래 cURL 참조)
				.$this->url // /alimtalk/v2/~~~~~/messages
				.PHP_EOL
				.$this->timestamp  // 13453245632 (타임스탬프 값)
				.PHP_EOL
				.$this->accessKey,
				$this->secretKey,
				true
			)
		);

		if ($this->multi) {
		    $json = (object)[
			    "type"=>$this->type,
			    "contentType"=>$this->contentType,
			    "countryCode"=>$this->countryCode,
			    "from"=>$this->from,
			    "subject"=>".",
			    "content"=>".",
			    "messages"=>
			    	$this->messages
			    
			];

		} else {
		    $json = (object)[
			    "type"=>$this->type,
			    "contentType"=>$this->contentType,
			    "countryCode"=>$this->countryCode,
			    "from"=>$this->from,
			    "subject"=>$this->subject,
			    "content"=>$this->content,
			    "messages"=>[
			        (object)[
			            "subject"=>$this->subject,
			            "to"=>$this->to,
			            "content"=>$this->content
			        ]
			    ]
			];
		}
		// print_r($json);

		if ($this->fileBody) {
			$json->files = [
		        (object)[
		            "name"=>$this->fileName,
		            "body"=>$this->fileBody
		        ]
		    ];
		}
		if ($this->reserveTime) $json->reserveTime = $this->reserveTime;
 
		$json = json_encode($json);
		$this->json = $json;

	    $headers = array (
	    	'accept: application/json; charset=UTF-8',
	    	'x-ncp-apigw-timestamp:'.$this->timestamp,	
	    	'x-ncp-iam-access-key:'.$this->accessKey,
	    	'x-ncp-apigw-signature-v2:'.$this->signiture,
	    	'Content-Type: application/json; charset=utf-8');

	    $ch = curl_init ();
	    curl_setopt ( $ch, CURLOPT_URL, $this->host.$this->url );
	    curl_setopt ( $ch, CURLOPT_POST, true );
	    // curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
	    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
	    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $json );

	    $result = curl_exec ( $ch );
	    curl_close ( $ch );
	    return $result;
	}

}