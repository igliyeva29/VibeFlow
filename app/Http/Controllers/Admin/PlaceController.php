<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function index()
    {

        $places = Place::orderBy('created_at', 'desc')->paginate(28);

        return view('admin.places.index')
            ->with('places', $places);
    }

     public function show(string $id)
    {
        $place = Place::with(['category', 'location'])
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.places.show')->with([
            'place' => $place,
        ]);
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        $locations = Location::get();

        return view('admin.places.create')->with([
            'categories' => $categories,
            'locations' => $locations,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'categoryId' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'max:255'],
            'titleTm' => ['nullable', 'string', 'max:255'],
            'titleRu' => ['nullable', 'string', 'max:255'],
            'locationId' => ['required', 'integer', 'min:1'],
            'address' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'string', 'max:55'],
            'emailAddress' => ['nullable', 'string', 'max:55'],
            'intagramProfile' => ['nullable', 'string', 'max:255'],
            'tiktokProfile' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'] //max:2G
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/places', 'public');
        }

        $newPlace = Place::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->categoryId,
            'slug' => fake()->slug(),
            'title' => $request->title,
            'title_tm' => $request->titleTm,
            'title_ru' => $request->titleRu,
            'location_id' => $request->locationId,
            'address' => $request->address,
            'phone_number' => $request->phoneNumber,
            'email_address' => $request->emailAddress,
            'instagram_profile' => $request->instagramProfile,
            'tiktok_profile' => $request->tiktokProfile,
            'image' => $path,
            'map' => null,
            'viewed' => 0,
            'rating' => 0,

        ]);

        $newPlace->slug = str($request->title)->slug() . "-" . $newPlace->id;
        $newPlace->update();

        return to_route('admin.places.index')
            ->with('success', __('app.createdSuccessfully', ['name' => 'Place']));
    }

    public function edit(string $id)
    {
        $place = Place::where('id', $id)->firstOrFail();

        $category = Category::where('id', $id)->firstOrFail();

        $location = Location::get();

        return view('admin.places.edit')
            ->with([
                'place' => $place,
                'category' => $category,
                'locations' => $location,
            ]);
    }

    public function update(Request $request, string $id)
    {

        $place = Place::where('id', $id)->firstOrFail();



        $place->update();

        return to_route('admin.places.index')
            ->with('success', __('app.editedSuccessfully', ['name' => 'Place']));
    }

    public function destroy(string $id)
    {
        $place = Place::where('id', $id)->firstOrFail();

        if ($place->image) {
            Storage::disk('public')->delete($place->image);
        }


        $place->delete();

        return to_route('admin.places.index')
            ->with('succes', __('app.deletedSuccessfully', ['name' => 'Place']));

    }
}
