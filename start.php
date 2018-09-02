<html>
<head>
	<meta charset="UTF-8">
	<title>Langton's Ant</title>
</head>
<body>
	<canvas id="canvas" width="200" height="200"></canvas>

	<script>

		var canvas = document.getElementById("canvas");
		var context = canvas.getContext('2d');

		for (var i = 0; i < x.length; i++)  {
			context.fillRect(x[i], y[i], 1, 1 );
		}

	</script>
	<div id="coordinates">
		<?php
			foreach($lp->log as $key => $log){
				echo "$key: x= $log[0], y= $log[1] <br>";
			}
		?>
	</div>
</body>
</html>

<style>
	canvas{
		border: 1px solid black;
		width: 600px;
		height: 600px;
	}

	#coordinates{
		position: absolute;
		left: 900px;
		top: 10px;
		height: 800px;
	}
</style>