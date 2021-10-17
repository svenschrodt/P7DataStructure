<?php
use PHPUnit\Framework\TestCase;
use P7DataStructure\Internal\ArrayClass;


class BasicTest extends TestCase
{



    public function setUp() : void
    {

    }
    public function testFoo()
    {
        $foo = new \stdClass();
        $this->assertTrue($foo instanceof \stdClass);
    }

    public function testArrayClass()
    {
        $foo = new ArrayClass();
        $this->assertTrue($foo instanceof \P7DataStructure\Internal\ArrayClass);
    }

}