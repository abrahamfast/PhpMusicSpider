<?php

namespace App\Spider\Ahaang;

use App\Core\MainSpider as Spider;
use App\Meta\ArtistMeta as Meta;

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

  public function trackProvider()
  {
    $tracks = $this->getMusicLinkList();
    if (count($tracks)) {
      foreach ($tracks as $link) {
        var_dump($link);
        $track = new \App\Core\SpiderProvider($link, 'track', 'ahaang');
        $track->process();
      }

    }

  }

  public function albumProvider()
  {
    $album = new AlbumSpider();
  }

  public function runSpider()
  {
    $this->initMeta();

    $this->spiderArtist();
    $this->spiderBio();
    $this->spiderArtistNameLating();
    $this->spiderCover();


    $this->trackProvider();
    // $this->albumProvider();
  }

  public function spiderArtist()
  {
    $d = $this->getDom()->filter('.profile_dtls strong');
    if($d->count()){
      $this->getMeta()->setArtistName($d->text());
    }

    return null;
  }

  public function spiderBio()
  {
    $d = $this->getDom()->filter('.profile_bio');
    if($d->count()){
      $this->getMeta()->setBio($d->text());
    }

    return null;
  }

  public function spiderArtistNameLating()
  {
    $d = $this->getDom()->filter('.profile_dtls h2');
    if($d->count()){
      $this->getMeta()->setGenre($d->text());
    }

    return null;
  }

  public function spiderCover()
  {
    $d = $this->getDom()->filter('.profile_pic_main img');
    if($d->count()){
      $cover = $d->attr('src');
      $this->getMeta()->setCover($cover);
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

  public function getMusicLinkList()
  {
    $list_url = getenv('SPIDERBASEURL') . urlencode(
			str_replace(' ', '-', $this->getMeta()->artisName)
		);

    $spider = new \App\Core\MainSpider($list_url);
  	$list = $spider->getDom()->filter('.profile_box_body a')
                   ->each(function(\Symfony\Component\DomCrawler\Crawler $node, $i){
                  			if(!$node->filter('.soon')->count()) {
                  				return $node->attr('href');
                  			}
                  	});

  		return $list;
  }


}
