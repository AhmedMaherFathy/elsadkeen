<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use HttpResponse;

    public function aboutUs()
    {
        $aboutUs = AboutUs::first();
        
        return $this->successResponse(data:$aboutUs);
    }
}
