<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArtistModel extends Model
{
  protected string $artisName = '';
  protected string $artisNameLatin = '';
  protected string $bio = '';
  protected string $cover = '';
  protected string $genre = '';

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
