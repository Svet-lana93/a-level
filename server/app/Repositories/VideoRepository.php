<?php

namespace App\Repositories;

use App\Models\Video;

class VideoRepository
{
    public function list(): object
    {
        return Video::all();
    }

    public function byId(int $id): object
    {
        return Video::find($id);
    }

    public function create(array $data): object
    {
        $video = new Video;
        $video->user_id = $data['user_id'];
        $video->title = $data['title'];
        $video->description = $data['description'];
        $video->video = $data['video'];
        $video->save();
        return $video;
    }

    public function update(Video $video, array $data): object
    {
        $video->user_id = $data['user_id'];

        if (isset($data['title'])) {
            $video->title = $data['title'];
        }
        if (isset($data['description'])) {
            $video->description = $data['description'];
        }
        if (isset($data['video'])) {
            $video->video = $data['video'];
        }
        $video->save();

        return $video;
    }

    public function delete(Video $video)
    {
        $video->delete();
    }
}
