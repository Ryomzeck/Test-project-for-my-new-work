<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;

use App\Models\Slide;
class SliderController extends Controller
{
    public function getAllSlides()
    {
        $slides = Slide::orderBy('sort_order')->get();

        return $slides;
    }
/*
    public function createSlide()
    {
        $slide = new Slide();

        $slide->image = 'test.jpg';
        $slide->title = 'Тестовый слайд';
        $slide->description = 'Это тестовый слайд';

        $slide->save();

        return $slide;
    }
*/

public function store(SliderRequest $request)
{
    $slide = new Slide();

    $slide->title = $request->title;
    $slide->description = $request->description;

    $path = $request->file('image')->store('slides', 'public');

    $slide->image = $path;

    $slide->save();

    return redirect()->route('sliderRedactorPage');
}

public function update(Request $request, Slide $slide)
{
    $slide->sort_order = $request->sort_order;
    $slide->title = $request->title;
    $slide->description = $request->description;

    $slide->save();

    return redirect()->route('sliderRedactorPage');
}

public function destroy(Slide $slide)
{
    $slide->delete();

    return redirect()->route('sliderRedactorPage');
}
public function redactor()
{
    $slides = Slide::orderBy('sort_order')->get();

    return view('sliderRedactorPage', compact('slides'));
}
}
