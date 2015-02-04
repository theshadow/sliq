<?php

namespace SliQ;

use SliQ\Statement\SelectStatementParserInterface;

class SliQ implements StatementFactoryInterface
{
    /**
     * @var SelectStatementParserInterface
     */
    protected $selectStatementParser;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param Configuration $config
     */
    public function __construct(Configuration $config = null)
    {
        $config = $config ?: new Configuration();
        $this->setConfig($config);
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->$config;
    }

    /**
     * @param Configuration $config
     * @return $this
     */
    public function setConfig(Configuration $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return SelectStatement
     */
    public function select()
    {
        $statement = new SelectStatement();
        $statement->setParser($this->getSelectStatementParser());

        return $statement;
    }

    /**
     * @return DeleteStatement
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return UpdateStatement
     */
    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * @return InsertStatement
     */
    public function insert()
    {
        // TODO: Implement insert() method.
    }

    /**
     * @return SelectStatementParserInterface
     */
    public function getSelectStatementParser()
    {
        if (is_null($this->selectStatementParser)) {

            $className = $this->getConfig()->getSelectStatementParser();

            if (is_null($className)) {
                throw new \LogicException('Undefined SelectStatementParser');
            }

            if (!class_exists($className)) {
                throw new \LogicException('Configured SelectStatementParser ' . $className . ' does not exist');
            }

            $class = new $className();

            $this->selectStatementParser = $class;
        }

        return $this->selectStatementParser;
    }
}