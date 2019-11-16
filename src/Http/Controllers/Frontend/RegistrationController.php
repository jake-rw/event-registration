<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Registrations\AddRegistration;
use App\Models\Registration;
use App\Events\RegistrationPlaced;

class RegistrationController extends Controller
{
    // public function store()
    public function store(AddRegistration $request)
    {
        $data = array_merge($request->validated(), [
            'cf_company' => 'NO COMPANY',
            'cf_consent' => true
        ]);

        $item = Registration::create($data);

        event(new RegistrationPlaced($item));

        return redirect()
            ->route('home')
            ->with('success', 'Thank you, your registration has been sent to our team.');
    }
}
