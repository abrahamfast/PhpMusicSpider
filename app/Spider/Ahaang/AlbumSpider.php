<?php

namespace App\Spider\Ahaang;

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
      $this->getModel()->setName($name);
    }

    return null;
  }

  public function spiderCover()
  {
    $d = $this->getDom()->filter('.single_cover img');
    if($d->count()){
      $content = $d->eq(0)->attr('src');
      $this->getModel()->setCover($content);
    }

    return null;
  }

  public function spiderPublished()
  {
    $d = $this->getDom()->filter('.icon-calendar');
    if($d->count()){
      $content = $d->first()->text();
      $content = str_replace('تاریخ انتشار', '', $content);
      $this->getModel()->setPublished($content);
    }

    return null;
  }

  public function spiderArtist()
  {
    $d = $this->getDom()->filter('ul li.icon-person a');
    if($d->count()){
      $content = $d->first()->text();
      $this->getModel()->setArtist($content);
    }

    return null;
  }




}
