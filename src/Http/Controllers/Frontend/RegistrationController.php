<?php

namespace JakeRw\EventRegistration\Controllers\Frontend;

use JakeRw\EventRegistration\Controllers\Controller;

use JakeRw\EventRegistration\Requests\Admin\Registrations\AddRegistration;
use JakeRw\EventRegistration\Models\Registration;
use JakeRw\EventRegistration\Events\RegistrationPlaced;

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
