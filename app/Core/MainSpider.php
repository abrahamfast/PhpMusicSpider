<?php
namespace App\Core;

use Symfony\Component\DomCrawler\Crawler;
use Goutte\Client;

class MainSpider
{
  protected string $url;
  protected $dom;

  function __construct($url)
  {
    $client = new Client;
    $this->dom = $client->request('GET', $url);
  }

  public function getDom()
  {
    return $this->dom;
  }

}
