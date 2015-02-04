<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 8:27 PM
 */

namespace SliQ;

use \PHPUnit_Framework_TestCase;
use Mockery as m;

class GroupTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that the getStatement() method defaults to returning NULL
     */
    public function testThatGetStatementDefaultsToReturningNull()
    {
        $group = new Group();
        $this->assertNull($group->getStatement());
    }

    /**
     * @return array
     */
    public function testThatSetStatementReturnsInstanceOfSelf()
    {
        $statement = m::mock('SliQ\StatementInterface');
        $group = new Group();

        $this->assertSame($group, $group->setStatement($statement));

        return array($group, $statement);
    }

    /**
     * @param array $params
     * @depends testThatSetStatementReturnsInstanceOfSelf
     */
    public function testThatGetStatementCanReturnSetValue(array $params)
    {
        /** @var Group $group */
        /** @var StatementInterface $statement */
        list($group, $statement) = $params;

        $this->assertSame($statement, $group->getStatement());
    }

    /**
     * Test that the getParentGroup() method defaults to returning NULl
     */
    public function testThatGetParentGroupDefaultsToReturningNull()
    {
        $group = new Group();
        $this->assertNull($group->getParentGroup());
    }

    /**
     * @return array
     */
    public function testThatSetParentGroupReturnsInstanceOfSelf()
    {
        $parentGroup = m::mock('SliQ\Group');
        $group = new Group();

        $this->assertSame($group, $group->setParentGroup($parentGroup));

        return array($group, $parentGroup);
    }

    /**
     * @param array $params
     * @depends testThatSetParentGroupReturnsInstanceOfSelf
     */
    public function testThatGetParentGroupCanReturnSetValue(array $params)
    {
        /** @var Group $group */
        /** @var Group $parentGroup */
        list($group, $parentGroup) = $params;

        $this->assertSame($parentGroup, $group->getParentGroup());
    }

    /**
     * Test that the getConditionals() method defaults to returning an empty array
     */
    public function testThatGetConditionalsDefaultsToReturningAnEmptyArray()
    {
        $group = new Group();
        $this->assertEquals(array(), $group->getConditionals());
    }

    /**
     * @return array
     */
    public function testThatSetConditionalsReturnsAnInstanceSelf()
    {
        $conditionals = array(
            m::mock('SliQ\Conditional'),
        );
        $group = new Group();

        $this->assertSame($group, $group->setConditionals($conditionals));

        return array($group, $conditionals);
    }

    /**
     * @param array $params
     * @depends testThatSetConditionalsReturnsAnInstanceSelf
     */
    public function testThatGetConditionalsCanReturnSetValues(array $params)
    {
        /** @var Group $group */
        /** @var array $conditionals */
        list($group, $conditionals) = $params;

        $this->assertEquals($conditionals, $group->getConditionals());
    }

    /**
     * Test that the setConditionals() method throws an InvalidArgumentException when the collection contains a
     * non-conditional.
     *
     * @expectedException \InvalidArgumentException
     */
    public function testThatSetConditionalsThrowsInvalidArgumentExceptionWhenCollectionContainsNonConditional()
    {
        $conditionals = array(null);
        $group = new Group();

        $group->setConditionals($conditionals);
    }

    /**
     * Test that the getConditionalFactory() method returns expected factory by default.
     */
    public function testThatGetConditionalFactoryReturnsExpectedFactoryByDefault()
    {
        $group = new Group();
        $this->assertInstanceOf('SliQ\Conditional\Factory', $group->getConditionalFactory());
    }

    /**
     * Test that the setConditionalFactory() returns an instance of self
     */
    public function testThatSetConditionalFactoryReturnsInstanceOfSelf()
    {
        $group = new Group();
        $factory = m::mock('SliQ\Conditional\Factory');

        $this->assertSame($group, $group->setConditionalFactory($factory));

        return array($group, $factory);
    }

    /**
     * @param array $params
     * @depends testThatSetConditionalFactoryReturnsInstanceOfSelf
     */
    public function testThatGetConditionalsFactoryCanReturnSetValue(array $params)
    {
        /** @var Group $group */
        /** @var \SliQ\Conditional\Factory */
        list($group, $factory) = $params;

        $this->assertSame($factory, $group->getConditionalFactory());
    }

    /**
     * Test that the getFieldFactory() method returns expected factory by default.
     */
    public function testThatGetFieldFactoryReturnsExpectedFactoryByDefault()
    {
        $group = new Group();
        $this->assertInstanceOf('SliQ\Field\Factory', $group->getFieldFactory());
    }

    /**
     * Test that the setFieldFactory() returns an instance of self
     */
    public function testThatSetFieldFactoryReturnsInstanceOfSelf()
    {
        $group = new Group();
        $factory = m::mock('SliQ\Field\Factory');

        $this->assertSame($group, $group->setFieldFactory($factory));

        return array($group, $factory);
    }

    /**
     * @param array $params
     * @depends testThatSetFieldFactoryReturnsInstanceOfSelf
     */
    public function testThatGetFieldFactoryCanReturnSetValue(array $params)
    {
        /** @var Group $group */
        /** @var \SliQ\Conditional\Factory */
        list($group, $factory) = $params;

        $this->assertSame($factory, $group->getFieldFactory());
    }

    /**
     * Test that the getFieldFactory() method returns expected factory by default.
     */
    public function testThatGetGroupFactoryReturnsExpectedFactoryByDefault()
    {
        $this->markTestSkipped('Move this to the FactoryUtilizingTraitTest.');
        $group = new Group();
        $this->assertInstanceOf('SliQ\Group\Factory', $group->getGroupFactory());
    }

    /**
     * Test that the setGroupFactory() returns an instance of self
     */
    public function testThatSetGroupFactoryReturnsInstanceOfSelf()
    {
        $group = new Group();
        $factory = m::mock('SliQ\Group\Factory');

        $this->assertSame($group, $group->setGroupFactory($factory));

        return array($group, $factory);
    }

    /**
     * @param array $params
     * @depends testThatSetGroupFactoryReturnsInstanceOfSelf
     */
    public function testThatGetGroupFactoryCanReturnSetValue(array $params)
    {
        /** @var Group $group */
        /** @var \SliQ\Group\Factory */
        list($group, $factory) = $params;

        $this->assertSame($factory, $group->getGroupFactory());
    }

    /**
     * Test that andThis() adds and returns a new conditional properly configured.
     */
    public function testThatAndThisAddsAndReturnsANewConditionalProperlyConfigured()
    {
        $conditional = m::mock('SliQ\Conditional');

        $group = m::mock('SliQ\Group[getConditionalFactory,addConditional]');
        $group->shouldReceive('getConditionalFactory')
            ->andReturn(function () use ($conditional) {
                return $conditional;
            });
        $group->shouldReceive('addConditional')
            ->with($conditional)
            ->andReturnSelf();

        $conditional->shouldReceive('setGroup')
            ->with($group)
            ->andReturnSelf();
        $conditional->shouldReceive('andThis')
            ->andReturnSelf();

        /** @var Group $group */
        $this->assertSame($conditional, $group->andThis());
    }

    /**
     * Test that orThis() adds and returns a new conditional properly configured.
     */
    public function testThatOrThisAddsAndReturnsANewConditionalProperlyConfigured()
    {
        $conditional = m::mock('SliQ\Conditional');

        $group = m::mock('SliQ\Group[getConditionalFactory,addConditional]');
        $group->shouldReceive('getConditionalFactory')
            ->andReturn(function () use ($conditional) {
                return $conditional;
            });
        $group->shouldReceive('addConditional')
            ->with($conditional)
            ->andReturnSelf();

        $conditional->shouldReceive('setGroup')
            ->with($group)
            ->andReturnSelf();
        $conditional->shouldReceive('orThis')
            ->andReturnSelf();

        /** @var Group $group */
        $this->assertSame($conditional, $group->orThis());
    }

    /**
     * Test that field() properly creates and returns a new field
     */
    public function testThatFieldProperlyCreatesAndReturnsANewField()
    {
        $name = uniqid();
        $conditional = m::mock('SliQ\Conditional');
        $field = m::mock('SliQ\Field');

        $group = m::mock('SliQ\Group[getConditionalFactory,getFieldFactory,addConditional]');
        $group->shouldReceive('getConditionalFactory')
            ->andReturn(function () use ($conditional) {
                return $conditional;
            });
        $group->shouldReceive('getFieldFactory')
            ->andReturn(function () use ($field) {
                return $field;
            });
        $group->shouldReceive('addConditional')
            ->with($conditional)
            ->andReturnSelf();

        $conditional->shouldReceive('setGroup')
            ->with($group)
            ->andReturnSelf();
        $conditional->shouldReceive('andThis')
            ->andReturnSelf();
        $conditional->shouldReceive('setField')
            ->with($field)
            ->andReturnSelf();

        $field->shouldReceive('setName')
            ->with($name)
            ->andReturnSelf();
        $field->shouldReceive('setGroup')
            ->with($group)
            ->andReturnSelf();

        /** @var Group $group */
        $this->assertSame($field, $group->field($name));
    }

    /**
     * Test that group() properly configures a new group.
     */
    public function testThatGroupProperlyConfiguresANewGroup()
    {
        $newGroup = m::mock('SliQ\Group');

        $group = m::mock('SliQ\Group[getGroupFactory,addConditional]');
        $group->shouldReceive('getGroupFactory')
            ->andReturn(function () use ($newGroup) {
                 return $newGroup;
            });
        $group->shouldReceive('addConditional')
            ->with($newGroup)
            ->andReturnSelf();

        $newGroup->shouldReceive('setParentGroup')
            ->with($group)
            ->andReturnSelf();

        /** @var Group $group */
        $this->assertSame($newGroup, $group->group());
    }
} 