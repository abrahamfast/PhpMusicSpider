<?php

namespace App\Tasks;



class Task
{
  public function run($type, $data)
  {
    $model = "\\App\\Model\\" . ucfirst($type);
    $this->model = new $model;

    if($type == 'track'){
      return $this->storeTrack($data);
    }

    if($type == 'album'){
      return $this->storeAlbum($data);
    }

    if($type == 'artist'){
      return $this->storeArtist($data);
    }

  }

  public function storeTrack($meta)
  {
    $number = $this->getModel()->orderBy('created_at', 'DESC')
                   ->first()->number;

    return $this->getModel()->create([
              'name' => $meta->name,
              'auto_update' => 1,
              'local_only' => 1,
              "number" => $number + 1,
              'description' => $meta->lyric,
              'image' => null
            ]);
  }

  public function storeAlbum($meta)
  {
    $artist = \App\Model\Artist::where('name', $meta->name)->first();

    return $this->getModel()->create([
              'name' => $meta->name,
              'image' => 1,
              'artist_id' => $artist ? $artist->id : 1,
              'description' => $meta->published
            ]);
  }

  public function storeArtist($meta)
  {
    return $this->getModel()->create([
              'name' => $meta->artisName,
              'image_small' => null,
              'image_large' => null,
              'bio_legacy' => $meta->bio
            ]);
  }

  public function getModel()
  {
    return $this->model;
  }
}
