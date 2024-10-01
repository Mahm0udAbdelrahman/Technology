<?php

namespace App\Repositories;

use App\Models\InsightTechnology;
use App\Mail\MailContact;
use App\Events\NotificationEvent;
use App\Interface\InsightTechnologyInterface;
use Illuminate\Support\Facades\Mail;

class InsightTechnologyRepository implements InsightTechnologyInterface
{
     public function index()
    {
        $data = InsightTechnology::all();
        
        return $data;
    }


    public function store(array $data)
    {
        

    }



    public function show(string $id)
    {
        return InsightTechnology::findOrFail($id);
    }


    public function update($id, array $data)
    {
        
    }



    public function destroy(string $id)
    {
        $RealTime = InsightTechnology::findOrFail($id);


        $RealTime->delete();

        return response()->json(['success' => true, 'message' => 'InsightTechnology item and its image deleted successfully.']);
    }
}
