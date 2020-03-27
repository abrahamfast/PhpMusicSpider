<?php

namespace App\Core;

class Generator
{
  protected string $provider = '';

  public function __construct($providerName)
  {
    $this->provider = $providerName;
  }

  public function getTemplate($template)
  {
    return file_get_contents('app/Core/SpiderTemplate/' . $template . ".php");
  }

  public function generateTemplate($template)
  {
      $class = $this->getTemplate($template);
      return str_replace('{className}', $this->provider, $class);
  }

  public function write($provider, $newTemplate)
  {
      file_put_contents('app/Spider/' . $this->provider . '/' . $provider, $newTemplate);
  }

  public function writeTmp()
  {
    $this->mkdir();

    $trackSpider = $this->generateTemplate('TrackSpider');
    $this->write('TrackSpider', $trackSpider);

    $albumSpider = $this->generateTemplate('AlbumSpider');
    $this->write('AlbumSpider', $albumSpider);

    $artistSpider = $this->generateTemplate('ArtistSpider');
    $this->write('ArtistSpider', $artistSpider);
  }

  public function mkdir()
  {
    exec('mkdir ' . 'app/Spider/' . $this->provider);
  }

}
