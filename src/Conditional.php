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
     *
     */
    const TYPE_NEITHER = 3;

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
     * @return $this
     */
    public function andThis()
    {
        $this->type = static::TYPE_AND;
        return $this;
    }

    /**
     * @return $this
     */
    public function orThis()
    {
        $this->type = static::TYPE_OR;
        return $this;
    }

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
     * @param Group $group
     * @return $this
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
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

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }
}