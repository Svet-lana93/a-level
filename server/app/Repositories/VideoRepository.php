<?php

namespace App\Repositories;

use App\Models\Video;

class VideoRepository
{
    public function list()
    {
        return Video::all();
    }

    public function byId(int $id)
    {
        return Video::find($id);
    }

    public function create(array $data)
    {
        $video = new Video;
        $video->user_id = $data['user_id'];
        $video->title = $data['title'];
        $video->description = $data['description'];
        $video->video = $data['video'];
        $video->save();
        return $video;
    }

    public function update(Video $video, array $data)
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
        return $video;
    }
}
