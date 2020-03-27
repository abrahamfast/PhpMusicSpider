<?php

namespace App\Core;

class Queue
{
  protected $path = 'storage/queue/';
  protected $selectFile = null;

  public function add($meta)
  {
    $code = $this->generateCode();
    $meta = serialize($meta);
    file_put_contents($this->path . $code, print_r($meta, true));

    return true;
  }

  public function work()
  {
    $files = scandir($this->path);
    $this->selectFile =  $this->path . $files[2];
    $content = file_get_contents($this->selectFile);

    return unserialize($content);
  }

  public function finish()
  {
    if(file_exists($this->$selectFile)){
        unlink($this->$selectFile);
        return true;
    }

    return false;
  }

  public function list()
  {
    $files = scandir($this->path);
    return count($files) - 2;
  }

  public function generateCode()
  {
    return date("Y-m-d H:m:s ") . md5(uniqid(''));
  }
}
