<?php

namespace App\Repositories;

use App\Models\RealTime;
use App\Traits\Imageable;
use App\Interface\TableInterface;
use App\Models\Table;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class TableRepository implements TableInterface
{

    protected $model;

     public function __construct(Table $model)
     {
        $this->model = $model;
     }
    public function index()
    {
        $data = $this->model->all();
         
        return $data;
    }


    public function store(array $data)
    { 
        
        return $this->model->create($data);

        
    }



    public function show(string $id)
    {
        return $this->model->findOrFail($id);
    }


    public function update($id, array $data)
    {
         
    }



    public function destroy(string $id)
    {
        $table =  $this->show($id);
        $table->delete();
    }
}
