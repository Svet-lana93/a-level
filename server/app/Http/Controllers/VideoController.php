<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;

class VideoController extends Controller
{
    public function getList()
    {
        return view('videos.list', ['videos' => Video::all()]);
    }

    public function getOne(Video $video)
    {
        return view('videos.one', ['video' => $video]);
    }

    public function create(Request $request)
    {
        $users = User::all();
        if ($request->getMethod() === Request::METHOD_POST) {
            $video = Video::create(
                ['user_id' => $request->user,
                'title' => $request->title,
                'description' => $request->description,
                'video' => $request->video,]
            );
            $video->save();
            return redirect(route('videos.getList'));
        }
        return view('videos.create', ['users' => $users]);
    }

    public function update(Video $video, Request $request)
    {
        $users = User::all();
        if ($request->getMethod() === Request::METHOD_PUT) {
            $video->user_id = $request->user;
            $video->title = $request->title;
            $video->description = $request->description;
            $video->video = $request->video;
            $video->save();
            return redirect(route('videos.getVideo', ['video' => $video]));
        }
        return view('videos.update', ['video' => $video, 'users' => $users]);
    }

    public function delete(Video $video)
    {
        $video->delete();
        return redirect(route('videos.getList'));
    }

    public function userVideos(User $user)
    {
        return view('videos.user-videos', ['user' => $user]);
    }
}
