<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::paginate();
        return view('dashboard.success-stories.index',compact('stories'));
    }
    public function create()
    {
        return view('dashboard.success-stories.create');
    }

    public function show($id)
    {
        $story = SuccessStory::findOrFail($id);
        return view('dashboard.success-stories.show', compact('story'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'bride_name' => 'nullable|string|max:255',
        'groom_name' => 'nullable|string|max:255',
        // 'status' => 'in:under_review,published,refused',
        // 'published_status' => 'nullable|boolean',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('success_stories', 'public');
    }

    $validated['published_status'] = $request->has('published_status') ? 1 : 0;

    SuccessStory::create($validated);

    return redirect()->route('dashboard.success_stories.index')->with('success', 'Story created successfully.');
}
}
