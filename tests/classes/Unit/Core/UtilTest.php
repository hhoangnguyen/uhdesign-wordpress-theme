<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/15/2019
 * Time: 2:09 PM
 */

namespace Unit\Core;


use UhDesign\Core\Util;
use UhDesign\Element\Constant;
use UhDesign\Element\Factory;
use Unit\BaseTest;

class UtilTest extends BaseTest
{
    public function testGetReflectionNull()
    {
        $class = 'Not\A\Real\Class';
        self::assertNull(Util::getReflection($class));
    }

    public function testGetReflection()
    {
        $element = Factory::create(Constant::ELEMENT_NUMBER);
        self::assertInstanceOf(\ReflectionClass::class, Util::getReflection($element));
    }

    public function testIsJson()
    {
        $data = "";
        self::assertFalse(Util::isJson($data));
    }
}