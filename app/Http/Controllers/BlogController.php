<?php

namespace App\Http\Controllers;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use function Pest\Laravel\get;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'asc')->get();
        return Inertia::render('Blog', compact('blogs'));
    }

    public function create()
    {
        return Inertia::render('BlogCreate');
    }

    public function store(BlogRequest $request)
    {
        Blog::create(array_merge( $request->validated(), ['user_id' => Auth::id()]));

        return to_route('blog.index')->with('success', 'Blog created');
    }


    public function show(Blog $blog)
    {
        //
    }

    public function edit(Blog $blog)
    {
        return Inertia::render('BlogEdit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());

        return to_route('blog.index')->with('success', 'Blog Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return to_route('blog.index')->with('success', 'Blog Deleted');
    }
}
