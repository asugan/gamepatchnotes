<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Conner\Likeable\Likeable;

class Games extends Model
{
    use HasFactory;
    use Sluggable;
    use Likeable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'game_name'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function patchnotes()
    {
        return $this->hasMany(Patchnotes::class);
    }
}
