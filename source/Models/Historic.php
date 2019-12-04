<?php
  namespace Source\Models;

  use CoffeeCode\DataLayer\DataLayer;

  class Historic extends DataLayer
  {

    public function __construct()
    {
      parent::__construct("HISTORIC", ["NAME_CHAMP", "PLAYER1", "PLAYER2", "P1VICTORY", "P2VICTORY"]);
    }
  }
?>