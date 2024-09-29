<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResource;
use Illuminate\Http\Request;
use App\Interface\ContactInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Http\Requests\Contact\StoreRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $Contact;

    public function __construct(ContactInterface $Contact)
    {
        $this->Contact = $Contact;
    }
    public function index()
    {
         $Contact =  $this->Contact->index();

       return ApiResource::getResponse(201,'all data' , ContactResource::collection($Contact));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $Contact  =  $this->Contact->store($request->validated());
         return ApiResource::getResponse(201,'Contact store' , new ContactResource($Contact) );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Contact = $this->Contact->show($id);

        return ApiResource::getResponse(201,'Contact show' , new ContactResource($Contact));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $Contact = $this->Contact->update($id, $request->validated());

        return ApiResource::getResponse(201,'Contact update' , new ContactResource($Contact));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->Contact->destroy($id);

        return response()->json(['message' => 'Contact deleted successfully']);
    }
}
