<?php
$ip = $_SERVER["REMOTE_ADDR"];
$filesafeip = str_replace(".", "_", $ip);
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success'){
	$country = $query['country'];
	$region = $query['regionName'];
	$city = $query['city'];
	$zip = $query['zip'];
	$isp = $query['isp'];
	$org = $query['org'];
	$as = $query['as'];
	$data = array("ip" => $ip, "country" => $country, "region" => $region, "city" => $city, "zip" => $zip, "isp" => $isp, "org" => $org, "as" => $as);
	$dir = "hitsite/requests/";
	$timestamp = str_replace(".", "", number_format((float)microtime(true), 2, '.', ''));
	file_put_contents($dir.$timestamp."-".$filesafeip, serialize($data));
}else{
	echo "Failure";
}
?>