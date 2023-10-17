<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    private $validations = [
        'name' => 'required|string|min:2|max:50',
        'ingredients' => 'required|string',
        'price' => 'required|numeric',
        'description' => 'required|string',
        // 'url_image' => 'required|image|2048',
    ];

    public function index()
    {
        $restaurant = Auth::user()->restaurant;

        if ($restaurant) {
            $products = $restaurant->products()->paginate(5);
        } else {
            $products = collect([]); // Una collezione vuota
        }

        return view('admin.products.index', compact('products'));
    }
    // public function index()
    // {
    //     $products = Product::paginate(5);
    //     return view('admin.products.index', compact('products'));
    // }


    public function create()
    {
        $restaurant = Restaurant::all();
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->validations);

        $data = $request->all();

        $newProduct = new Product();
        $newProduct->name = $data['name'];
        $newProduct->slug = Product::slugger($data['name']);
        $newProduct->ingredients = $data['ingredients'];
        $newProduct->price = $data['price'];
        $newProduct->description = $data['description'];
        if ($request->hasFIle('url_image')) {
            $imagePath = Storage::put('uploads', $data['url_image']);
            $newProduct->url_image = $imagePath;
        } else {
            // Altrimenti, un valore di default
            $imagePath = 'defaultImage/default.jpg';
        }
        // $newProduct->visible = $data['visible'];

        // salvo il nuovo Prodotto
        $newProduct->save();

        // redirect
        return to_route('admin.products.show', ['product' => $newProduct]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('restaurant_id', auth()->id())->first();
        if (!$product) {
            abort(403, 'Unauthorized'); 
        }
        return view('admin.products.show', compact('product'));
    }

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->where('restaurant_id', auth()->id())->first();
        if (!$product) {
            abort(403, 'Unauthorized'); 
        }

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate($this->validations);

        $data = $request->all();

        // aggiorno i dati nel database
        $product->name = $data['name'];
        $product->ingredients = $data['ingredients'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        if ($request->has('url_image')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['url_image']);
            if ($product->url_image) {
                Storage::delete($product->url_image);
            }
            $product->url_image = $imagePath;
        }
        // $product->visible = $data['visible'];
        // $product->restaurant_id = $data['restaurant_id'];
        // update
        $product->update();

        // redirect
        return to_route('admin.products.show', ['product' => $product]);
    }

    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->orders()->detach();
        $product->delete();
        return to_route('admin.products.index')->with('delete_success', $product);
    }

    public function toggleProductVisibility(Request $request, $product_id)
{
    $product = Product::find($product_id);
    if ($product) {
        $product->visible = !$product->visible; // Inverte lo stato corrente
        $product->save();
    }
    return redirect()->back(); // reindirizza alla dashboard
}
}
