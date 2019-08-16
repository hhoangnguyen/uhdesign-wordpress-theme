<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/15/2019
 * Time: 9:40 AM
 */

namespace Unit;


use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    const RANDOM_STRING = 'this is a random string abcdefghijklmnopqrstuvwxyz';

    /**
     * Helper static method to get protected/private methods for unit test
     *
     * @param $className
     * @param $methodName
     *
     * @return null|\ReflectionMethod
     */
    public static function getMethod($className, $methodName)
    {
        try {
            $class = new \ReflectionClass($className);
            $method = $class->getMethod($methodName);
            $method->setAccessible(true);

            return $method;
        } catch (\ReflectionException $e) {
            return null;
        }
    }

    /**
     * Just a dummy test to make sure BaseTest has test case
     */
    public function testDummy()
    {
        $this->assertTrue(true);
    }
}