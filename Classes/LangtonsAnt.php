<?php

namespace Classes;

class LangtonsAnt
{
    public $grid = [];
    public $direction = 'west';
    public $position;
    public $log;

    public function __construct()
    {
        $this->position = $this->getStartPosition();
    }

    public function getStartPosition() : array
    {
        $x = rand(100, 200);
        $y = rand(100, 200);
        $this->position = [$x, $y];
        $this->updateLog();

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
            unset($this->grid[$key]);
            $this->moveForward();
        }
    }

    public function turnLeft()
    {

        $direction = $this->direction;
        if($direction == 'north') $this->direction = 'west';
        if($direction == 'west') $this->direction = 'south';
        if($direction == 'south') $this->direction = 'east';
        if($direction == 'east') $this->direction = 'north';
    }

    public function turnRight()
    {
        $direction = $this->direction;
        if($direction == 'north') $this->direction = 'east';
        if($direction == 'east') $this->direction = 'south';
        if($direction == 'south') $this->direction = 'west';
        if($direction == 'west') $this->direction = 'north';
    }

    public function moveForward()
    {
        $direction = $this->direction;
        $this->updateLog();

        if($direction == 'north') $this->position[1]--;
        if($direction == 'east') $this->position[0]++;
        if($direction == 'south') $this->position[1]++;
        if($direction == 'west') $this->position[0]--;
    }

    public function updateLog()
    {
        $this->log[] = $this->position;
    }
}
