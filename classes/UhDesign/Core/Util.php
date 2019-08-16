<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/15/2019
 * Time: 2:06 PM
 */

namespace UhDesign\Core;


class Util
{
    /**
     * Get ReflectionClass for provided $class (same argument as in \ReflectionClass)
     *
     * @param mixed, $class
     *
     * @return null|\ReflectionClass
     *
     * @since 0.0.1
     */
    public static function getReflection($class)
    {
        try {
            $reflection = new \ReflectionClass($class);
        } catch (\ReflectionException $e) {
            $reflection = null;
        }

        return $reflection;
    }

    /**
     * Check if a string is valid json string
     *
     * @param $string
     *
     * @return bool
     *
     * @since 0.0.1
     */
    public static function isJson($string)
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
    }
}