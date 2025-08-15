<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function viewAboutUs()
    {
        $about = AboutUs::first();
        return view('dashboard.about-us.index',compact('about'));
    }

    public function updateAboutUs(Request $request)
    {
        $validated = $request->validate([
                            'description' => 'required'
                        ]);
        $about = AboutUs::first();
        $about->update($validated);

        return redirect()->back()->with('success',__('user.update_success'));
    }
}
