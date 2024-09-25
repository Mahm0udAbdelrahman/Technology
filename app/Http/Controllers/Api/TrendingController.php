<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\TrendingInterface;
use App\Http\Resources\TraningResource;
use App\Http\Requests\Trending\StoreRequest;

class TrendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $TrendingRepository;
     public function __construct(TrendingInterface $TrendingRepository) {
        $this->TrendingRepository = $TrendingRepository;
    }
    public function index()
    {
        $Trending = $this->TrendingRepository->index();

        return ApiResource::getResponse(201,'all data' , TraningResource::collection($Trending));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $Trending = $this->TrendingRepository->store($request->validated());

        return ApiResource::getResponse(201,'Trending created' , new TraningResource($Trending));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Trending = $this->TrendingRepository->show($id);

        return ApiResource::getResponse(201,'Trending show' , new TraningResource($Trending));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $Trending = $this->TrendingRepository->update($id, $request->validated());

        return ApiResource::getResponse(201,'Trending update' , new TraningResource($Trending));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->TrendingRepository->destroy($id);

        return response()->json(['message' => 'Trending deleted successfully']);
    }


    public function count()
    {
        $count =   $this->TrendingRepository->count();

        return ApiResource::getResponse(201,'Trending show' ,  $count);
    }

}
