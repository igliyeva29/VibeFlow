<?php

namespace App\Http\Controllers\Client;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => ['nullable', 'string', 'max:55'],
        ]);

        $f_q = $request->has('q') ? $request->q : null;

        $places = Place::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%');
            });
        })
            ->inRandomOrder()
            ->paginate(28)
            ->withQueryString();

        // categories => Providers/AppServiceProvider.php

        return view('client.places.index')->with(
            [
                'places' => $places,
            ]
        );
    }

    public function show($slug)
    {
        $place = Place::where('slug', $slug)->firstOrFail();

        $similarPlaces = Place::where('category_id', $place->category_id)
            ->whereNot('slug', $slug)
            ->take(4)
            ->get();

        return view('client.places.show')->with(
            [
                'place' => $place,
                'similarPlaces' => $similarPlaces,
            ]
        );

    }
}
