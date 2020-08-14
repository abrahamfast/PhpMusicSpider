<?php

namespace App\Spider\Mrtehran;

use App\Core\MainSpider as Spider;
use App\Meta\TrackMeta as Meta;

class TrackSpider extends Spider
{

  public function runSpider()
  {
    $this->spiderTemp();
  }

  public function spiderTemp()
  {
    $this->getDom()->filter('#waveform');
    if($d->count()){
      var_dump($d->first()->attr('waveform-audio'));die;
    }
  }

}
