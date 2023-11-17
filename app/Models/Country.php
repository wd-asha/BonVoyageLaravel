<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Country extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'countries';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function hotel()
    {
        return $this->hasMany(Hotel::class);
    }

    public function departure()
    {
        return $this->hasMany(Departure::class);
    }
}
