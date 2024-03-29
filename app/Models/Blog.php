<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
  use HasFactory;
  use Sluggable;

  protected $guarded = [];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'blog_title'
      ]
    ];
  }

  public function getRouteKeyName(): string
  {
    return 'slug';
  }
}
