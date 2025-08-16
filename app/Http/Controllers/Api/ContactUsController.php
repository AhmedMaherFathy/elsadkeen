<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactUsRequest;
use App\Models\ContactUs;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    use HttpResponse;

    public function store(ContactUsRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $validated = ContactUs::create($validated);

        return $this->successResponse(message:__('user.create_success'));
    }
}
