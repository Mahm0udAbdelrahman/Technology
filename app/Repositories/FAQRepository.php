<?php

namespace App\Repositories;

use App\Models\FAQ;
use App\Interface\FAQInterface;

class FAQRepository implements FAQInterface
{
     public function index()
    {
        $data = FAQ::all();
        return $data;
    }


    public function store(array $data)
    {



        return   FAQ::create($data);
    }



    public function show(string $id)
    {
        return FAQ::findOrFail($id);
    }


    public function update($id, array $data)
    {
        $RealTime = FAQ::findOrFail($id);

        $RealTime->update($data);
        return $RealTime;
    }



    public function destroy(string $id)
    {
        $RealTime = FAQ::findOrFail($id);


        $RealTime->delete();

        return response()->json(['success' => true, 'message' => 'FAQ item and its image deleted successfully.']);
    }
}
