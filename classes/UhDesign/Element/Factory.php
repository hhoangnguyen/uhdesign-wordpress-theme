<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/12/2019
 * Time: 2:50 PM
 */

namespace UhDesign\Element;


use UhDesign\Core\Element;
use UhDesign\Element\Field\Number;
use UhDesign\Element\Field\Text;
use Unit\Element\Field\Dummy;

class Factory
{
    /**
     * @param             $type
     * @param null|string $jsonString
     *
     * @return null|Element
     *
     * @since 0.0.1
     */
    public static function create($type, $jsonString = null)
    {
        switch ($type) {
            case Constant::DUMMY:
                return new Dummy($jsonString);
            case Constant::ELEMENT_TEXT:
                return new Text($jsonString);
            case Constant::ELEMENT_NUMBER:
                return new Number($jsonString);
            case Constant::GROUP:
                return new Group($jsonString);
            case Constant::SECTION:
                return new Section($jsonString);
        }

        return null;
    }
}