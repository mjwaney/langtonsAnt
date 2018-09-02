<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class LangtonsAntTest extends TestCase
{
    private $ant;

    protected function setUp()
    {
        $this->ant = $this->createMock(LangtonsAnt::class);
    } 

    public function test_getStartPosition()
    {
        $this->ant->expects($this->once())
            ->method('getStartPosition')
            ->will($this->returnValue([120, 140]));

        $result = $this->ant->getStartPosition();
        $this->assertEquals([120, 140], $result);
    }

    public function test_getSquareColor()
    {
        $position = [120, 140];

        $result = $this->ant->getSquareColor($position);
        $this->assertEquals('white', $result);
    }
}

class LangtonsAnt
{
    public function getStartPosition() : array
    {
        $x = rand(100, 200);
        $y = rand(100, 200);

        return [$x, $y];
    }
}
