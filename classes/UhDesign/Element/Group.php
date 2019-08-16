<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/14/2019
 * Time: 10:48 PM
 */

namespace UhDesign\Element;


use UhDesign\Core\BaseElement;

class Group extends BaseElement
{
    public $name;
    public $order;
    /** @var Section[] */
    public $children = [];
}