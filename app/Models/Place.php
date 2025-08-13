<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'category_id',
        'slug',
        'title',
        'title_tm',
        'title_ru',
        'location_id',
        'address',
        'phone_number',
        'email_address',
        'isntagram_profile',
        'tiktok_profile',
        'image',
        'map',
        'viewed',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTitle()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->title_tm ?: $this->title;
        } else if ($locale == 'ru') {
            return $this->title_ru ?: $this->title;
        }
        return $this->title;
    }
}
