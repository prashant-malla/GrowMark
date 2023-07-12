<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // show list of sliders
    public function index()
    {
        $sliders = Slider::get();

        return view('sliders.index', compact('sliders'));
    }

    // create page
    public function create()
    {
        return view('sliders.create');
    }

    // to store slider
    public function store(Request $request)
    {
        $validated  = $request->validate([
            'title' => 'nullable',
            'image' => 'required',
            'link' => 'nullable',
            'is_active' => 'required|boolean'
        ]);

        $validated['image'] = 'fake image';
        Slider::create($validated);
        return to_route('sliders.index');
    }

    public function destroy(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        session()->flash('success','slider deleted');
        return to_route('sliders.index');
    }
}
