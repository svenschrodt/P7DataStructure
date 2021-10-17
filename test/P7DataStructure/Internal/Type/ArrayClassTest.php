<?php
use PHPUnit\Framework\TestCase;

use P7DataStructure\Internal\Type\ArrayClass;

class ArrayClassTest extends TestCase
{

    private array $foo = [1,2,3,4,5];

    private ?ArrayClass $instance = null;

    private int $originalLength = 0;

    public function setUp() : void
    {
        $this->instance = new ArrayClass($this->foo);
        $this->originalLength = count($this->foo);

    }

    public function testIsInstanceOfArrayClass()
    {
        $this->assertTrue($this->instance instanceof ArrayClass);
    }

    public function testOfValueIncludes()
    {
        $this->assertTrue($this->instance->includes(3));
        $this->assertFalse($this->instance->includes(13));
        $this->instance->push(13);
        $this->assertTrue($this->instance->includes(13));
        $this->assertTrue($this->instance->notIncludes(999));
        $this->assertTrue($this->instance->notIncludes(666));
    }

    public function testIfJoinIsWorkingCorrectly()
    {
        $expected = '1,2,3,4,5';
        $expectedWithDefaultSep = '1, 2, 3, 4, 5';
        $this->assertSame($expectedWithDefaultSep, $this->instance->join());
        $this->assertSame($expected, $this->instance->join(','));
    }

    public function testIfPushAndPopAndCountAreWorkingCorrectly()
    {
        $answer = 42;
        $this->instance->push($answer);
        $this->assertTrue($this->instance->count() === 6);

        $this->assertSame($answer, $this->instance->pop());
        $this->assertTrue($this->instance->count() === $this->originalLength);
        $this->assertTrue($this->instance->count() === $this->instance->length);
    }
}