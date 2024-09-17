<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\UserGuideInterface;
use App\Http\Resources\UserGuideResource;
use App\Http\Requests\UserGuide\StoreRequest;
use App\Http\Requests\UserGuide\UpdateRequest;

class UserGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $UserGuideRepository;
     public function __construct(UserGuideInterface $UserGuideRepository) {
        $this->UserGuideRepository = $UserGuideRepository;
    }
    public function index()
    {
        $UserGuide = $this->UserGuideRepository->index();

        return ApiResource::getResponse(201,'all data' , UserGuideResource::collection($UserGuide));
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
        $UserGuide = $this->UserGuideRepository->store($request->validated());

         return ApiResource::getResponse(201,'UserGuide created' , new UserGuideResource($UserGuide));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $UserGuide = $this->UserGuideRepository->show($id);

        return ApiResource::getResponse(201,'UserGuide show' , new UserGuideResource($UserGuide));
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
        $UserGuide = $this->UserGuideRepository->update($id, $request->validated());

         return ApiResource::getResponse(201,'UserGuide updated' , new UserGuideResource($UserGuide));


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->UserGuideRepository->destroy($id);

        return response()->json(['message' => 'UserGuide deleted successfully']);



    }
}
