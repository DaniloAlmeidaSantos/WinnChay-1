<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    <style>
      input[type='file'] {
        display: none
      }
      /*Aparência do selector, nesse caso utilizando uma label */
      label {
        background-color: yellow;
        color: black;
      }
      </style>
    </style>
  </head>
  <body>
  <form id="formulario" method="post" enctype="multipart/form-data" action="upload.php">
    Foto
    <input type="file" id="image" name="image" />
  </form>
  <div id="visualizar"></div>

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> -->
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
         /* #imagem é o id do input, ao alterar o conteudo do input execurará a função baixo */
         $('#image').live('change',function(){
             $('#visualizar').html('<img src="ajax-loader.gif" alt="Enviando..."/> Enviando...');
            /* Efetua o Upload sem dar refresh na pagina */
            $('#formulario').ajaxForm({
                target:'#visualizar' // o callback será no elemento com o id #visualizar
             }).submit();
         });
      })
    </script>
  </body>
</html>