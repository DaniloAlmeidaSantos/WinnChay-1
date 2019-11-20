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
    <form action="" method="post" enctype="multipart/form-data">
      <label>Selecionar imagem</label>
      <input type="file" name="upload"/>
    </form>
  </body>
</html>