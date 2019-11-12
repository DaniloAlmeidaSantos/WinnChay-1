<!DOCTYPE html>
<html class="smooth">
<head>
	<title>WinnChay - Página Inicial</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
</head>
<body>
	<div class="outerWrapper">
		<div class="Wrapper">
			<div class="slide Home">
				<div class="sidenav">
					<center>
						<div class="perfilLogo">
							<a href="#">
								<img width="100%" src="img/Logo/logo4.png">
							</a>
						</div>
						<div class="perfilHome">
							<a href="#home" class="tablink" id="defaultOpen" onclick="openPage('Home', this, 'red')">
								<img width="90%" src="open-iconic-master/svg/home.svg">
							</a>
						</div>
						<div class="perfilHist">
							<a href="#hist" class="tablink" id="defaultOpen" onclick="openPage('Hist')">
								<img width="90%" src="open-iconic-master/svg/bar-chart.svg">
							</a>
						</div>
						<div class="perfilIco">
							<a href="#perfil" class="tablink" id="defaultOpen" onclick="openPage('Perfil')">
								<img width="90%" src="open-iconic-master/svg/cog.svg">
							</a>
						</div>
					</center>
				</div>

				<div id="Home" class="tabcontent">
					<h3>Home</h3>
					<p>Home is where the heart is..</p>
				</div>

				<div id="Hist" class="tabcontent">
					<h3>News</h3>
					<p>Some news this fine day!</p> 
				</div>

				<div id="Perfil" class="tabcontent">
					<h3>Contact</h3>
					<p>Get in touch, or swing by for a cup of coffee.</p>
				</div>

				<div id="About" class="tabcontent">
					<h3>About</h3>
					<p>Who we are and what we do.</p>
				</div>
					<script>
						function openPage(pageName,elmnt,color) {
						var i, tabcontent, tablinks;
						tabcontent = document.getElementsByClassName("tabcontent");
						for (i = 0; i < tabcontent.length; i++) {
							tabcontent[i].style.display = "none";
						}
						tablinks = document.getElementsByClassName("tablink");
						for (i = 0; i < tablinks.length; i++) {
							tablinks[i].style.backgroundColor = "";
						}
						document.getElementById(pageName).style.display = "block";
							elmnt.style.backgroundColor = color;
						}
						// Get the element with id="defaultOpen" and click on it
						document.getElementById("defaultOpen").click();
					</script>
				</div>
			<div class="slide Center"></div>
			<div class="slide Right"></div>
		</div>
	</div>
</body>
</html>