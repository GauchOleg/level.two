<?
if (file_exists("./log/".PATH_LOG)){
    $stream = fopen("./log/".PATH_LOG, 'r');
    while ($string = fgets($stream)){
        echo '<ol>' . $string . '<br>' . '</ol>';
    }
    fclose($stream);
}
