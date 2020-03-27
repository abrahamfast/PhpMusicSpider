<?php

namespace App\Core;

class Queue
{
  protected $path = 'storage/queue/';
  protected $selectFile = null;

  public function add($meta, $type)
  {
    $code = $this->generateCode();
    $meta = serialize($meta);
    file_put_contents($this->path . $type . "/" . $code, print_r($meta, true));

    return true;
  }

  public function work(string $type = null)
  {
    if($type){
        $files = scandir($this->path . $type);
        $this->selectFile =  $this->path . $type . "/" . $files[2];
    } else {
        $files = scandir($this->path);
        $this->selectFile =  $this->path . $files[2];
    }

    $content = file_get_contents($this->selectFile);

    return unserialize($content);
  }

  public function done()
  {
    if(file_exists($this->selectFile)){
        unlink($this->selectFile);
        return true;
    }

    return false;
  }

  public function failed()
  {
    if(file_exists($this->selectFile)){
        $code = $this->generateCode();
        file_put_contents($this->path . "failed/" .  $code, $this->selectFile);
        unlink($this->selectFile);
    }
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
