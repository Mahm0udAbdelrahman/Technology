<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Mail\MailContact;
use App\Events\NotificationEvent;
use App\Interface\ContactInterface;
use Illuminate\Support\Facades\Mail;

class ContactRepository implements ContactInterface
{
     public function index()
    {
        $data = Contact::all();
        
        return $data;
    }


    public function store(array $data)
    {


        $contact = Contact::create($data);

         Mail::to('mahmudabdelrahman0@gmail.com')->send(new MailContact($contact));
         $newMessage = new NotificationEvent($contact);
         broadcast($newMessage)->toOthers();
        return $contact;
    }



    public function show(string $id)
    {
        return Contact::findOrFail($id);
    }


    public function update($id, array $data)
    {
        $RealTime = Contact::findOrFail($id);

        $RealTime->update($data);
        return $RealTime;
    }



    public function destroy(string $id)
    {
        $RealTime = Contact::findOrFail($id);


        $RealTime->delete();

        return response()->json(['success' => true, 'message' => 'Contact item and its image deleted successfully.']);
    }
}
