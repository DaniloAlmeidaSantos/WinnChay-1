<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="" method="post">
      <label>Número de jogadores</label>
      <select name='cboNPlayers' required>
    		<option value='8'>
    			8 - Jogadores
    		</option>
    		<option value='16'>
    			16 - Jogadores
    		</option>
    	</select>
      <br><br>
      <label>Data de início</label>
      <input type="date" name="date">
      <br><br>
      <label>Plataforma</label>
      <select name='cboPlatform' required>
    		<option value='1'>
    	    PC
    		</option>
    		<option value='2'>
    			PS4
    		</option>
        <option value='3'>
    			XBOX ONE
    		</option>
    	</select>
      <br><br>
      <label>Prêmios</label>
      <input type="text" name="txtAwards">
      <br><br>
      <label>Descrição</label>
      <input type="text" name="txtDesc">
      <br><br>
      <label>Nome do campeonato</label>
      <input type="text" name="txtName">
      <br>
      <button name="btnOrganizar">Sorteio</button>
    </form>
    <?php
      if (isset($_POST['btnOrganizar'])):
        include '../includes/CreateChamp.php';
        include '../includes/Organize.php';

        $champ = new Championship();
        $Organize = new Organize();

        if ($champ->createNumPlayers($_POST['cboNPlayers'])):
          if ($champ->createChamp($_POST['date'], $_POST['cboPlatform'], $_POST['txtAwards'], $_POST['txtDesc'], $_POST['txtName'])):
            $champ->createTb();
          endif;
        endif;
        $champ->insertChamp('a', '1');
        $champ->insertChamp('b', '2');
        $champ->insertChamp('c', '3');
        $champ->insertChamp('d', '4');
        $champ->insertChamp('e', '5');
        $champ->insertChamp('f', '6');
        $champ->insertChamp('g', '7');
        $champ->insertChamp('h', '8');
        $champ->insertChamp('i', '9');
        $champ->insertChamp('j', '10');
        $champ->insertChamp('k', '11');
        $champ->insertChamp('l', '12');
        $champ->insertChamp('n', '13');
        $champ->insertChamp('m', '14');
        $champ->insertChamp('o', '15');
        $champ->insertChamp('p', '16');

        $Organize->competitors($_POST['cboNPlayers']);
      endif;
    ?>
  </body>
</html>