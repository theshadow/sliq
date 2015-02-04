<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 5:40 PM
 */

namespace SliQ;

use \PHPUnit_Framework_TestCase;
use Mockery as m;

/**
 * Class FieldParserTest
 * @package SliQ\Zuora
 */
class FieldTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that the getConditional() defaults to NULL
     */
    public function testThatGetConditionalDefaultsToNull()
    {
        $field = new Field();

        $this->assertNull($field->getConditional());
    }

    /**
     * Test that setConditional() returns instance of self.
     */
    public function testThatSetConditionalReturnsInstanceOfSelf()
    {
        $field = new Field();

        $conditional = m::mock('SliQ\Conditional');

        $actual = $field->setConditional($conditional);

        $this->assertSame($field, $actual);

        return array($field, $conditional);
    }

    /**
     * Test that the getConditional() method returns expected instance of Conditional.
     *
     * @param array $params
     * @depends testThatSetConditionalReturnsInstanceOfSelf
     */
    public function testThatGetConditionalReturnsExpectedInstance(array $params)
    {
        /** @var Field $field */
        /** @var Conditional $conditional */
        list($field, $conditional) = $params;

        $this->assertSame($conditional, $field->getConditional());
    }

    /**
     * Test that the getName() method defaults to null
     */
    public function testThatGetNameDefaultsToNull()
    {
        $field = new Field();

        $this->assertNull($field->getName());
    }

    /**
     * Test that the setName() method returns an instance of self
     */
    public function testThatSetNameReturnsInstanceOfSelf()
    {
        $field = new Field();

        $name = uniqid();

        $this->assertSame($field, $field->setName($name));

        return array($field, $name);
    }

    /**
     * Test that the getName() method can return the set string
     *
     * @param array $params
     * @depends testThatSetNameReturnsInstanceOfSelf
     */
    public function testThatGetNameCanReturnSetString(array $params)
    {
        /** @var Field $field */
        list($field, $name) = $params;

        $this->assertEquals($name, $field->getName());
    }

    /**
     * Test that the getOperand() method defaults to returning NULL
     */
    public function testThatGetOperandDefaultsToReturningNull()
    {
        $field = new Field();

        $this->assertNull($field->getConditional());
    }

    /**
     * Test that the getValues() method defaults to returning NULL
     */
    public function testThatGetValuesDefaultsToReturningNull()
    {
        $field = new Field();

        $this->assertNull($field->getValues());
    }

    /**
     * Test that setValues() returns an instance of self
     *
     * @return array
     */
    public function testThatSetValuesReturnsInstanceOfSelf()
    {
        $field = new Field();

        $values = uniqid();

        $this->assertSame($field, $field->setValues($values));

        return array($field, $values);
    }

    /**
     * Test that getValues() returns the set values.
     *
     * @param array $params
     * @depends testThatSetValuesReturnsInstanceOfSelf
     */
    public function testThatGetValuesReturnsSetValues(array $params)
    {
        /** @var Field $field */
        list($field, $values) = $params;

        $this->assertEquals($values, $field->getValues());
    }

    public function testThatGetGroupDefaultsToReturningNull()
    {
        $field = new Field();
        $this->assertNull($field->getGroup());
    }

    public function testThatSetGroupProperlySetsValueAndReturnsInstanceOfSelf()
    {
        $group = m::mock('SliQ\Group');
        $field = new Field();

        $this->assertSame($field, $field->setGroup($group));

        return array($field, $group);
    }

    /**
     * @param array $params
     * @depends testThatSetGroupProperlySetsValueAndReturnsInstanceOfSelf
     */
    public function testThatGetGroupCanReturnSetValue(array $params)
    {
        /** @var Field $field */
        /** @var Group $group */
        list($field, $group) = $params;

        $this->assertSame($group, $field->getGroup());
    }

    /**
     * Test that the equalTo() method sets the value and operand and returns the set group
     */
    public function testThatEqualToSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_EQUAL_TO)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->equalTo($value));
    }

    /**
     * Test that the notEqualTo() method sets the value and operand and returns the set group
     */
    public function testThatNotEqualToSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_NOT_EQUAL_TO)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->notEqualTo($value));
    }

    /**
     * Test that the like() method sets the value and operand and returns the set group
     */
    public function testThatLikeSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_LIKE)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->like($value));
    }

    /**
     * Test that the notLike() method sets the value and operand and returns the set group
     */
    public function testThatNotLikeSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_NOT_LIKE)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->notLike($value));
    }

    /**
     * Test that the in() method sets the value and operand and returns the set group
     */
    public function testThatInSetsValueAndOperandAndReturnsGroup()
    {
        $value = array(mt_rand());
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_IN)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->in($value));
    }

    /**
     * Test that the notIn() method sets the value and operand and returns the set group
     */
    public function testThatNotInSetsValueAndOperandAndReturnsGroup()
    {
        $value = array(mt_rand());
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_NOT_IN)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->notIn($value));
    }

    /**
     * Test that the lessThan() method sets the value and operand and returns the set group
     */
    public function testThatLessThanSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_LESS_THAN)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->lessThan($value));
    }

    /**
     * Test that the lessThanOrEqualTo() method sets the value and operand and returns the set group
     */
    public function testThatLessThanOrEqualToSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_LESS_THAN_EQUAL_TO)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->lessThanOrEqualTo($value));
    }

    /**
     * Test that the greaterThan() method sets the value and operand and returns the set group
     */
    public function testThatGreaterThanSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_GREATER_THAN)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->greaterThan($value));
    }

    /**
     * Test that the greaterThanOrEqualTo() method sets the value and operand and returns the set group
     */
    public function testThatGreaterThanOrEqualToSetsValueAndOperandAndReturnsGroup()
    {
        $value = mt_rand();
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,setValues,getGroup]');
        $field->shouldReceive('setValues')
            ->with($value)
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_GREATER_THAN_EQUAL_TO)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->greaterThanOrEqualTo($value));
    }

    /**
     * Test that the isNull() method sets the operand and returns the set group
     */
    public function testThatIsNullSetsOperandAndReturnsGroup()
    {
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,getGroup]');
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_IS_NULL)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->isNull());
    }

    /**
     * Test that the isNotNull() method sets the operand and returns the set group
     */
    public function testThatIsNotNullSetsOperandAndReturnsGroup()
    {
        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,getGroup]');
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_IS_NOT_NULL)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->isNotNull());
    }

    /**
     * Test that the between() method sets the operand, value, and returns the set group
     */
    public function testThatBetweenSetsOperandAndReturnsGroup()
    {
        list($x, $y) = array(mt_rand(), mt_rand());

        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,getGroup]');
        $field->shouldReceive('setValues')
            ->with(array($x, $y))
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_BETWEEN)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->between($x, $y));
    }

    /**
     * Test that the notBetween() method sets the operand, value, and returns the set group
     */
    public function testThatNotBetweenSetsOperandAndReturnsGroup()
    {
        list($x, $y) = array(mt_rand(), mt_rand());

        $group = m::mock('SliQ\Group');

        $field = m::mock('SliQ\Field[setOperand,getGroup]');
        $field->shouldReceive('setValues')
            ->with(array($x, $y))
            ->andReturnSelf();
        $field->shouldReceive('getGroup')
            ->andReturn($group);
        $field->shouldReceive('setOperand')
            ->with(Field::OP_NOT_BETWEEN)
            ->andReturnSelf();

        /** @var Field $field */
        $this->assertSame($group, $field->notBetween($x, $y));
    }
} 