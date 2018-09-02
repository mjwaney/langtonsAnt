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

    public function test_move()
    {
        $this->antMock->expects($this->once())
            ->method('move')
            ->will($this->returnValue(null));

        $result = $this->antMock->move();
        $this->assertNull($result);
    }

    public function test_turn()
    {
        $result = $this->ant->turnLeft();
        $this->ant->direction = 'east';
        $this->assertNull($result);

        $result2 = $this->ant ->turnRight();
        $this->ant->direction = 'east';
        $this->assertNull($result);
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

    public function move()
    {
        $color = $this->getSquareColor($this->position);
        $position = $this->position;

        if($color == 'white'){
            $this->turnRight();
            $this->grid[] = $position;
            $this->moveForward();
        }else{
            $this->turnLeft();
            $key = array_search($position, $this->grid);
            unset($position[$key]);
            $this->moveForward();
        }
    }

    public function moveForward()
    {

    }
}

