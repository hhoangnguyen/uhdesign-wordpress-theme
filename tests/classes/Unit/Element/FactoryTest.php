<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/15/2019
 * Time: 5:35 PM
 */

namespace Unit\Element;


use UhDesign\Core\BaseElement;
use UhDesign\Element\Constant;
use UhDesign\Element\Factory;
use UhDesign\Element\Field;
use UhDesign\Element\Field\Number;
use UhDesign\Element\Field\Text;
use UhDesign\Element\Group;
use UhDesign\Element\Section;
use Unit\BaseTest;
use Unit\Element\Field\Dummy;

class FactoryTest extends BaseTest
{
    public function testCreateNull()
    {
        $element = Factory::create(self::RANDOM_STRING);
        self::assertNull($element);
    }

    public function testCreateDummy()
    {
        $element = Factory::create(Constant::DUMMY);
        self::assertInstanceOf(Dummy::class, $element);
        self::assertInstanceOf(Dummy::class, $element);
        self::assertInstanceOf(BaseElement::class, $element);
    }

    public function testCreateField()
    {
        $element = Factory::create(Constant::ELEMENT_TEXT);
        self::assertInstanceOf(Text::class, $element);
        $element = Factory::create(Constant::ELEMENT_NUMBER);
        self::assertInstanceOf(Number::class, $element);

        self::assertInstanceOf(Field::class, $element);
        self::assertInstanceOf(BaseElement::class, $element);
    }

    public function testCreateGroup()
    {
        $element = Factory::create(Constant::GROUP);
        self::assertInstanceOf(Group::class, $element);
        self::assertInstanceOf(BaseElement::class, $element);
    }

    public function testCreateSection()
    {
        $element = Factory::create(Constant::SECTION);
        self::assertInstanceOf(Section::class, $element);
        self::assertInstanceOf(Group::class, $element);
        self::assertInstanceOf(BaseElement::class, $element);
    }
}