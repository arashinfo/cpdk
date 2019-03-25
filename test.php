
<?php

require_once './vendor/autoload.php';

use Arashinfo\Cpdk;

$server = new Cpdk\ServerInfo();
$db = new Cpdk\MySqli('localhost', 'root', 'root', 'test');



echo $server->getHttpHost();
echo $server->getScriptName();
echo $server->getRemoteAddr();
echo $server->getRequestMethod();
