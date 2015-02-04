<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/14/14
 * Time: 12:47 PM
 */

namespace SliQ;

use InvalidArgumentException;
use SliQ\Conditional\Factory as ConditionalFactory;
use SliQ\Field\Factory as FieldFactory;

use SliQ\Group\FactoryUtilizingTrait as GroupFactoryUtilizingTrait;

/**
 * Class Group
 * @package SliQ
 */
class Group
{
    use GroupFactoryUtilizingTrait;

    /**
     * @var StatementInterface
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
     * @var callable
     */
    protected $conditionalFactory;

    /**
     * @var callable
     */
    protected $fieldFactory;

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
     * @return StatementInterface
     */
    public function getStatement()
    {
        return $this->statement;
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
     * @return Group
     */
    public function getParentGroup()
    {
        return $this->parentGroup;
    }

    /**
     * @param array $conditionals
     * @return $this
     */
    public function setConditionals(array $conditionals)
    {
        array_map(function ($value) use ($conditionals) {
            if (!($value instanceof Conditional)) {
                throw new InvalidArgumentException(
                    "\$conditionals must be an array of Conditionals instead received: "
                        . var_export($conditionals, true)
                );
            }
        }, $conditionals);

        $this->conditionals = $conditionals;
        return $this;
    }

    /**
     * @return array
     */
    public function getConditionals()
    {
        return $this->conditionals;
    }

    /**
     * @param Conditional|Group $conditional
     * @return $this
     */
    public function addConditional($conditional)
    {
        $this->conditionals[] = $conditional;
        return $this;
    }

    /**
     * @param callable $factory
     * @return $this
     */
    public function setConditionalFactory(callable $factory)
    {
        $this->conditionalFactory = $factory;
        return $this;
    }

    /**
     * @return callable
     */
    public function getConditionalFactory()
    {
        if (is_null($this->conditionalFactory)) {
            $this->conditionalFactory = new ConditionalFactory();
        }

        return $this->conditionalFactory;
    }

    /**
     * @param callable $factory
     * @return $this
     */
    public function setFieldFactory(callable $factory)
    {
        $this->fieldFactory = $factory;
        return $this;
    }

    /**
     * @return callable
     */
    public function getFieldFactory()
    {
        if (is_null($this->fieldFactory)) {
            $this->fieldFactory = new FieldFactory();
        }

        return $this->fieldFactory;
    }

    /**
     * @return Conditional
     */
    public function andThis()
    {
        $factory = $this->getConditionalFactory();

        /** @var Conditional $conditional */
        $conditional = $factory();
        $conditional->setGroup($this);

        $this->addConditional($conditional->andThis());

        return $conditional;
    }

    /**
     * @return Conditional
     */
    public function orThis()
    {
        $factory = $this->getConditionalFactory();

        /** @var Conditional $conditional */
        $conditional = $factory();
        $conditional->setGroup($this);

        $this->addConditional($conditional->orThis());

        return $conditional;
    }

    /**
     * @param $name
     * @return Field
     */
    public function field($name)
    {
        $conditionalFactory = $this->getConditionalFactory();
        $fieldFactory = $this->getFieldFactory();

        /** @var Conditional $conditional */
        $conditional = $conditionalFactory();
        $conditional->setGroup($this);

        /** @var Field $field */
        $field = $fieldFactory();

        $field->setName($name)
            ->setGroup($this);

        $this->addConditional(
            $conditional->andThis()
                ->setField($field)
        );

        return $field;
    }

    /**
     * @return Group
     */
    public function group()
    {
        $groupFactory = $this->getGroupFactory();

        /** @var Group $group */
        $group = $groupFactory();
        $group->setParentGroup($this);

        $this->addConditional($group);

        return $group;
    }
}