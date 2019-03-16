
<?php
require_once './vendor/autoload.php';

use Arashinfo\Cpdk;

$server = new Cpdk\ServerInfo();



echo $server->getHttpHost();
echo $server->getScriptName();
echo $server->getRemoteAddr();
echo $server->getRequestMethod();
