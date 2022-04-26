<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

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
		$data = $request->all();
		$data['slug'] = Str::slug($request->name);

		$item = Product::findOrFail($id);
		$item->update($data);

		return redirect()->route('products.index');
	}

	public function destroy($id)
	{
		$item = Product::findOrFail($id);
		$item->delete();

		ProductGallery::where('products_id', $id)->delete();

		return redirect()->route('products.index');
	}

	public function gallery(Request $request, $id)
	{
		$product 	= Product::findOrFail($id);
		$items		= ProductGallery::with('product')
			->where('products_id', $id)
			->get();

		return view('pages.products.gallery', [
			'product' 	=>	$product,
			'items'		=>	$items
		]);
	}
}
