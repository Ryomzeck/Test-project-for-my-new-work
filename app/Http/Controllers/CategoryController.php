<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:25',
        ]);

        Category::create($validated);

        return redirect()->back()->with('success', 'Категория успешно создана!');
    }
}
