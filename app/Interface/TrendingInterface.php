<?php 
namespace App\Interface;

 

interface TrendingInterface
{
    
    public function index();
   
    public function create();
 
    public function store(array $data);   
    
    public function show(string $id);
     
    public function edit(string $id);
     
    public function update($id, array $data) ;
 
    public function destroy(string $id);
    public function count();
}