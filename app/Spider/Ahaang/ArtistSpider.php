<?php

namespace App\Spider\Ahaang;

use App\Core\MainSpider as Spider;
use App\Model\ArtistModel as Model;

class ArtistSpider extends Spider
{
  public function getModel()
  {
    return $this->model;
  }

  public function initModel()
  {
    $this->model = new Model;
  }

  public function trackProvider()
  {
    $track = new TrackSpider();
  }

  public function albumProvider()
  {
    $album = new AlbumSpider();
  }

  public function runSpider()
  {
    $this->initModel();

    $this->spiderArtist();
    $this->spiderBio();
    $this->spiderArtistNameLating();
    $this->spiderCover();

    $this->trackProvider();
    $this->albumProvider();
  }

  public function spiderArtist()
  {
    $d = $this->getDom()->filter('.profile_dtls strong');
    if($d->count()){
      $this->getModel()->setArtistName($d->text());
    }

    return null;
  }

  public function spiderBio()
  {
    $d = $this->getDom()->filter('.profile_bio');
    if($d->count()){
      $this->getModel()->setBio($d->text());
    }

    return null;
  }

  public function spiderArtistNameLating()
  {
    $d = $this->getDom()->filter('.profile_dtls h2');
    if($d->count()){
      $this->getModel()->setGenre($d->text());
    }

    return null;
  }

  public function spiderCover()
  {
    $d = $this->getDom()->filter('.profile_pic_main img');
    if($d->count()){
      $cover = $d->attr('src');
      $this->getModel()->setCover($cover);
    }

    return null;
  }

  public function spiderGenre()
  {
    $d = $this->getDom()->filter('.genre');
    if($d->count()){

    }

    return null;
  }


}
