<?php

namespace App\Repositories;

use App\Models\Library;

class LibraryRepository
{
    public function all(): object
    {
        return Library::all();
    }

    public function byId(int $id): object
    {
        return Library::find($id);
    }

    public function create(array $data): object
    {
        $library = new Library;
        $library->title = $data['title'];
        $library->save();
        return $library;
    }

    public function update(Library $library, $data): object
    {
        $library->title = $data['title'];
        $library->save();
        return $library;
    }

    public function destroy(Library $library)
    {
        $library->delete();
    }
}
