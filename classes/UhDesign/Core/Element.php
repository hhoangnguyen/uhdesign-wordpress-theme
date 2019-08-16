<?php
/**
 * Created by PhpStorm.
 * User: hhoang
 * Date: 8/15/2019
 * Time: 8:31 AM
 */

namespace UhDesign\Core;


interface Element
{
    /**
     * Returns a json encoded string representation of current Element
     *
     * @return string
     * @since 0.0.1
     */
    public function toJson();
}