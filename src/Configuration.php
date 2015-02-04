<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 2/1/15
 * Time: 10:22 PM
 */

namespace SliQ;


class Configuration
{
    /**
     * @var string
     */
    protected $selectStatementParserClass;

    /**
     * @var string
     */
    protected $groupParserClass;

    /**
     * @var string
     */
    protected $fieldParserClass;

    /**
     * @return string
     */
    public function getSelectStatementParser()
    {
        return $this->selectStatementParserClass;
    }

    /**
     * @param string $selectStatementParser
     * @return static
     */
    public function setSelectStatementParser($selectStatementParser)
    {
        $this->selectStatementParserClass = $selectStatementParser;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupParser()
    {
        return $this->groupParserClass;
    }

    /**
     * @param string $groupParser
     * @return static
     */
    public function setGroupParser($groupParser)
    {
        $this->groupParserClass = $groupParser;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldParser()
    {
        return $this->fieldParserClass;
    }

    /**
     * @param string $fieldParser
     * @return static
     */
    public function setFieldParserClass($fieldParser)
    {
        $this->fieldParserClass = $fieldParser;
        return $this;
    }


}