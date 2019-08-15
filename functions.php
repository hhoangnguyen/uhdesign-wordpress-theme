<?php
/**
 * Autoload classes
 * @param $class
 */
function autoload($class) {
    $classPath = str_replace('\\', '/', $class);
    $fileName = __DIR__ . '/classes/' . $classPath . '.php';
    if (file_exists($fileName)) {
        include $fileName;
    }
    else {
        exit($fileName. ' does not exist');
    }
}
spl_autoload_register('autoload');