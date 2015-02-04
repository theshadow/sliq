<?php
/**
 * Created by IntelliJ IDEA.
 * User: xanderguzman
 * Date: 11/20/14
 * Time: 7:50 PM
 */

namespace SliQ;

use \PHPUnit_Framework_TestCase;
use Mockery as m;


class ConditionalTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test that the getField() method defaults to returning NULL
     */
    public function testThatGetFieldDefaultsToReturningNull()
    {
        $conditional = new Conditional();
        $this->assertNull($conditional->getField());
    }

    /**
     * Test that the setField() method returns an instance of self.
     * @return array
     */
    public function testThatSetFieldReturnsInstanceOfSelf()
    {
        $field = m::mock('SliQ\Field');
        $conditional = new Conditional();
        $this->assertSame($conditional, $conditional->setField($field));

        return array($conditional, $field);
    }

    /**
     * @param array $params
     * @depends testThatSetFieldReturnsInstanceOfSelf
     */
    public function testThatGetFieldCanReturnSetValue(array $params)
    {
        /** @var Conditional $conditional */
        /** @var Field $field */
        list($conditional, $field) = $params;

        $this->assertSame($field, $conditional->getField());
    }

    /**
     * Test that the getType() method defaults to returning NULL
     */
    public function testThatGetTypeDefaultsToReturningNull()
    {
        $conditional = new Conditional();
        $this->assertNull($conditional->getType());
    }

    /**
     * @return array
     */
    public function testThatSetTypeReturnsInstanceOfSelf()
    {
        $type = mt_rand();
        $conditional = new Conditional();
        $this->assertSame($conditional, $conditional->setType($type));

        return array($conditional, $type);
    }

    /**
     * @param array $params
     * @depends testThatSetTypeReturnsInstanceOfSelf
     */
    public function testThatGetTypeCanReturnSetValue(array $params)
    {
        /** @var Conditional $conditional */
        list($conditional, $type) = $params;

        $this->assertEquals($type, $conditional->getType());
    }

    /**
     * Test that the getGroup() method defaults to returning NULL
     */
    public function testThatGetGroupDefaultsToReturningNull()
    {
        $conditional = new Conditional();
        $this->assertNull($conditional->getGroup());
    }

    /**
     * Test that the setGroup() method returns an instance of self.
     * @return array
     */
    public function testThatSetGroupReturnsInstanceOfSelf()
    {
        $group = m::mock('SliQ\Group');
        $conditional = new Conditional();
        $this->assertSame($conditional, $conditional->setGroup($group));

        return array($conditional, $group);
    }

    /**
     * @param array $params
     * @depends testThatSetGroupReturnsInstanceOfSelf
     */
    public function testThatGetGroupCanReturnSetValue(array $params)
    {
        /** @var Conditional $conditional */
        /** @var Group $group */
        list($conditional, $group) = $params;

        $this->assertSame($group, $conditional->getGroup());
    }

    /**
     * Test that andThis() sets the type and returns instance of self.
     */
    public function testThatAndThisSetsTheTypeAndReturnsInstanceOfSelf()
    {
        $conditional = m::mock('SliQ\Conditional[setType]');
        $conditional->shouldReceive('setType')
            ->with(Conditional::TYPE_AND)
            ->andReturnSelf();

        /** @var Conditional $conditional */
        $this->assertSame($conditional, $conditional->andThis());
    }

    public function testThatOrThisSetsTheTypeAndReturnsInstanceOfSelf()
    {
        $conditional = m::mock('SliQ\Conditional[setType]');
        $conditional->shouldReceive('setType')
            ->with(Conditional::TYPE_OR)
            ->andReturnSelf();

        /** @var Conditional $conditional */
        $this->assertSame($conditional, $conditional->orThis());
    }
} 