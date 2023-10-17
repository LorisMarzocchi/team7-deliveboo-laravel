<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $restaurant_id = $request->query('restaurant_id');
        $query = Product::with('restaurant')->where('visible', true);

        if($restaurant_id) {
            $query = $query->where('restaurant_id', $restaurant_id);
        }

        $project = $query->paginate(6);

        return response()->json([
            'success' => true,
            'results'    => $project,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return response()->json([
            'success' => $product ? true : false,
            'results'    => $product,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
