<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use validate;

class SliderController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$sliders = Slider::all();
		return view('admin.slider.index', compact('sliders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		return view('admin.slider.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, [
			'title' => 'required',
			'sub_title' => 'required',
			'image' => 'required|mimes:jpeg,jpg,png,bpm',
		]);

		$image = $request->file('image');
		$slag = str_slug($request->title);
		if (isset($image)) {
			$currentDate = Carbon::now()->toDateString();
			$imagename = $slag . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
			if (!file_exists('slider_image/slider')) {
				mkdir('slider_image/slider', 0777, true);
			}
			$image->move('slider_image/slider', $imagename);
		} else {
			$imagename = 'default.png';
		}

		$slider = new Slider();

		$slider->title = $request->title;
		$slider->sub_title = $request->sub_title;
		$slider->image = $imagename;

		$slider->save();

		return redirect()->route('slider.index')->with('successMsg', 'Slider Successfully Saved!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

		$slider = Slider::find($id);

		return view('admin.slider.edit', compact('slider'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'title' => 'required',
			'sub_title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,bpm',
		]);

		$slider = Slider::find($id);

		$image = $request->file('image');
		$slag = str_slug($request->title);
		if (isset($image)) {
			$currentDate = Carbon::now()->toDateString();
			$imagename = $slag . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
			if (!file_exists('slider_image/slider')) {
				mkdir('slider_image/slider', 0777, true);
			}
			$image->move('slider_image/slider', $imagename);
		} else {
			$imagename = $slider->image;
		}

		$slider->title = $request->title;
		$slider->sub_title = $request->sub_title;
		$slider->image = $imagename;

		$slider->save();

		return redirect()->route('slider.index')->with('successMsg', 'Slider Successfully Updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$slider = Slider::find($id);

		if (file_exists('slider_image/slider/' . $slider->image)) {
			unlink('slider_image/slider/' . $slider->image);

		}

		$slider->delete();

		return redirect()->back()->with('deleteMsg', 'Slider  Successfully Deleted!');
	}
}
