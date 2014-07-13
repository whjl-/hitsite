<?php
$ip = $_SERVER["REMOTE_ADDR"];
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success'){
	$country = $query['country'];
	$region = $query['regionName'];
	$city = $query['city'];
	$zip = $query['zip'];
	$isp = $query['isp'];
	$org = $query['org'];
	$as = $query['as'];
}else{
	echo "Failure";
}
?>