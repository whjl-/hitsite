hitsite
=======
hitsite is a very useful PHP plugin that you can use to easily manage your site requests.
##Installation
1) Download the zip file located to the left of this page or [here](https://github.com/wlangford/hitsite/archive/master.zip).<br>
2) Unzip and place the 'hitsite' folder in the same directory as the page you want to track visits to.<br>
3) Include this line in the PHP file you wish to monitor:<br>
<code>
<?php
require_once('hitsite/hitsite.php');
?>
</code>
4) SSH into your server and 'cd' into the directory that you placed the 'hitsite' folder and chmod the 'requests' folder like this:<br>
<code>
sudo chmod -R 777 requests/
</code> <br>
<i>Note: If this fails to work then try this: </i><br>
<code>
sudo chown -R [the username that your webserver runs as (e.g. www-data/apache/etc...)] requests/
</code> 
