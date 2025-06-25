<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model implements ContractsTranslatable
{
    use HasFactory, HasUuids, SoftDeletes, Translatable;

    protected $table = 'clients';
    protected $fillable = ['name', 'photo', 'star'];
    public $translatedAttributes = ['description', 'testimonial'];
}
