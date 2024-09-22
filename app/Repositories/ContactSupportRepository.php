<?php

namespace App\Repositories;

use App\Interface\ContactSupportInterface;
use App\Mail\SimpleMail;
use App\Models\ContactSupport;
use Illuminate\Support\Facades\Mail;

class ContactSupportRepository implements ContactSupportInterface
{

    public function getAll()
    {
        return ContactSupport::all();
    }

    public function store(array $data)
    {
        // Send the email with the data from the contact support form
        Mail::to($data['email'])->send(new SimpleMail($data['email'], $data['question']));

        return 'Email has been sent successfully!';
    }
}