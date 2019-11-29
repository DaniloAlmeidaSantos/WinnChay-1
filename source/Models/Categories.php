<?php
  namespace Source\Models;

  use CoffeeCode\DataLayer\DataLayer;

  class Categories extends DataLayer
  {

    public function __construct()
    {
      parent::__construct("CATEGORIES", ["CATEGORY"], "IDCATEGORY", false);
    }

  }
?>