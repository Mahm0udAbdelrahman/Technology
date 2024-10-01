<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Interface\ChartInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChartResource;
use App\Http\Requests\Chart\StoreRequest;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $Chart;

    public function __construct(ChartInterface $Chart)
    {
        $this->Chart = $Chart;
    }
    public function index()
    {
         $Chart =  $this->Chart->index();

       return ApiResource::getResponse(201,'all data' , ChartResource::collection($Chart));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $Chart  =  $this->Chart->store($request->validated());
         return ApiResource::getResponse(201,'Chart store' , $Chart  );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Chart = $this->Chart->show($id);

        return ApiResource::getResponse(201,'Chart show' , new ChartResource($Chart));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $Chart = $this->Chart->update($id, $request->validated());

        return ApiResource::getResponse(201,'Chart update' , new ChartResource($Chart));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->Chart->destroy($id);

        return response()->json(['message' => 'Chart deleted successfully']);
    }
}
