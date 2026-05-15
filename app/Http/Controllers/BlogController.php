<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        $categories = Blog::getCategories();
        return view('blogs.index', compact('blogs', 'categories'));
    }

    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $related = Blog::where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->latest()->take(3)->get();
        return view('blogs.show', compact('blog', 'related'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query', '');
        $category = $request->get('category', '');
        $date = $request->get('date', '');

        $blogs = Blog::query()
            ->when($query, fn($q) => $q->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('short_description', 'like', "%{$query}%");
            }))
            ->when($category, fn($q) => $q->where('category', $category))
            ->when($date, fn($q) => $q->whereDate('created_at', $date))
            ->latest()
            ->paginate(6);

        return view('blogs._cards', compact('blogs'));
    }

    public function filter(Request $request)
    {
        return $this->search($request);
    }
}
