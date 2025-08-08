<?php

namespace App\Http\Controllers\Client;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        // categories => Providers/AppServiceProvider.php

        return view('client.places.index')->with(
            [
            ]
        );
    }

    public function show($slug)
    {
        $place = Place::where('slug', $slug)->firstOrFail();

        $similarProducts = Place::where('category_id', $place->category_id)
            ->whereNot('slug', $slug)
            ->take(4)
            ->get();

        return view('client.places.show')->with(
            [
                'place' => $place,
                'similarProducts' => $similarProducts,
            ]
        );

    }
}
