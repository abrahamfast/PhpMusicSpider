<?php

namespace App\Spider\Ahaang;

use App\Core\MainSpider as Spider;
use App\Meta\TrackMeta as Meta;

class TrackSpider extends Spider
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
    if($d->count() > 1){
      $name = $d->eq(1)->text();
      $this->getMeta()->setName($name);
    } elseif($d->count() == 1){
      $d = $this->getDom()->filter('li.icon-audiotrack');
      $name = $d->first()->text();
      $name = str_replace("عنوان اثر", "", $name);
      $this->getMeta()->setName($name);
    }

    return null;
  }

  public function spiderLyric()
  {
    $d = $this->getDom()->filter('.lyric_box');
    if($d->count()){
      $content = $d->text();
      $this->getMeta()->setLyric($content);
    }


    return null;
  }

  public function spiderTrackUrl()
  {
    $d = $this->getDom()->filter('.single_track_320');
    if($d->count()){
      $content = $d->first()->attr('href');
      $this->getMeta()->setTrackUrl($content);
    }

    return null;
  }

  public function spiderCover()
  {
    $d = $this->getDom()->filter('.single_pic img');
    if($d->count()){
      $content = $d->first()->attr('src');
      $this->getMeta()->setCover($content);
    }

    return null;
  }

  public function spiderGenre()
  {
    $d = $this->getDom()->filter('.icon-school a');
    if($d->count()){
      $content = $d->first()->text();
      $this->getMeta()->setGenre($content);
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
