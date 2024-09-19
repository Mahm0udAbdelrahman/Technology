<?php

namespace App\Repositories;

use App\Models\RealTime;
use App\Traits\Imageable;
use App\Interface\RealTimeInterface;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class RealTimeRepository implements RealTimeInterface
{
    use Imageable;
    public function index()
    {
        $data = RealTime::all();
        return $data;
    }


    public function store(array $data)
    {
        $charts = [];
        foreach ($data['charts'] as $chart) {

            if (isset($chart['series']) && is_string($chart['series'])) {
                $chart['series'] = json_decode($chart['series'], JSON_UNESCAPED_SLASHES);
            }
            if (isset($chart['categories']) && is_string($chart['categories'])) {
                $chart['categories'] = json_decode($chart['categories'], JSON_UNESCAPED_SLASHES);
            }

            $charts[] = RealTime::create($chart);
        }
        return $charts;
    }



    public function show(string $id)
    {
        return RealTime::findOrFail($id);
    }


    public function update($id, array $data)
    {
        $RealTime = RealTime::findOrFail($id);

        $RealTime->update($data);
        return $RealTime;
    }



    public function destroy(string $id)
    {
        $RealTime = RealTime::findOrFail($id);


        $RealTime->delete();

        return response()->json(['success' => true, 'message' => 'RealTime item and its image deleted successfully.']);
    }
}
