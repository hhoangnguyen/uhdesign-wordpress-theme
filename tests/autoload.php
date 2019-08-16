<?php
/**
 * Autoload test classes
 *
 * @param $class
 */
function autoloadUnit($class)
{
    $classPath = str_replace('\\', '/', $class);
    $fileName = __DIR__.'/classes/'.$classPath.'.php';
    if (file_exists($fileName)) {
        include $fileName;
    }
}

/**
 * Autoload regular classes
 *
 * @param $class
 */
function autoloadUhDesign($class)
{
    $classPath = str_replace('\\', '/', $class);
    $fileName = __DIR__.'/classes/'.$classPath.'.php';

    $fileName = str_replace('tests', '', $fileName);

    if (file_exists($fileName)) {
        include $fileName;
    }
}

spl_autoload_register('autoloadUnit');
spl_autoload_register('autoloadUhDesign');