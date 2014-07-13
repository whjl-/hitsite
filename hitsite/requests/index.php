<style>
table,th,td{
	border:1px solid black;
	padding: 5px;
}
</style>
<?php
error_reporting(0);
date_default_timezone_set("Europe/London");
$directory = './';
if (! is_dir($directory)) {
	exit('Invalid diretory path');
}
$files = array();
foreach (scandir($directory) as $file) {
	if ('.' === $file) continue;
	if ('..' === $file) continue;
	$files[] = $file;
}
usort($files, function ($a, $b){
	return substr($b, 0, 10) - substr($a, 0, 10);
});
?>
<table>
<tr><td><b>Time / Date GMT (m/d/y)</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>IP</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>Country</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>Region</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>City</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>ZIP / Postal Code</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>ISP</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>Org</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>As</b>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<?php
$i = 0;
while($i < count($files)-1){
	$file = file_get_contents($directory.$files[$i]);
	$filedata = unserialize($file);
	$timestamp = substr($files[$i], 0, 10);
	print("<tr><td>".date('m/d/Y H:i:s', $timestamp)."</td><td>".$filedata['ip']."</td><td>".$filedata['country']."</td><td>".$filedata['region']."</td><td>".$filedata['city']."</td><td>".$filedata['zip']."</td><td>".$filedata['isp']."</td><td>".$filedata['org']."</td><td>".$filedata['as']."</td></tr>");
	$i = $i + 1;
}
?>
</table>