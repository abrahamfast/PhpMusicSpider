<?php

namespace App\Spider\{className};

use App\Core\MainSpider as Spider;
use App\Model\ArtistMeta as Meta;

class ArtistSpider extends Spider
{
  public function getMeta()
  {
    return $this->meta;
  }

  public function initMeta()
  {
    $this->model = new Meta;
  }

  public function runSpider()
  {
    $this->initMeta();
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
