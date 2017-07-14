<?
$dt = date("d/m/Y H:s:i");
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'];
$path = $dt . ' | ' . $page . ' | ' . $ref . "\n";
$log = fopen('./log/'.PATH_LOG, 'a+');
fwrite($log, $path);
fclose($log);