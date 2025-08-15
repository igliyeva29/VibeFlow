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
            'category' => ['nullable', 'integer', 'min:1'],
        ]);

        $f_q = $request->has('q') ? $request->q : null;
        $f_category = $request->has('category') ? $request->category : null;

        $places = Place::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%');
            });
        })
            ->when(isset($f_category), function ($query) use ($f_category) {
                return $query->where('category_id', $f_category);
            })
            ->inRandomOrder()
            ->paginate(28)
            ->withQueryString();

        // categories => Providers/AppServiceProvider.php

        return view('client.places.index')->with(
            [
                'places' => $places,
                'f_q' => $f_q,
                'f_category' => $f_category,
            ]
        );
    }

    public function show($slug)
    {
        $place = Place::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

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
