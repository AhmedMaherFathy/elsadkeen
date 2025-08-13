<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;

class BlogController extends Controller
{
    use HttpResponse;

    public function index()
    {
        $blogs = Blog::latest()->paginate();
        return $this->paginatedResponse($blogs,BlogResource::class);
    }
}
