<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 10:23 PM
 */

namespace SliQ\Group;

use SliQ\Group;

/**
 * Class Factory
 * @package SliQ\Group
 */
class Factory
{
    /**
     * @return Group
     */
    public function __invoke()
    {
        return new Group();
    }
} 