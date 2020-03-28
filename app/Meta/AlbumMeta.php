<?php

namespace App\Meta;

class AlbumMeta
{
  public string $name = '';
  public string $cover = '';
  public string $genre = '';
  public string $published = '';
  public string $artist = '';

  public function setName(string $value): void
  {
    $this->name = $value;
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
