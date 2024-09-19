<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\RealTimeInterface;
use App\Http\Resources\RealTimeResource;
use App\Http\Requests\RealTime\StoreRequest;

class RealTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $RealTime;

     public function __construct(RealTimeInterface $RealTime )
     {
        $this->RealTime = $RealTime;
     }
    public function index()
    {
       $RealTime =  $this->RealTime->index();

       return ApiResource::getResponse(201,'all data' , RealTimeResource::collection($RealTime));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
       
        
        return  $this->RealTime->store($request->validated());
        // return response()->json([
        //     'message' => 'RealTime store successfully',
        //     'data' => new RealTimeResource::collection($RealTime)
        // ]);
        

        // return ApiResource::getResponse(201,'all data' , $RealTime);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
