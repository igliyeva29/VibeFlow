<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;

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
