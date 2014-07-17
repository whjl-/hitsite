hitsite
=======
hitsite is a very useful PHP plugin that you can use to easily manage your site requests.
###Installation
<hr>
1) Download the zip file located to the left of this page or [here](https://github.com/wlangford/hitsite/archive/master.zip).<br>
2) Unzip and place the 'hitsite' folder (sometimes inside the 'hidsite-master' folder generated by GitHub) in the same directory as the page you want to track visits to.<br>
3) Include this line in the PHP file you wish to monitor:<br>
<code>
<?php
require_once('hitsite/hitsite.php');
?>
</code><br>
4) SSH into your server and 'cd' into the directory that you placed the 'hitsite' folder and chmod the 'requests' folder (located within the 'hitsite' folder) like this:<br>
<code>
sudo chmod -R 777 requests/
</code> <br>
<i>Note: If that fails to work then try this: </i><br>
<code>
sudo chown -R [the username that your webserver runs as (e.g. www-data/apache/etc...)] requests/
</code> 
<br>
You can also run <code>bower install hitsite</code> if you use bower, in which case the file you wish to track would have this line at the top:<br>
<code>
<?php
require_once('bower_components/hitsite/hitsite/hitsite.php');
?>
</code>
<br><br>
###Usage
<hr>
Whenever someone visits the page in which you included the line in step 4 they will be logged in this page <b>/hitsite/requests/</b> and you will need to enter a password to access. By default this password will be 'password', to change this edit the <b>/hitsite/requests/index.php</b> page. You may also change your timezone in here from GMT/UTC by default.
<br><br>
###Troubleshooting
<hr>
If you're having issues it is likely to be permissions problems, check step 4 or email me at langfordwill1@gmail.com<br><br>
If warnings are displayed on you page but the plugin works put this line on the troblesome page:<br>
<code>
error_reporting(E_ERROR | E_PARSE);
</code>
