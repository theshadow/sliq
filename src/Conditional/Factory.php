<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 8:40 PM
 */

namespace SliQ\Conditional;

use SliQ\Conditional;

class Factory
{
    public function __invoke()
    {
        return new Conditional();
    }
} 