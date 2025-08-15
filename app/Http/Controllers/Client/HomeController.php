<?php

namespace App\Http\Controllers\Client;

use App\Models\Place;
use App\Models\Banner;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // $hotelId = Category::where('name', 'hotel')->firstOrFail();
        $cafes = Place::where('category_id', 9)->orderBy('created_at', 'desc')->take(4)->get();
        $education = Place::where('category_id', 15)->orderBy('created_at', 'desc')->take(4)->get();
        $shopping = Place::where('category_id', 24)->orderBy('created_at', 'desc')->take(4)->get();

        // categories => Providers/AppServiceProvider.php

        return view('client.home.index')->with(
            [
                'cafes' => $cafes,
                'education' => $education,
                'shopping' => $shopping,
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
