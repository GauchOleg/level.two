<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.07.2017
 * Time: 15:16
 */
/*********************/
print_r(scandir('.'));
exit;
/********************/
$dir = opendir('.');
while ($name = readdir($dir)){
    if (is_dir($name)){
        if ($name == '.' or $name == '..'){
            continue;
        }
        echo 'DIR' . $name . '<br>';
    }else{
        echo 'File: ' . $name . '<br>';
    }
}
closedir($dir);