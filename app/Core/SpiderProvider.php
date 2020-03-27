<?php

namespace App\Core;

use App\Core\Queue;

class SpiderProvider
{
  protected string $url;
  protected string $site;
  // types are artist track and album Provider
  protected string $type;
  protected string $providerName;
  protected $provider;

  public function __construct($url, $type, $providerName)
  {
    $this->url = $url;
    $this->setType($type);
    $this->providerName = $providerName;
    $this->queue = new Queue;
  }

  public function getProvider()
  {
    $providerPath = "App\\Spider\\" . ucfirst($this->providerName) . "\\";
    $provider = $providerPath . ucfirst($this->getType()) . "Spider";

    $this->provider = $provider;
  }

  public function runProvider()
  {
    $provider = new $this->provider($this->url);
    $provider->runSpider();

    return $provider->getMeta();
  }

  public function process()
  {
    $this->getProvider();
    $meta = $this->runProvider();
    $this->getQueue()->add(
      $meta->toArray(), $this->type
    );
  }

  public function getQueue()
  {
    return $this->queue;
  }

  public function setType($value)
  {
    $this->type = $value;
  }

  public function getType()
  {
    return $this->type;
  }

}
