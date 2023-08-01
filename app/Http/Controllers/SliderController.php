<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function store(StoreSliderRequest $request)
    {
        $validated  = $request->validated();

        $validated['image'] = 'fake image';
        $success = Slider::create($validated);
        if ($success) {
            Alert::success('Success!', 'slider created successfully.');
            session()->flash('success', 'slider created successfully.');
        } else {
            Alert::success('Oh No!', ' went wrong while creating slider.');
            session()->flash('error', 'something went wrong while creating slider.');
        }

        return to_route('sliders.index');
    }

    // to show edit form
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, $id)
    {
        $validated = $request->validated();

        $slider = Slider::findOrFail($id);
        $success = $slider->update($validated);

        if ($success) {
            Alert::success('Oh Yes!', 'slider updated.');
            session()->flash('success', 'slider updated successfully.');
        } else {
            session()->flash('error', 'something went wrong while updaing');
        }
        return to_route('sliders.index');
    }


    public function destroy(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        session()->flash('success', 'slider deleted');
        return to_route('sliders.index');
    }
}
