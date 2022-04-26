<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductGalleryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$items = ProductGallery::with('product')->get();
		return view('pages.product-galleries.index', [
			'items' => $items
		]);
	}

	public function create()
	{
		$products = Product::all();

		return view('pages.product-galleries.create', [
			'products' => $products
		]);
	}

	public function store(ProductGalleryRequest $request)
	{
		$data = $request->all();
		$data['photo'] = $request->file('photo')->store(
			'assets/product',
			'public'
		);

		ProductGallery::create($data);

		return redirect()->route('product-galleries.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update(ProductGalleryRequest $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		$item = ProductGallery::findOrFail($id);
		$item->delete();

		return redirect()->route('product-galleries.index');
	}
}
