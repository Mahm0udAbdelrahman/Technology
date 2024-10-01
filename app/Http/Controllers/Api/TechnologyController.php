<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Interface\TechnologyInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\TechnologyResource;
use App\Http\Requests\Technology\StoreRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $Technology;

    public function __construct(TechnologyInterface $Technology)
    {
        $this->Technology = $Technology;
    }
    public function index()
    {
         $Technology =  $this->Technology->index();

       return ApiResource::getResponse(201,'all data' , TechnologyResource::collection($Technology));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $Technology  =  $this->Technology->store($request->validated());
         return ApiResource::getResponse(201,'Technology store' , new TechnologyResource($Technology) );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Technology = $this->Technology->show($id);

        return ApiResource::getResponse(201,'Technology show' , new TechnologyResource($Technology));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $Technology = $this->Technology->update($id, $request->validated());

        return ApiResource::getResponse(201,'Technology update' , new TechnologyResource($Technology));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->Technology->destroy($id);

        return response()->json(['message' => 'Technology deleted successfully']);
    }
}
