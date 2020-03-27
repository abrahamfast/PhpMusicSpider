<?php

namespace App\Model;

class TrackMeta
{
  protected string $lyric = '';
  protected string $name = '';
  protected string $trackUrl = '';
  protected string $cover = '';
  protected string $genre = '';
  protected string $published = '';
  protected string $artist = '';

  public function setLyric($value)
  {
    $this->lyric = $value;
  }

  public function setName(string $value): void
  {
    $this->name = $value;
  }

  public function setTrackUrl($value): void
  {
    $this->trackUrl = $value;
  }

  public function setCover($value): void
  {
    $this->cover = $value;
  }

  public function setGenre($value): void
  {
    $this->genre = $value;
  }

  public function setPublished($value): void
  {
    $this->published = $value;
  }

  public function setArtist($value): void
  {
    $this->artist = $value;
  }

  public function toArray()
  {
    return (array) $this;
  }
}
