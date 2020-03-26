<?php

namespace App\Core;

class SpiderProvider
{
  protected string $url;
  protected string $site

  public function __construct(string $url)
  {
    $this->$url = $url;
  }

  public function getProvider()
  {
  }

  public function process()
  {

  }

}
