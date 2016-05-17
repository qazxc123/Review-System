<?php
header ("Content-Type: text/html; charset=UTF-8");
function searchWeb( $query ){
    $acctKey = 's0sjwRT2ro3Jxgs1DTeivoYOONRFKkXSrQY65UkSStQ'; //金鑰
    $query = urlencode($query);
    $Uri = 'https://api.datamarket.azure.com/Bing/Search/v1/Web?'.'$format=json&Query=%27'.$query.'%27';
    $auth = base64_encode("$acctKey:$acctKey");
    $opts = array(
        'http' => array(
		'request_fulluri' => true,	
        'ignore_errors' => false,
        'header' => "Authorization: Basic $auth"
        )
    );
    $context = stream_context_create($opts);
    $response = file_get_contents($Uri, false, $context);
    $ob = json_decode($response);
    return $ob->d->results;
}


$data = searchWeb('12-8卡提諾');
foreach($data as $v) {
    $v = mysql_escape_string($v->Title);
	echo $v;
    echo '<br>';
    echo $v->Description;
    echo '<br>';
    echo $v->Url;
    echo '<br>';
    echo $v->DisplayUrl;
    echo '<br><br>';
}
?>
