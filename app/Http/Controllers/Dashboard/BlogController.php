<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use HttpResponse;

    public function index()
    {
        $blogs = Blog::latest()->paginate();

        return view('dashboard.blogs.index',compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Blog::create($validated);

        return redirect()->route('dashboard.blogs.index')->with('success', __('user.create_success'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
                                        'title' => 'required|string|max:255',
                                        'content' => 'required|string',
                                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                                        ]);

        $blog->update($validated);

        return redirect()->route('dashboard.blogs.index')->with('success', __('user.update_success'));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('dashboard.blogs.index')->with('success', __('user.delete_success'));
    }

    public function changePublishedStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->published_status = !$blog->published_status;
        $blog->save();

        return redirect()->back()->with('success', __('user.update_success'));
    }
}
