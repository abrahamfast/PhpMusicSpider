<?php

namespace App\Spider\Ahaang;

use App\Core\MainSpider as Spider;
use App\Model\TrackModel as Model;

class TrackSpider extends Spider
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
    $this->spiderLyric();
    $this->spiderTrackUrl();
    $this->spiderCover();
    $this->spiderGenre();
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

  public function spiderLyric()
  {
    $d = $this->getDom()->filter('.lyric_box');
    if($d->count()){
      $content = $d->text();
      $this->getModel()->setLyric($content);
    }

    return null;
  }

  public function spiderTrackUrl()
  {
    $d = $this->getDom()->filter('.single_track_320');
    if($d->count()){
      $content = $d->first()->attr('href');
      $this->getModel()->setTrackUrl($content);
    }

    return null;
  }

  public function spiderCover()
  {
    $d = $this->getDom()->filter('.single_pic img');
    if($d->count()){
      $content = $d->eq(0)->attr('src');
      $this->getModel()->setCover($content);
    }

    return null;
  }

  public function spiderGenre()
  {
    $d = $this->getDom()->filter('.icon-school a');
    if($d->count()){
      $content = $d->first()->text();
      $this->getModel()->setGenre($content);
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
