<?php

namespace App\Http\Controllers;

use App\Repositories\VideoRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    private $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function getList()
    {
        return view('videos.list', ['videos' => $this->videoRepository->list()]);
    }

    public function getOne($video)
    {
        if (!$video = $this->videoRepository->byId($video)) {
            abort(404);
        }

        return view('videos.one', ['video' => $video]);
    }

    public function create(UserRepository $userRepository)
    {
        return view('videos.create', ['users' => $userRepository->list()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'video' => ['required', 'max:255']]
        );
        try {
            $video = $this->videoRepository->create($data);
        } catch (Exception $e) {
            //
        }
        return redirect(route('videos.getVideo', ['video' => $video]));
    }

    public function update($video, UserRepository $userRepository)
    {
        if (!$video = $this->videoRepository->byId($video)) {
            abort(404);
        }
        return view('videos.update', ['video' => $video, 'users' => $userRepository->list()]);
    }

    public function edit($video, Request $request)
    {
        $data = $request->validate(
            ['user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'video' => ['required', 'max:255']]
        );


        if (!$video = $this->videoRepository->byId($video)) {
            abort(404);
        }
        $video = $this->videoRepository->update($video, $data);

        return redirect(route('videos.getVideo', ['video' => $video]));
    }

    public function delete($video)
    {
        if (!$video = $this->videoRepository->byId($video)) {
            abort(404);
        }
        $this->videoRepository->delete($video);
        return redirect(route('videos.getList'));
    }

    public function userVideos($id, UserRepository $userRepository)
    {
        return view('videos.user-videos', ['user' => $userRepository->byId($id)]);
    }
}
