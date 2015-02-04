<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 10:38 PM
 */

namespace SliQ\Group;


interface FactoryAccessingInterface
{
    /**
     * @return callable
     */
    public function getGroupFactory();
} 