<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/14/2019
 * Time: 10:55 PM
 */

namespace UhDesign\Core;


abstract class BaseElement implements Element
{
    /**
     * Identifier for each Element per UhDesign\Element\Constant
     *
     * @var string
     */
    public $element;

    /**
     * BaseElement constructor.
     *
     * @param null|string $jsonString , a json encoded string
     *
     * @throws \InvalidArgumentException
     *
     * @depends createElementFromData
     *
     * @since   0.0.1
     */
    public function __construct($jsonString = null)
    {
        if (isset($jsonString)) {
            if (!is_string($jsonString)) {
                throw new \InvalidArgumentException("'jsonString' is not a string.");
            } else {
                // is it valid json
                if (!Util::isJson($jsonString)) {
                    throw new \InvalidArgumentException("'jsonString' is not a valid json string.");
                }
                $this->createElementFromData(json_decode($jsonString));
            }
        }
    }

    /**
     * @return string
     */
    public function toJson()
    {
        $reflection = Util::getReflection($this);

        $data = [];

        if (isset($reflection)) {
            $props = $reflection->getProperties();
            foreach ($props AS $prop) {
                $property = $prop->getName();
                $value = $prop->getValue($this);
                $data[$property] = $value;
            }
        }

        return json_encode($data);
    }

    /**
     * Helper method to add values to current Element's properties
     *
     * @param $data
     *
     * @since 0.0.1
     */
    private function createElementFromData($data)
    {
        $reflection = Util::getReflection($this);

        if (isset($reflection)) {
            $props = $reflection->getProperties();
            foreach ($props AS $prop) {
                $property = $prop->getName();

                // only update value if property existed
                if (isset($data->{$property})) {
                    $this->{$property} = $data->{$property};
                }
            }
        }
    }
}