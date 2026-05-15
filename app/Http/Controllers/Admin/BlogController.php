<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Blog::getCategories();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|max:255',
            'short_description' => 'required|max:500',
            'content'           => 'required',
            'category'          => 'required|in:Admit Card,Answer Key,Calendar,Exam Date Information,Result',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('blogs', 'public');
        }

        unset($validated['image']);
        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created successfully!');
    }

    public function edit(Blog $blog)
    {
        $categories = Blog::getCategories();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'             => 'required|max:255',
            'short_description' => 'required|max:500',
            'content'           => 'required',
            'category'          => 'required|in:Admit Card,Answer Key,Calendar,Exam Date Information,Result',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($blog->image_path) {
                Storage::disk('public')->delete($blog->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('blogs', 'public');
        }

        unset($validated['image']);
        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image_path) {
            Storage::disk('public')->delete($blog->image_path);
        }
        $blog->delete();

        return response()->json(['success' => true, 'message' => 'Blog deleted successfully!']);
    }

    public function dashboard()
    {
        $total = Blog::count();
        $byCategory = Blog::selectRaw('category, count(*) as count')
            ->groupBy('category')->get();
        $recent = Blog::latest()->take(5)->get();
        return view('admin.dashboard', compact('total', 'byCategory', 'recent'));
    }
}
