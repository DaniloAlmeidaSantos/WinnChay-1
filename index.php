<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Parallax.js</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="js/parallax.js"></script>
</head>
<body>
	<center>
    <div class="parallax">
		<ul id="scene" style="margin:0;">
			<li class="layer" data-depth=".1"><img class="img-fluid" src="img/teste/text.png"></li>
			
			
			<li class="layer" data-depth="1"><img class="img-fluid" src="img/teste/margin2.png"></li>
			<li class="layer" data-depth="-1"><img class="img-fluid" src="img/teste/margin1.png"></li>
			<li class="layer" data-depth=".1"><img class="img-fluid" src="img/teste/margin.png"></li>
			
			<li class="layer" data-depth="1"><img class="img-fluid" src="img/teste/planet1.png"></li>
			<li class="layer" data-depth="-1"><img class="img-fluid" src="img/teste/planet2.png"></li>
			<li class="layer" data-depth="2"><img class="img-fluid" src="img/teste/astronaut.png"></li>
			<li class="layer" data-depth="0.5"><img class="img-fluid" src="img/teste/rocket.png"></li>

			<li class="layer" data-depth=".0"><img class="img-fluid" class="tamImg" src="img/teste/light.png"></li>
			
		</ul>
    </div>
    
    <div>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio exercitationem velit similique maxime debitis laudantium sint magnam aut molestiae explicabo aspernatur in iste ab vel, dolores illo laborum quos porro?
    </div>
	<script>
		var scene = document.getElementById('scene');
		var parallax = new Parallax(scene);
	</script>
</body>
</html>
