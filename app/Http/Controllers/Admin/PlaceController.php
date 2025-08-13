<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use App\Models\Category;
use App\Models\Location;
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

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->orderBy('name')
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
            'categoryId' => ['nullable', 'integer', 'min:1'],
            'name' => ['required', 'string', 'max:55'],
            'nameTm' => ['nullable', 'string', 'max:55'],
            'nameRu' => ['nullable', 'string', 'max:55'],
            'title' => ['required', 'string', 'max:55'],
            'titleTm' => ['nullable', 'string', 'max:55'],
            'titleRu' => ['nullable', 'string', 'max:55'],
            'location' => ['required', 'integer', 'min:1'],
            'address' => ['required', 'string', 'max:55'],
            'phoneNumber' => ['required', 'string', 'max:55'],
            'emailAddress' => ['nullable', 'string', 'max:55'],
            'intagramProfile' => ['nullable', 'string', 'max:55'],
            'tiktokProfile' => ['nullable', 'string', 'max:55'],
        ]);
        Place::create([
            'parent_id' => $request->categoryId ? $request->categoryId : null,
            'name' => $request->name,
            'name_tm' => $request->nameTm,
            'name_ru' => $request->nameRu,
            'title' => $request->title,
            'title_tm' => $request->titleTm,
            'title_ru' => $request->titleRu,
            'location' => $request->location,
            'address' => $request->address,
            'phone_number' => $request->phoneNumber,
            'email_address' => $request->emailAddress,
            'instagram_profile' => $request->instagramProfile,
            'tiktok_profile' => $request->tiktokProfile,
        ]);

        return to_route('admin.places.index')
            ->with('success', __('app.createdSuccessfully', ['name' => 'Place']));
    }

    public function edit(string $id)
    {
        $place = Place::where('id', $id)->firstOrFail();

        $category = Category::where('id', $id)->firstOrFail();

        $parents = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.places.edit')
            ->with([
                'place' => $place,
                 'category' => $category,
                'parents' => $parents,
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


        $place->delete();

        return to_route('admin.places.index')
            ->with('succes', __('app.deletedSuccessfully', ['name' => 'Place']));

    }
}
