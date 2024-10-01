<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use App\Interface\FAQInterface;
use App\Http\Resources\FAQResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQ\StoreRequest;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $FAQ;

    public function __construct(FAQInterface $FAQ)
    {
        $this->FAQ = $FAQ;
    }
    public function index()
    {
         $FAQ =  $this->FAQ->index();

       return ApiResource::getResponse(201,'all data' , FAQResource::collection($FAQ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $FAQ  =  $this->FAQ->store($request->validated());
         return ApiResource::getResponse(201,'FAQ store' , new FAQResource($FAQ) );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $FAQ = $this->FAQ->show($id);

        return ApiResource::getResponse(201,'FAQ show' , new FAQResource($FAQ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $FAQ = $this->FAQ->update($id, $request->validated());

        return ApiResource::getResponse(201,'FAQ update' , new FAQResource($FAQ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->FAQ->destroy($id);

        return response()->json(['message' => 'FAQ deleted successfully']);
    }
}
