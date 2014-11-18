<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:38 PM
 */

namespace SliQ;


/**
 * Class Field
 * @package SliQ
 */
class Field
{
    /**
     * Defines the comparison as a pure equality
     */
    const OP_EQUAL_TO = 1;

    /**
     *
     */
    const OP_NOT_EQUAL_TO = 2;

    /**
     *
     */
    const OP_LIKE = 3;

    /**
     *
     */
    const OP_IN = 4;

    /**
     *
     */
    const OP_NOT_IN = 5;

    /**
     *
     */
    const OP_NOT_LIKE = 6;

    /**
     *
     */
    const OP_LESS_THAN = 7;

    /**
     *
     */
    const OP_LESS_THAN_EQUAL_TO = 8;

    /**
     *
     */
    const OP_GREATER_THAN = 9;

    /**
     *
     */
    const OP_GREATER_THAN_EQUAL_TO = 10;

    /**
     *
     */
    const OP_BETWEEN = 11;

    /**
     *
     */
    const OP_IS_NOT_NULL = 12;

    /**
     *
     */
    const OP_IS_NULL = 13;

    /**
     *
     */
    const OP_NOT_BETWEEN = 14;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $operand;

    /**
     * @var mixed
     */
    protected $values;

    /**
     * @var Group
     */
    protected $group;

    /**
     * @var Conditional
     */
    protected $conditional;

    /**
     * @param Conditional $conditional
     * @return $this
     */
    public function setConditional(Conditional $conditional)
    {
        $this->conditional = $conditional;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConditional()
    {
        return $this->conditional;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function equalTo($value)
    {
        $this->operand = static::OP_EQUAL_TO;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function notEqualTo($value)
    {
        $this->operand = static::OP_NOT_EQUAL_TO;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function like($value)
    {
        $this->operand = static::OP_LIKE;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @param array $values
     * @return mixed
     */
    public function in(array $values)
    {
        $this->operand = static::OP_IN;
        $this->value = $values;
        return $this->group;
    }

    /**
     * @param array $values
     * @return Group
     */
    public function notIn(array $values)
    {
        $this->operand = static::OP_NOT_IN;
        $this->value = $values;
        return $this->group;
    }

    /**
     * @param $value
     * @return Group
     */
    public function notLike($value)
    {
        $this->operand = static::OP_NOT_LIKE;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @param $value
     * @return Group
     */
    public function lessThan($value)
    {
        $this->operand = static::OP_LESS_THAN;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @param $value
     * @return Group
     */
    public function lessThanOrEqualTo($value)
    {
        $this->operand = static::OP_LESS_THAN_EQUAL_TO;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @param $value
     * @return Group
     */
    public function greaterThan($value)
    {
        $this->operand = static::OP_GREATER_THAN;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @param $value
     * @return Group
     */
    public function greaterThanOrEqualTo($value)
    {
        $this->operand = static::OP_GREATER_THAN_EQUAL_TO;
        $this->value = $value;
        return $this->group;
    }

    /**
     * @return Group
     */
    public function isNull()
    {
        $this->operand = static::OP_IS_NULL;
        return $this->group;
    }

    /**
     * @return Group
     */
    public function isNotNull()
    {
        $this->operand = static::OP_IS_NOT_NULL;
        return $this->group;
    }

    /**
     * @param $x
     * @param $y
     * @return Group
     */
    public function between($x, $y)
    {
        $this->operand = static::OP_BETWEEN;
        return $this->group;
    }

    /**
     * @param $x
     * @param $y
     * @return Group
     */
    public function notBetween($x, $y)
    {
        $this->operand = static::OP_NOT_BETWEEN;
        $this->value = array($x, $y);
        return $this->group;
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getOperand()
    {
        return $this->operand;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }
}
