<?php
namespace App\Repositories;

use App\Models\UserGuide;
use App\Interface\UserGuideInterface;
use Illuminate\Support\Facades\Request;

class UserGuideRepository implements UserGuideInterface
{
    public function index()
    {
        $data = UserGuide::all();
        return $data;

     }
   
    public function create()
    {

    }
 
    public function store(array $data)
    {
         

        return UserGuide::create($data);
    }
    
    public function show(string $id)
    {
        return UserGuide::findOrFail($id);
    }
     
    public function edit(string $id)
    {

    }
     
    public function update($id, array $data)
    {      
        $UserGuide = UserGuide::findOrFail($id);
        $UserGuide->update($data);
        return $UserGuide;
    }
 
    public function destroy(string $id)
    {
        $UserGuide = UserGuide::findOrFail($id);
        $UserGuide->delete();
        return true;
    }
}