<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

	public function index()
	{
		$items = Product::all();

		return view('pages.products.index', [
			'items' => $items
		]);
	}

	public function create()
	{
		return view('pages.products.create');
	}

	public function store(ProductRequest $request)
	{
		$data = $request->all();
		$data['slug'] = Str::slug($request->name);
		Product::create($data);
		return redirect()->route('products.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$item = Product::findOrFail($id);

		return view('pages.products.edit', [
			'item' => $item
		]);
	}

	public function update(ProductRequest $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		$item = Product::findOrFail($id);
		$item->delete();

		return redirect()->route('products.index');
	}
}
