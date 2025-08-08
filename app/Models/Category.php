<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }
    public function getName()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->name_tm ?: $this->name;
        } else if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        }
        return $this->name;
    }
}
