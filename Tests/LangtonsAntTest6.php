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
        $this->assertEquals('white', $result);
    }

    public function test_getDirection()
    {
        $direction = $this->ant->direction;

        $result = $this->ant->getDirection();
        $this->assertEquals('north', $result);
    }

    public function test_changeColor()
    {
        $this->antMock->expects($this->once())
            ->method('changeColor')
            ->will($this->returnValue([120, 140]));

        $result = $this->ant->move();
        $this->assertEquals('north', $result);
    }
}

class LangtonsAnt
{
    private $grid = [];
    public $direction = 'north';
    public $position;

    public function getStartPosition() : array
    {
        $x = rand(100, 200);
        $y = rand(100, 200);
        $this->position = [$x, $y];

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

    public function getDirection()
    {
        return $this->direction;
    }
}

