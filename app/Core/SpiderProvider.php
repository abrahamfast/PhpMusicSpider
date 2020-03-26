<?php

namespace App\Core;

class SpiderProvider
{
  protected string $url;
  protected string $site;
  // types are artist track and album Provider
  protected string $type;
  protected string $providerName;

  public function __construct($url, $type, $providerName)
  {
    $this->url = $url;
    $this->setType($type);
    $this->providerName = $providerName;
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

    return $provider->getModel();
  }

  public function process()
  {
    $this->getProvider();
    $model = $this->runProvider();

    var_dump($model);
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
