<?php

namespace App\Spider\Mrtehran;

use App\Core\MainSpider as Spider;
use App\Meta\ArtistMeta as Meta;
use App\Core\SpiderProvider;

class ArtistSpider extends Spider
{
  public function getMeta()
  {
    return $this->meta;
  }

  public function initMeta()
  {
    $this->meta = new Meta;
  }

  public function runSpider()
  {
    $this->initMeta();
    $tracks = $this->spiderTemp();
    foreach ($tracks as $track) {
      $this->trackProvider($track);
    }
  }

  public function spiderTemp()
  {
    $d = $this->getDom()->filter('.musicbox-tracks a');
    if($d->count()){
      $tracks = $d->each(function($node){
          return $node->attr('href');
      });
    }
  }

  public function trackProvider($url)
  {
    $provider = new SpiderProvider($url, 'track', 'Mrtehran');
    $provider->process();
  }
}
