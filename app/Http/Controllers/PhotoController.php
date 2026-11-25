<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:25',
            'image' => 'required|image|max:10240',
        ]);

        $path = $request->file('image')->store('photos', 'public');

        Photo::create([
            'title' => $validated['title'] ?? null,
            'image' => $path,
        ]);

        return redirect()->back();
    }
}
