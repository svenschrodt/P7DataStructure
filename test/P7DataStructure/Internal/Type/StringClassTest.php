<?php
use PHPUnit\Framework\TestCase;

use P7DataStructure\Internal\Type\StringClass;

class StringClassTest extends TestCase
{
    public function testFoo()
    {
        $cont = 'Lorem Ips';
        $foo = new StringClass($cont);
        $this->assertSAme($cont, (string) $foo);
    }
}