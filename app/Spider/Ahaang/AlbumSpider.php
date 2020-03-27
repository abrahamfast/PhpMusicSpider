<?php

namespace App\Spider\Ahaang;

use App\Core\MainSpider as Spider;
use App\Meta\AlbumMeta as Meta;

class AlbumSpider extends Spider
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
    $this->spiderName();
    $this->spiderCover();
    $this->spiderPublished();
    $this->spiderArtist();
  }

  public function spiderName()
  {
    $d = $this->getDom()->filter('.single_text strong');
    if($d->count()){
      $name = $d->eq(1)->text();
      $this->getMeta()->setName($name);
    }

    return null;
  }

  public function spiderCover()
  {
    $d = $this->getDom()->filter('.single_cover img');
    if($d->count()){
      $content = $d->eq(0)->attr('src');
      $this->getMeta()->setCover($content);
    }

    return null;
  }

  public function spiderPublished()
  {
    $d = $this->getDom()->filter('.icon-calendar');
    if($d->count()){
      $content = $d->first()->text();
      $content = str_replace('تاریخ انتشار', '', $content);
      $this->getMeta()->setPublished($content);
    }

    return null;
  }

  public function spiderArtist()
  {
    $d = $this->getDom()->filter('ul li.icon-person a');
    if($d->count()){
      $content = $d->first()->text();
      $this->getMeta()->setArtist($content);
    }

    return null;
  }




}
