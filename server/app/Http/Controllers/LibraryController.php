<?php

namespace App\Http\Controllers;

use App\Repositories\LibraryRepository;
use App\Http\Traits\Permissions;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    private $libraryRepository;

    public function __construct(LibraryRepository $libraryRepository)
    {
        $this->libraryRepository = $libraryRepository;
    }

    public function index()
    {
        return view('libraries.list', ['libraries' => $this->libraryRepository->all()]);
    }

    public function create()
    {
        return view('libraries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'required|max:255']);
        $library = $this->libraryRepository->create($data);
        return redirect(route('libraries.show', ['library' => $library->id]));
    }

    public function show($id)
    {
        if (!$library = $this->libraryRepository->byId($id)) {
            abort(404);
        }

        return view('libraries.one', ['library' => $library]);
    }

    public function edit($id)
    {
        if (!$this->isSuperAdmin()) {
            abort(403);
        }
        if (!$library = $this->libraryRepository->byId($id)) {
            abort(404);
        }
        return view('libraries.update', ['library' => $library]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['title' => 'required|max:255']);

        if (!$library = $this->libraryRepository->byId($id)) {
            abort(404);
        }
        $library = $this->libraryRepository->update($library, $data);

        return redirect(route('libraries.show', ['library' => $library->id]));
    }

    public function destroy($id)
    {
        if (!$library = $this->libraryRepository->byId($id)) {
            abort(404);
        }
        $this->libraryRepository->destroy($library);

        return redirect(route('libraries.index'));
    }
}
