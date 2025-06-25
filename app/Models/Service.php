<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements ContractsTranslatable
{
    use HasFactory, HasUuids, SoftDeletes, Translatable;

    protected $table = 'services';
    protected $fillable = ['icon_class'];
    public $translatedAttributes = ['name', 'description'];
}
