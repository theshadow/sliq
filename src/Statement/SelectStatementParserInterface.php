<?php

namespace SliQ\Statement;

use SliQ\SelectStatement;

/**
 * Interface SelectStatementParserInterface
 * @package SliQ\Statement
 */
interface SelectStatementParserInterface
{
    /**
     * @param SelectStatement $statement
     * @return string
     */
    public function parse(SelectStatement $statement);
}