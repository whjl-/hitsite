<?php
session_start();




// Change these if you need to:

date_default_timezone_set("Europe/London");		// Change this to your timezone (NOTE: IT MUST FIT PHP STANDARDS, SEE HERE: http://php.net/manual/en/timezones.php)
$password = "password";							// Change this value to something that you'll remember (NOTE: IT IS NOT ENCRYPTED!)




error_reporting(0);if($_GET['logout']=="true"){session_destroy();$url=strtok('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'?');header('Location: '.$url,true,302);die();}if(!$_SESSION['un']){if($_POST['user']){if($_POST['user']==$password){$_SESSION['un']="password";header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],true,302);die();}}print("<form action='' method='POST'><input type='password' name='user' placeholder='Login'>&nbsp;&nbsp;&nbsp;<input type='submit' value='Login'></form>");die();}?>
<style>table,th,td{border:1px solid black;padding:5px;}</style><a href='?logout=true'>Logout</a><br><br><?php
$directory='./';if(!is_dir($directory)){exit('Invalid diretory path');}$files=array();foreach(scandir($directory)as $file){if('.'===$file)continue;if('..'===$file)continue;$files[]=$file;}usort($files,function($a,$b){return substr($b,0,10)-substr($a,0,10);});?>
<table><tr><td><b>Time / Date GMT (m/d/y)</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>IP</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>Country</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>Region</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>City</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>ZIP / Postal Code</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>ISP</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>Org</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td><b>As</b>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<?php
$i=0;while($i<count($files)-1){$file=file_get_contents($directory.$files[$i]);$filedata=unserialize($file);$timestamp=substr($files[$i],0,10);print("<tr><td>".date('m/d/Y H:i:s',$timestamp)."</td><td>".$filedata['ip']."</td><td>".$filedata['country']."</td><td>".$filedata['region']."</td><td>".$filedata['city']."</td><td>".$filedata['zip']."</td><td>".$filedata['isp']."</td><td>".$filedata['org']."</td><td>".$filedata['as']."</td></tr>");$i=$i+1;}?>
</table>