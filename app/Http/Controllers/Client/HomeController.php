<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Place;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {   
        // $hotelId = Category::where('name', 'hotel')->firstOrFail();
        $cafes = Place::where('category_id', 2)->orderBy('created_at', 'desc')->take(4)->get();
        $education = Place::where('category_id', 3)->orderBy('created_at', 'desc')->take(4)->get();
        $hotels = Place::where('category_id', 4)->orderBy('created_at', 'desc')->take(4)->get();
        $shopping = Place::where('category_id', 5)->orderBy('created_at', 'desc')->take(4)->get();
        $health = Place::where('category_id', 6)->orderBy('created_at', 'desc')->take(4)->get();
        $sport = Place::where('category_id', 7)->orderBy('created_at', 'desc')->take(4)->get();

        // categories => Providers/AppServiceProvider.php

        return view('client.home.index')->with(
            [
                'cafes' => $cafes,
                'education' => $education,
                'hotels' => $hotels,
                'shopping' => $shopping,
                'health' => $health,
                'sport' => $sport,
                'f_q' => null,
            ]
        );
    }

    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
