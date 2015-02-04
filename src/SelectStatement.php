<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:51 PM
 */

namespace SliQ;


use SliQ\Statement\SelectStatementParserInterface;

/**
 * Class SelectStatement
 * @package SliQ
 */
class SelectStatement implements StatementInterface
{

    /**
     * @var array
     */
    protected $fields = array();

    /**
     * @var string
     */
    protected $object;

    /**
     * @var Group
     */
    protected $where;

    /**
     * @var mixed
     */
    protected $groupBy;

    /**
     * @var mixed
     */
    protected $sortBy;

    /**
     * @var SelectStatementParserInterface
     */
    protected $parser;

    /**
     * @param SelectStatementParserInterface $parser
     * @return $this
     */
    public function setParser(SelectStatementParserInterface $parser)
    {
        $this->parser = $parser;
        return $this;
    }

    /**
     * @return SelectStatementParserInterface
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * @return string
     */
    public function parse()
    {
        return $this->getParser()->parse($this);
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields = array('*'))
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param $object
     * @return $this
     */
    public function from($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @return Group
     */
    public function where()
    {
        if (is_null($this->where)) {
            $this->where = new Group();
            $this->where->setStatement($this);
        }
        return $this->where;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return Group
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }
}