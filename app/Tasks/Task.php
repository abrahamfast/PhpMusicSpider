<?php

namespace App\Tasks;



class Task
{
  public function run($type, $data)
  {
    $model = "\\App\\Model\\" .ucfirst($type);
    $this->model = new $model;
    if($type == 'track'){
      $this->storeTrack($data);
      return true;
    }

  }

  public function storeTrack($data)
  {
    $this->getModel()->create([
      'name' => $data['name'],
      'auto_update' => 1,
      'local_only' => 'storage/track_image_media/dUHxZQXJ7cKHi5XWl3qcA3AKAwxbPp6T6wTvlSEW.jpg'
      'description' => $date['lyric'];
    ]);
  }

  public function getModel()
  {
    return $this->model;
  }
}
