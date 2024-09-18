<?php 
namespace App\Interface;

use App\Http\Requests\RealTime\StoreRequest;

 

interface RealTimeInterface
{
    
    public function index();

    public function store(array $data);   
    
    public function show(string $id);
          
    public function update($id, array $data) ;
 
    public function destroy(string $id);
}