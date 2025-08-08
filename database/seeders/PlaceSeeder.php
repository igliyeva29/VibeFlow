<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Place;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 500; $i++) {
            $user = User::where('is_admin', 0)->inRandomOrder()->first();
            $category = Category::inRandomOrder()->first();
            $location = Location::inRandomOrder()->first();

            $place = Place::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'location_id' => $location->id,
                'slug' => fake()->slug(),
                'name' => fake()->word(),
                'address' => fake()->address(),
                'title' => fake()->word(),
                'title_tm' => null,
                'title_ru' => null,
                'phone_number' => fake()->phoneNumber(),
                'email_address' => fake()->unique()->safeEmail(),
                'instagram_profile' => fake()->word(),
                'tiktok_profile' => fake()->word(),
                'viewed' => fake()->numberBetween(500, 10000),
                'rating' => fake()->numberBetween(1, 5),
            ]);

            $place->slug = str($place->title)->slug() . "-" . $place->id;
            $place->update();
        }
    }
}
