<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:57 PM
 */

namespace SliQ\Statement;

use SliQ\Group;

/**
 * Interface GroupParserInterface
 * @package SliQ\Statement
 */
interface GroupParserInterface
{
    /**
     * @param Group $group
     * @return mixed
     */
    public function parse(Group $group);
} 