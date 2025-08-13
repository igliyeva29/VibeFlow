<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Place;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\returnArgument;

class DashboardController extends Controller
{
    public function index()
    {

        $places = Place::orderBy('created_at', 'desc')->paginate(28);
        

        return view('admin.dashboard.index')->with([
            'places' => $places,
        ]);
    }
}
