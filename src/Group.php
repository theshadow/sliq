<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:47 PM
 */

namespace SliQ;


/**
 * Class Group
 * @package SliQ
 */
class Group
{
    /**
     * @var Statement
     */
    protected $statement;

    /**
     * @var array
     */
    protected $conditionals = array();

    /**
     * @var Group
     */
    protected $parentGroup;

    /**
     * @param StatementInterface $statement
     * @return $this
     */
    public function setStatement(StatementInterface $statement)
    {
        $this->statement = $statement;
        return $this;
    }

    /**
     * @return Conditional
     */
    public function andThis()
    {
        $conditional = new Conditional();
        $conditional->setGroup($this);

        $this->conditionals[] = $conditional->and();

        return $conditional;
    }

    /**
     * @return Conditional
     */
    public function orThis()
    {
        $conditional = new Conditional();
        $conditional->setGroup($this);

        $this->conditionals[] = $conditional->or();

        return $conditional;
    }

    /**
     * @param $name
     * @return Field
     */
    public function field($name)
    {
        $conditional = new Conditional();
        $conditional->setGroup($this);

        $field = new Field();

        $field->setName($name)
            ->setGroup($this);

        $this->conditionals[] = $conditional->and()->setField($field);

        return $field;
    }

    /**
     * @return Group
     */
    public function group()
    {
        $group = new Group();
        $group->setParentGroup($this);

        $conditionals[] = $group;

        return $group;
    }

    /**
     * @param Group $group
     * @return $this
     */
    public function setParentGroup(Group $group)
    {
        $this->parentGroup = $group;
        return $this;
    }

    /**
     * @return array
     */
    public function getConditionals()
    {
        return $this->conditionals;
    }
}