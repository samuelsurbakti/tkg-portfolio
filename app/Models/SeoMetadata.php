<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMetadata extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'seo_metadata';

    protected $guarded = [];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'keywords' => 'array',
        'og_title' => 'array',
        'og_description' => 'array',
    ];
}
