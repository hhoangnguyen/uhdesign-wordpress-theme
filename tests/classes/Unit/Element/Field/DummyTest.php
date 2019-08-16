<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/15/2019
 * Time: 2:32 PM
 */

namespace Unit\Element\Field;


use UhDesign\Element\Constant;
use UhDesign\Element\Factory;
use Unit\BaseTest;

class DummyTest extends BaseTest
{
    public function testConstructorNullData()
    {
        /** @var Dummy $dummy */
        $dummy = Factory::create(Constant::DUMMY);
        self::assertSame($dummy->dummy, null);
        self::assertSame($dummy->dummy1, null);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorStringData()
    {
        Factory::create(Constant::DUMMY, self::RANDOM_STRING);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorArrayData()
    {
        $data = array('dummy' => 0, 'dummy1' => 1);
        Factory::create(Constant::DUMMY, $data);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorBooleanData()
    {
        Factory::create(Constant::DUMMY, true);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorIntData()
    {
        Factory::create(Constant::DUMMY, 3);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorEmptyString()
    {
        Factory::create(Constant::DUMMY, "");
    }

    public function testConstructorCurlyString()
    {
        /** @var Dummy $dummy */
        $dummy = Factory::create(Constant::DUMMY, "{}");
        self::assertSame($dummy->dummy, null);
        self::assertSame($dummy->dummy1, null);
    }

    public function testConstructorSquareString()
    {
        /** @var Dummy $dummy */
        $dummy = Factory::create(Constant::DUMMY, "[]");
        self::assertSame($dummy->dummy, null);
        self::assertSame($dummy->dummy1, null);
    }

    public function testConstructorGoodData()
    {
        $data = json_encode((object)array('dummy' => 0, 'dummy1' => 1));
        /** @var Dummy $dummy */
        $dummy = Factory::create(Constant::DUMMY, $data);
        self::assertSame($dummy->dummy, 0);
        self::assertSame($dummy->dummy1, 1);
    }

    public function testConstructorMissingData()
    {
        $data = (object)array('dummy' => 0);
        $dummy = new Dummy(json_encode($data));
        self::assertSame($dummy->dummy, 0);
        self::assertSame($dummy->dummy1, null);
    }

    public function testConstructorExtraData()
    {
        $data = (object)array('dummy' => 0, 'dummy1' => 1, 'dummy2' => 2);
        $dummy = new Dummy(json_encode($data));
        self::assertSame($dummy->dummy, 0);
        self::assertSame($dummy->dummy1, 1);
    }

    public function testToJsonGoodData()
    {
        $dataArray = array('dummy' => 0, 'dummy1' => 1);
        $dummy = new Dummy(json_encode($dataArray));
        self::assertSame($dummy->dummy, 0);
        self::assertSame($dummy->dummy1, 1);
    }

    public function testToJsonMissingData()
    {
        $dataArray = array('dummy' => 0);
        $dummy = new Dummy(json_encode($dataArray));

        $jsonString = $dummy->toJson();

        self::assertNotEquals($jsonString, json_encode($dataArray));

        $dataDummyArray = json_decode($jsonString);
        self::assertSame($dataDummyArray->dummy, 0);
        self::assertNull($dataDummyArray->dummy1);
    }

    public function testToJsonExtraData()
    {
        $dataArray = array('dummy' => 0, 'dummy1' => 1, 'dummy2' => 2);
        $dummy = new Dummy(json_encode($dataArray));
        $jsonString = $dummy->toJson();

        self::assertNotEquals($jsonString, json_encode($dataArray));

        $dataDummyArray = json_decode($jsonString);
        self::assertSame($dataDummyArray->dummy, 0);
        self::assertSame($dataDummyArray->dummy1, 1);
    }
}