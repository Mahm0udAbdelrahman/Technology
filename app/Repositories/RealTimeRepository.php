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
     
        $chart =[];
        foreach($data['charts'] as $charts)
        {
         $chart[] = RealTime::create( $charts);  
        }
        return $chart;
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
