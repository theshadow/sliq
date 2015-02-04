<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 10:36 PM
 */

namespace SliQ\Group;


interface FactoryAwareInterface
{
    public function setGroupFactory(callable $factory);
} 