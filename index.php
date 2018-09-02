<?php

require "vendor/autoload.php";	

use Classes\LangtonsAnt;

$lp = new LangtonsAnt;

for($i = 0; $i < 20000; $i++){
	$lp->move();
}

echo '<script>';
echo 'var x = [];';
echo 'var y = [];';
echo 'var grid = [];';
echo '</script>';

foreach($lp->grid as $key => $grid){
	echo '<script>';
	echo 'x.push( ' . $grid[0] .  ' );';
	echo 'y.push( ' . $grid[1] .  ' );';
	echo '</script>';
}

include('start.php');