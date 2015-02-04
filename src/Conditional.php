<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:45 PM
 */

namespace SliQ;


/**
 * Class Conditional
 * @package SliQ
 */
class Conditional
{
    /**
     *
     */
    const TYPE_AND = 1;

    /**
     *
     */
    const TYPE_OR = 2;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var Field
     */
    protected $field;

    /**
     * @var Group
     */
    protected $group;

    /**
     * @param Field $field
     * @return $this
     */
    public function setField(Field $field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param Group $group
     * @return $this
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return $this
     */
    public function andThis()
    {
        $this->setType(static::TYPE_AND);
        return $this;
    }

    /**
     * @return $this
     */
    public function orThis()
    {
        $this->setType(static::TYPE_OR);
        return $this;
    }

    /**
     * @param $name
     * @return Field
     */
    public function field($name)
    {
        $field = new Field();
        $field->setName($name)
            ->setGroup($this->group);
        $this->setField($field);
        return $field;
    }
}