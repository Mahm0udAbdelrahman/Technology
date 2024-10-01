<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Interface\DataInsightInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataInsightResource;
use App\Http\Requests\DataInsight\StoreRequest;

class DataInsightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $DataInsight;

    public function __construct(DataInsightInterface $DataInsight)
    {
        $this->DataInsight = $DataInsight;
    }
    public function index()
    {
         $DataInsight =  $this->DataInsight->index();

       return ApiResource::getResponse(201,'all data' , DataInsightResource::collection($DataInsight));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
       
        $DataInsight  =  $this->DataInsight->store($request->validated());
         return ApiResource::getResponse(201,'DataInsight store' , $DataInsight );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $DataInsight = $this->DataInsight->show($id);

        return ApiResource::getResponse(201,'DataInsight show' , new DataInsightResource($DataInsight));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $DataInsight = $this->DataInsight->update($id, $request->validated());

        return ApiResource::getResponse(201,'DataInsight update' , new DataInsightResource($DataInsight));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->DataInsight->destroy($id);

        return response()->json(['message' => 'DataInsight deleted successfully']);
    }
}
