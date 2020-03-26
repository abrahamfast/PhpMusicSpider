<?php

namespace App\Model;

use App\Core\MainModel as Model;

class extends Model
{
  protected string $artisName = '';
  protected string $artisNameLatin = '';
  protected string $bio = '';
  protected string $cover = '';
  protected string $genre = '';

  public function setArtistName($value)
  {
    $this->$artisName = $artisName;
  }

  public function setArtistNameLating(string $value): void
  {
    $this->artisNameLatin = $artisNameLatin;
  }

  public function setBio(string $value): void
  {
    $this->bio = $bio;
  }

  public function setCover($value): void
  {
    $this->cover = $cover;
  }

  public function setGenre($value): void
  {
    $this->genre = $value;
  }
}
