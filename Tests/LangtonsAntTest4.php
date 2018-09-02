<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class LangtonsAntTest extends TestCase
{
    private $antMock;
    private $ant;

    protected function setUp()
    {
        $this->antMock = $this->createMock(LangtonsAnt::class);
        $this->ant = new LangtonsAnt;
    } 

    public function test_getStartPosition()
    {
        $this->antMock->expects($this->once())
            ->method('getStartPosition')
            ->will($this->returnValue([120, 140]));

        $result = $this->antMock->getStartPosition();
        $this->assertEquals([120, 140], $result);
    }

    public function test_getSquareColor()
    {
        $position = [120, 140];

        $result = $this->ant->getSquareColor($position);
        $this->assertEquals('black', $result);
    }

    public function test_getPosition()
    {
        $position = [120, 140];

        $result = $this->ant->getSquareColor($position);
        $this->assertEquals('black', $result);
    }
}

class LangtonsAnt
{
    private $grid = [];

    public function getStartPosition() : array
    {
        $x = rand(100, 200);
        $y = rand(100, 200);

        return [$x, $y];
    }

    public function getSquareColor($position)
    {
        $grid = $this->grid;
        
        if(in_array($position, $grid)){
            return 'black';
        }else{
            return 'white';
        }
    }
}
