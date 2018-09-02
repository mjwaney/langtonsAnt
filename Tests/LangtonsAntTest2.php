<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class LangtonsAntTest extends TestCase
{
    private $ant;

    protected function setUp()
    {
        $this->ant = new LangtonsAnt;
    } 

    public function test_getStartPosition()
    {
        $result = $this->ant->getStartPosition();
        $this->assertEquals([120, 140], $result);
    }
}

class LangtonsAnt
{
    public function getStartPosition() : array
    {
        return [];
    }
}
