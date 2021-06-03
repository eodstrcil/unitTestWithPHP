<?php
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;
use PHPUnit\Framework\TestCase;

class OperacionesTest extends TestCase{

    private $op;
    public function setUp():void{
        $this->op = new Operaciones();
    }

    public function testSumWithTwoValues(){
        $this->assertEquals(7,$this->op->sum(2,5));
    }

    public function testSumWithNullValues(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum(null,null);
    }

    public function testSumWithNotNumericValues(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum('a','hello');
    }

    public function testDivideWithTwoValues(){
        $this->assertEquals(1,$this->op->divide(5,5));
    }

    public function testDivideWithNullValues(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->divide(null,null);
    }

    public function testDivideWithNotNumericValues(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->divide('a','hello');
    }
    public function testDivideBetweenZero(){
        $this->expectException(DivisionByZeroError::class);
        $this->op->divide(5,0);
    }
}

?>