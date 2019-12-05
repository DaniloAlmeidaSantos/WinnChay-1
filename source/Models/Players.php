<?php
  namespace Source\Models;

  use CoffeeCode\DataLayer\DataLayer;

  class Players extends DataLayer
  {

    public function __construct()
    {
      parent::__construct("PLAYERS", ["FIRST_NAME", "LAST_NAME", "USERNAME", "EMAIL", "PASSWORD", "PHONE"], "IDPLAYER", false);
    }

  }
?>