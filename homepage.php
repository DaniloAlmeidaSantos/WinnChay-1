<!DOCTYPE html>
<html class="formatpage">
<head>
	<title>WinnChay - Página Inicial</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
</head>
<body >
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
							<a href="#home" class="tablink" id="defaultOpen" onclick="openPage('Home')">
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

					<div class="elementHome_second">
						<div class="container">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<?php
										include 'includes/Carousel.php';
										$conn = new Carousel();
										$conn->carousel();
									?>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>

								<a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>

					<div class="elementHome_first">
						primary
					</div>

					<div class="elementHome_third">
						terceiro
					</div>

					<div class="elementHome_forth">
						quarto
					</div>
				</div>

				<div id="Hist" class="tabcontent">
					<div class="elementStats_primary">
						primary

					</div>

					<div class="elementStats_second">
						second
					</div>
					<div class="elementStats_third">
						third
					</div>
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
			<div class="slide Center">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore corporis saepe quasi ipsa, minima qui suscipit magni. Obcaecati, ad. Ea, libero ex? Repellat vero accusantium nostrum, beatae alias quis odio. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis illum veniam suscipit corporis vero sapiente quae tempore nesciunt, sed quis aspernatur enim maxime, doloremque eius aut dolores molestiae officiis nihil?
			</div>
			<div class="slide Right"></div>
		</div>
	</div>
</body>
</html>