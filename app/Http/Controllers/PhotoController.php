<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use App\Models\Category;

class PhotoController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'nullable|string|max:25',
        'image' => 'required|image|max:10240',
        'categories' => 'nullable|array',
        'categories.*' => 'exists:categories,id',
    ]);

    $path = $request->file('image')->store('photos', 'public');

    $photo = Photo::create([
        'title' => $validated['title'] ?? null,
        'image' => $path,
    ]);

    $photo->categories()->sync($validated['categories'] ?? []);

    return redirect()->back();
}

public function update(Request $request, Photo $photo)
{
    $validated = $request->validate([
        'categories' => 'nullable|array',
        'categories.*' => 'exists:categories,id',
    ]);

    $photo->categories()->sync($validated['categories'] ?? []);

    return redirect()->back();
}
public function redactor()
{
    $photos = Photo::with('categories')->get();
    $categories = Category::all();

    return view('galleryRedactorPage', compact('photos', 'categories'));
}

public function gallery()
{
    $photos = Photo::with('categories')->get();
    $categories = Category::all();

    return view('galleryPage', compact('photos', 'categories'));
}

public function destroy(Photo $photo)
{
    // Удаляем связи фотографии с категориями
    $photo->categories()->detach();

    // Удаляем файл изображения
    Storage::disk('public')->delete($photo->image);

    // Удаляем запись из базы данных
    $photo->delete();

    return redirect()->back();
}
}
