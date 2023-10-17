<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    private $validations = [
        'name'                 => 'required|string|max:50',
        'description'          => 'required|string',
        'city'                 => 'required|string|max:30',
        'address'              => 'required|string|max:50',
        'vat'                  => 'required|string|max:10|min:10',
        'url_image'            => 'nullable|image|max:2048',
        'priceRange'           => 'nullable|integer',
        'rating_value'         => 'nullable|integer',
        'review_count'         => 'nullable|integer',
        'categories'           => 'nullable|array',
        'categories.*'         => 'integer|exists:categories,id',
    ];

    // private $validations_messages = [
    //     'required' => 'Il campo :attribute è richiesto',
    //     'min' => 'Il campo :attribute deve avere almeno :min caratteri',
    //     'max' => 'Il campo :attribute deve avere massimo :max caratteri',
    //     'url' => 'Il campo :attribute deve essere un URL valido',
    //     'date' => 'Il campo :attribute deve essere una data in formato valido',
    //     'exists' => 'Il campo :attribute non è valido',
    //     'integer' => 'Il campo :attribute deve essere un numero intero.',
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Auth::user()->restaurant;

        if ($restaurant) {
            $products = $restaurant->products;
            // dd($products);
        } else {
            $products = [];
        }

        return view('admin.restaurants.index', compact('restaurant', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.restaurants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validare i dati del form
        $request->validate($this->validations);

        $data = $request->all();

        // salvare l'immagine nella cartella degli uploads DA SCOMMENTARE QUANDO SI IMPLEMENTA LO STORAGE
        // prendere il percorso dell'immagine appena salvata
        // $imagePath = null;

        // if (isset($data['image'])) {
        //     $imagePath = Storage::put('uploads', $data['image']);
        // }

        // if ($request->has('image')) {
        //     $imagePath = Storage::disk('public')->put('uploads', $data['image']);
        // }

        // salvare i dati nel db se validi
        $newRestaurant = new Restaurant();
        $newRestaurant->name = $data['name'];
        $newRestaurant->slug = Restaurant::slugger($data['name']);
        $newRestaurant->description = $data['description'];
        $newRestaurant->city = $data['city'];
        $newRestaurant->address = $data['address'];
        if ($request->hasFIle('url_image')) {
            $imagePath = Storage::put('uploads', $data['url_image']);
            $newRestaurant->url_image          = $imagePath;
        }
        $newRestaurant->vat = $data['vat'];
        $newRestaurant->priceRange = $data['priceRange'];
        $newRestaurant->user_id          = auth()->user()->id;

        $newRestaurant->save();

        // associare i tag
        $newRestaurant->categories()->sync($data['categories'] ?? []);

        // reindirizzare su una rotta di tipo get

        return to_route('admin.restaurants.show', ['restaurant' => $newRestaurant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $categories = Category::all();
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();

        return view('admin.restaurants.show', compact('restaurant', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();

        $categories = Category::all();

        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();

        $request->validate($this->validations);

        $data = $request->all();

        // immagine caricata dall'utente DA SCOMMENTARE QUANDO SI IMPLEMENTA LO STORAGE
        // if (isset($data['image'])) {

        //     $imagePath = Storage::put('uploads', $data['image']);

        //     if ($restaurant->image) {
        //         Storage::delete($restaurant->image);
        //     }

        //     $restaurant->image = $imagePath;
        // }

        // aggiornare i dati nel db se validi
        $restaurant->name = $data['name'];
        $restaurant->description = $data['description'];
        $restaurant->city = $data['city'];
        $restaurant->address = $data['address'];
        $restaurant->vat = $data['vat'];
        if ($request->has('url_image')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['url_image']);
            if ($restaurant->url_image) {
                Storage::delete($restaurant->url_image);
            }
            $restaurant->url_image = $imagePath;
        }
        // $restaurant->url_image = $data['url_image'];
        $restaurant->priceRange = $data['priceRange'];

        $restaurant->update();

        // associare i tag
        $restaurant->categories()->sync($data['categories'] ?? []);

        // reindirizzare su una rotta di tipo get

        return to_route('admin.restaurants.show', ['restaurant' => $restaurant]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        // DA SCOMMENTARE QUANDO SI IMPLEMENTA IL CARICAMENTO DELLE IMMAGINI
        // if ($restaurant->image) {
        //     Storage::delete($restaurant->image);
        // }

        //dissociare tutti le technology dal post
        $restaurant->categories()->detach();

        // elimino il post
        $restaurant->delete();
        return to_route('admin.restaurants.index')->with('delete_success', $restaurant);
    }
}
