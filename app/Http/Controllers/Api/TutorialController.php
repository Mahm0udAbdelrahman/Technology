<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\TutorialInterface;
use App\Http\Resources\TutorialResource;
use App\Http\Requests\Tutorial\StoreRequest;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $Tutorial;
     public function __construct(TutorialInterface $Tutorial) {
        $this->Tutorial = $Tutorial;
    }
    public function index()
    {
        $Tutorial = $this->Tutorial->index();

        return ApiResource::getResponse(201,'all data' , TutorialResource::collection($Tutorial));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $Tutorial = $this->Tutorial->store($request->validated());

        return ApiResource::getResponse(201,'Tutorial created' , new TutorialResource($Tutorial));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Tutorial = $this->Tutorial->show($id);

        return ApiResource::getResponse(201,'Tutorial show' , new TutorialResource($Tutorial));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $Tutorial = $this->Tutorial->update($id, $request->validated());

        return ApiResource::getResponse(201,'Tutorial update' , new TutorialResource($Tutorial));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->Tutorial->destroy($id);

        return response()->json(['message' => 'Tutorial deleted successfully']);
    }

}
