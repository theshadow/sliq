<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:56 PM
 */

namespace SliQ\Statement;

use SliQ\StatementInterface;


/**
 * Interface ParserInterface
 * @package SliQ\Statement
 */
interface ParserInterface
{
    /**
     * @param StatementInterface $statement
     * @return mixed
     */
    public function parse(StatementInterface $statement);
} 