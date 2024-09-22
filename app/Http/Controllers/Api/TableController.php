<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Interface\TableInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\TableResource;
use App\Http\Requests\Table\StoreRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $table;

     public function __construct(TableInterface $table )
     {
        $this->table = $table;
     }
    public function index()
    {
       
        $Table =  $this->table->index();

        return ApiResource::getResponse(201,'all data' , TableResource::collection($Table));
 
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
    
        $table = $this->table->store($request->validated());
        return ApiResource::getResponse(201,'table show' , new TableResource($table));


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = $this->table->show($id);

        return ApiResource::getResponse(201,'table show' , new TableResource($table));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->table->destroy($id);

        return response()->json(['message' => 'Table deleted successfully']);
    }
}
