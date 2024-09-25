<?php

namespace App\Repositories;

use App\Models\Tutorial;
use App\Traits\Imageable;
use App\Interface\TutorialInterface;


class TutorialRepository implements TutorialInterface
{
    use Imageable;
    public function index()
    {
        $data = Tutorial::all();
        return $data;
    }


    public function store(array $data)
    {
        if (isset($data['image']) && $data['image'] != null) {
            $data['image'] = $this->setImageAttribute($data['image']);
        }

        if (isset($data['video']) && $data['video'] != null) {
            $data['video'] = $this->setVideoAttribute($data['video']);
        }

        return Tutorial::create($data);
    }

    public function show(string $id)
    {
        return Tutorial::findOrFail($id);
    }


    public function update($id, array $data)
    {
        $Tutorial = Tutorial::findOrFail($id);
        if (isset($data['video']) && $data['video'] != null) {
            $data['video'] = $this->setVideoAttribute($data['video'], $Tutorial->video);
        }
        if (isset($data['image']) && $data['image'] != null) {
            $data['image'] = $this->setImageAttribute($data['image'], $Tutorial->image);
        }

        $Tutorial->update($data);
        return $Tutorial;
    }



    public function destroy(string $id)
    {
        $Tutorial = Tutorial::findOrFail($id);
        if ($Tutorial) {
            $this->deleteImageTutorial($id);
            $this->deleteVideo($id);
        }

        $Tutorial->delete();

        return response()->json(['success' => true, 'message' => 'Tutorial item and its image deleted successfully.']);
    }
}
