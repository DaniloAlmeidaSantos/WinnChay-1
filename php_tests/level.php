<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Levels</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Staatliches&display=swap" rel="stylesheet">
  </head>
  <body onload="startCountdown()">
  <SCRIPT>
  var g_iCount = new Number();
  var g_iCount = 30;
  function startCountdown(){
      if((g_iCount - 1) >= 0){
          g_iCount = g_iCount - 1;
          numberCountdown.innerText = g_iCount;
          setTimeout('startCountdown()',1000);
      }
  }
  </SCRIPT>
  <div id="numberCountdown"></div>
    <br><br>
    <div class="container">
      <div class="progress">
        <?php
          include '../includes/Score.php';
          $conn = new Score();
          $conn->levelWins(1);
          $conn->level(1);
        ?>
      </div>
    </div>
  </body>
</html>