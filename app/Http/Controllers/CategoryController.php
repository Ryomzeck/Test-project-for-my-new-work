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

    public function destroy(Category $category)
{
    // Удаляем связи категории с фотографиями
    $category->photos()->detach();

    // Удаляем саму категорию
    $category->delete();

    return redirect()->back();
}
}
