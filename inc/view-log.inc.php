<?
if (file_exists("./log/".PATH_LOG)){
    while ($text = filesize(PATH_LOG)){
        $output = fgets($text);
    }
}
var_dump($output);
