<?php

namespace App\Repositories;

use App\Models\Technology;
 
use App\Interface\TechnologyInterface;
 
class TechnologyRepository implements TechnologyInterface
{
     public function index()
    {
        $data = Technology::all();
        
        return $data;
    }


    public function store(array $data)
    {

        return Technology::create($data);
       
    }



    public function show(string $id)
    {
        return Technology::findOrFail($id);
    }


    public function update($id, array $data)
    {
        $RealTime = Technology::findOrFail($id);

        $RealTime->update($data);
        return $RealTime;
    }



    public function destroy(string $id)
    {
        $RealTime = Technology::findOrFail($id);


        $RealTime->delete();

        return response()->json(['success' => true, 'message' => 'Technology item and its image deleted successfully.']);
    }
}
