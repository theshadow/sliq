<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 10:00 PM
 */

namespace SliQ\Field;


use SliQ\Field;


/**
 * Class Factory
 * @package SliQ\Field
 */
class Factory
{
    /**
     * @return Field
     */
    public function __invoke()
    {
        return new Field();
    }
} 