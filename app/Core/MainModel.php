<?php

namespace App\Core;


abstract class MainModel
{
  public function __set(string $name, string $value)
  {
    if($name && $value) {
      $this->{$name} = $value;
    }
  }
}
