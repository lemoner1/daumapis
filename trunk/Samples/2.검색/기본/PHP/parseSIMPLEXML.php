<?php

// Parsing Daum OpenAPI REST Web Service results using
// SimpleXML extension. PHP5 only.
// Author: Rasmus Lerdorf, Yahoo! Inc.
//         Sang-Kil Park, Daum Communications Corp.

error_reporting(E_ALL);

$request = 'http://apis.daum.net/search/blog?apikey=[����� ����Ű]&q='.urlencode('����');

$response = file_get_contents($request);

if ($response === false) {
	die('Request failed');
}

$phpobject = simplexml_load_string($response);

if ($phpobject === false) {
	die('Parsing failed');
}

// Output the data
// SimpleXML returns the data as a SimpleXML object
$channel = $phpobject->channel;

echo "<h1>".$channel->title."</h1><br />";
echo "<h2>�˻����: ".$channel->totalCount."</h2><br />";

foreach($channel->item as $value) {
	echo "����: ".$value->title."<br />";	
	echo "����: ".$value->description."<br />";
	echo "<hr />";
}
?>