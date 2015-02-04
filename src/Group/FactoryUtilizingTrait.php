<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 10:39 PM
 */

namespace SliQ\Group;

/**
 * Class FactoryUtilizingTrait
 * @package SliQ\Group
 */
trait FactoryUtilizingTrait
{
    /**
     * @var callable
     */
    protected $groupFactory;

    /**
     * @param callable $factory
     * @return $this
     */
    public function setGroupFactory(callable $factory)
    {
        $this->groupFactory = $factory;
        return $this;
    }

    /**
     * @return callable
     */
    public function getGroupFactory()
    {
        return $this->groupFactory;
    }
} 