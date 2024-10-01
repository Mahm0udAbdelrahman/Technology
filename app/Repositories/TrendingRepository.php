<?php

namespace App\Repositories;

use App\Models\Trending;
use App\Traits\Imageable;
use App\Interface\TrendingInterface;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class TrendingRepository implements TrendingInterface
{
    use Imageable;
    public function index()
    {
        $data = Trending::all();
        return $data;
    }

    public function create() {}

    public function store(array $data)
    {
        if ($data['image'] && $data['image'] != null) {
            $data['image'] = $this->setImageAttribute($data['image']);
        }
        return Trending::create($data);
    }

    public function show(string $id)
    {
        return Trending::findOrFail($id);
    }

    public function edit(string $id) {}

    public function update($id, array $data)
    {
        $trending = Trending::findOrFail($id);
        if ($data['image'] && $data['image'] != null) {
            $data['image'] = $this->setImageAttribute($data['image'], $trending->image);
        }

        $trending->update($data);
        return $trending;
    }



    public function destroy(string $id)
    {
        $trending = Trending::findOrFail($id);
        if ($trending) {
            $this->deleteImage($id);
        }

        $trending->delete();

        return response()->json(['success' => true, 'message' => 'Trending item and its image deleted successfully.']);
    }

    public function count()
    {
       
        $count = Trending::count();
        return $count;
    }
}
