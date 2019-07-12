<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use validate;

class ItemController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$items = Item::all();
		$categories = Category::all();
		return view('admin.item.index', compact('items', 'categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::all();

		return view('admin.item.create', compact('categories'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'category_id' => 'required',
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'image' => 'required|mimes:jpeg,jpg,png,bpm',
		]);

		$image = $request->file('image');
		$slag = str_slug($request->name);
		if (isset($image)) {
			$currentDate = Carbon::now()->toDateString();
			$imagename = $slag . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
			if (!file_exists('item_image/item')) {
				mkdir('item_image/item', 0777, true);
			}
			$image->move('item_image/item', $imagename);
		} else {
			$imagename = 'default.png';
		}

		$item = new Item();

		$item->name = $request->name;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->category_id = $request->category_id;
		$item->image = $imagename;

		$item->save();

		return redirect()->route('item.index')->with('successMsg', 'Item Successfully Saved!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function show(Item $item) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$item = Item::find($id);
		$categories = Category::all();

		return view('admin.item.edit', compact('item', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'category_id' => 'required',
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'image' => 'mimes:jpeg,jpg,png,bpm',
		]);

		$item = Item::find($id);

		$image = $request->file('image');
		$slag = str_slug($request->name);
		if (isset($image)) {
			$currentDate = Carbon::now()->toDateString();
			$imagename = $slag . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
			if (!file_exists('item_image/item')) {
				mkdir('item_image/item', 0777, true);
			}
			$image->move('item_image/item', $imagename);
		} else {
			$imagename = $item->image;
		}

		$item->name = $request->name;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->category_id = $request->category_id;
		$item->image = $imagename;

		$item->save();

		return redirect()->route('item.index')->with('successMsg', 'Item Successfully Updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$item = Item::find($id);

		if (file_exists('item_image/item/' . $item->image)) {
			unlink('item_image/item/' . $item->image);

		}

		$item->delete();

		return redirect()->back()->with('deleteMsg', 'Item  Successfully Deleted!');
	}
}
