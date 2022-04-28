<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	public function all(Request $request)
	{
		$id 		= $request->input('id');
		$limit 		= $request->input('limit', 6);
		$name 		= $request->input('name');
		$slug 		= $request->input('slug');
		$type 		= $request->input('type');
		$price_from	= $request->input('price_from');
		$price_to 	= $request->input('price_to');

		if ($id) {
			$product = Product::with('galleries')->find($id);
			if ($product)
				return ResponseFormatter::success($product, 'Data Produk berhasil diambil');
			else
				return ResponseFormatter::error(null, 'Data Produk tidak ada', 404);
		}
	}
}
