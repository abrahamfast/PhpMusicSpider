<?php

namespace App\Spider\{className};

use App\Core\MainSpider as Spider;
use App\Model\AlbumModel as Model;

class AlbumSpider extends Spider
{
  public function getModel()
  {
    return $this->model;
  }

  public function initModel()
  {
    $this->model = new Model;
  }

  public function runSpider()
  {
    $this->initModel();
    $this->spiderTemp();
  }

  public function spiderTemp()
  {
    $d = $this->getDom()->filter('enter your filter');
    if($d->count()){
      $name = $d->eq(1)->text();
      $this->getModel()->setName($name);
    }

    return null;
  }




}
