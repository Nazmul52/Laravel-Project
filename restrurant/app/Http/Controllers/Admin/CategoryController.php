<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$categories = Category::all();
		return view('admin.category.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required',
		]);

		$category = new Category();

		$category->name = $request->name;
		$category->slug = str_slug($request->name);

		$category->save();

		return redirect()->route('category.index')->with('successMsg', 'Category Successfully Saved!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$category = Category::find($id);

		return view('admin.category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'name' => 'required',
		]);

		$category = Category::find($id);

		$category->name = $request->name;
		$category->slug = str_slug($request->name);

		$category->save();

		return redirect()->route('category.index')->with('successMsg', 'Category Successfully Updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$category = Category::find($id);

		$category->delete();

		return redirect()->back()->with('deleteMsg', 'Category  Successfully Deleted!');
	}
}
