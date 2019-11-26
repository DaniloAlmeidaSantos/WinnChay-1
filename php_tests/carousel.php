<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="jumbotron">
      <div class="row featurette">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
              include '../includes/Carousel.php';
              $carousel = new Carousel();
              $carousel->liCarousel();
            ?>
          </ol>

          <div class="carousel-inner">
            <?php
              $carousel->itemCarousel();
            ?>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function () {
				//tempo de duração do slide
				$('.carousel').carousel({
					interval: 7000
				});

				$('#myCarousel').on('slid.bs.carousel', function () {
					//Receber o valor do atributo data-slide-to quando estiver ativo
					var numeroSlide = $('#valor-car.active').data('slide-to');
					//$("#msg").html(numeroSlide);

					//Ocultar a descrição do slide anterior
					//$('.conteudo').hide();

					//Apresentar o conteúdo do slide atual
					//$('.imagem' + numeroSlide).show();
				});
			});
		</script>
  </body>
</html>