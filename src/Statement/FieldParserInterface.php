<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:57 PM
 */

namespace SliQ\Statement;

use SliQ\Field;

/**
 * Interface FieldParser
 * @package SliQ\Statement
 */
interface FieldParserInterface
{
    /**
     * @param Field $field
     * @return mixed
     */
    public function parse(Field $field);
} 