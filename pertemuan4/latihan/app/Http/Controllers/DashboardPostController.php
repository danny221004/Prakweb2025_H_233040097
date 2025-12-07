<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\search;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id);

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.index', ['posts' => $posts->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validasi (Opsional tapi disarankan)
    $request->validate([
        'title' => 'required|max:255',
        'image' => 'nullable|image|file|max:2048', // Validasi file gambar maks 2MB
        // ... validasi field lain
    ]);

    // 2. Generate Slug (Kode Anda)
    $slug = Str::slug($request->title);
    $originalSlug = $slug;
    $count = 1;
    while (Post::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    // 3. Handle File Upload (Sesuai Foto)
    $imagePath = null;
    if ($request->hasFile('image')) {
        // Store file di storage/app/public/post-images
        // Method store() akan generate nama file unik otomatis
        $imagePath = $request->file('image')->store('post-images', 'public');
    }

    // validasi berhasil, simpan data ke database
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'category_id' => 'required|exists:categories,id', // Memastikan ID ada di tabel categories
        'excerpt' => 'required',
        'body' => 'required',
        // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ],
    [   // Custom Messages
        'title.required' => 'Field Title wajib diisi',
        'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
        'category_id.required' => 'Field Category wajib dipilih',
        'category_id.exists' => 'Category yang dipilih tidak valid',
        'excerpt.required' => 'Field Excerpt wajib diisi',
        'body.required' => 'Field Content wajib diisi',
        'image.image' => 'File harus berupa gambar',
        'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
        'image.max' => 'Ukuran gambar maksimal 2MB',
    ]);

    // Jika validasi gagal (opsional, tergantung implementasi controller Anda)
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // 4. Create Post
    Post::create([
        'title' => $request->title,
        'slug' => $slug,
        'category_id' => $request->category_id,
        'excerpt' => $request->excerpt,
        'body' => $request->body,
        'image' => $imagePath, // Simpan path gambar ke database
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('dashboard.index')->with('success', 'Post created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Check if user owns this post
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('dashboard.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Check if user owns this post
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate request
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Field Title wajib diisi',
            'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
            'category_id.required' => 'Field Category wajib dipilih',
            'category_id.exists' => 'Category yang dipilih tidak valid',
            'excerpt.required' => 'Field Excerpt wajib diisi',
            'body.required' => 'Field Content wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        // Generate new slug if title changed
        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;
            
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            
            $validated['slug'] = $slug;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            
            // Store new image
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        // Update post
        $post->update($validated);

        return redirect()->route('dashboard.index')
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Check if user owns this post
        if ($post->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete image if exists
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete post
        $post->delete();

        return redirect()->route('dashboard.index')
            ->with('success', 'Post deleted successfully!');
    }
}
