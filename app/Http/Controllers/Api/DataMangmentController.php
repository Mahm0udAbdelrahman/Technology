<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Interface\DataMangmentInterface;
use App\Http\Requests\DataMangment\StoreRequest;

class DataMangmentController extends Controller
{
    protected $Report;

    public function __construct(DataMangmentInterface $Report)
    {
        $this->Report = $Report;
    }
    public function index()
    {
         $Report =  $this->Report->index();

       return ApiResource::getResponse(201,'all data' , ReportResource::collection($Report));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $Report  =  $this->Report->store($request->validated());
         return ApiResource::getResponse(201,'Report store' , new ReportResource($Report) );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Report = $this->Report->show($id);
 
        return ApiResource::getResponse(201,'Report show' , new ReportResource($Report));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $Report = $this->Report->update($id, $request->validated());

        return ApiResource::getResponse(201,'Report update' , new ReportResource($Report));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->Report->destroy($id);

        return response()->json(['message' => 'Report archive successfully']);
    }

    public function restore(string $id)
    {
        $this->Report->restore($id);

        return response()->json(['message' => 'Report restore successfully']);
    }

    public function ShowDelete()
    {
        $Report =  $this->Report->ShowDelete();
      

        return ApiResource::getResponse(201,'all data ShowDelete' , ReportResource::collection($Report));
    }

    public function force(string $id)
    {
       
        $this->Report->force($id);

        return response()->json(['message' => 'Report force successfully']);
    }

    public function restoreMultiple(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer'
        ]);
        return $this->Report->restoreMultiple($validated['ids']);
    }

    public function forceDeleteMultiple(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer'
        ]);
        return $this->Report->forceDeleteMultiple($validated['ids']);
    }
}
