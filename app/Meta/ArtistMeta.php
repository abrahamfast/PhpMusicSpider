<?php

namespace App\Meta;

class ArtistMeta
{
  public string $artisName = '';
  public string $artisNameLatin = '';
  public string $bio = '';
  public string $cover = '';
  public string $genre = '';

  public function setArtistName($value)
  {
    $this->artisName = $value;
  }

  public function setArtistNameLating(string $value): void
  {
    $this->artisNameLatin = $value;
  }

  public function setBio(string $value): void
  {
    $this->bio = $value;
  }

  public function setCover($value): void
  {
    $this->cover = $value;
  }

  public function setGenre($value): void
  {
    $this->genre = $value;
  }

  public function toArray()
  {
    return (array) $this;
  }
}
