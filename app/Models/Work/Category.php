<?php

namespace App\Models\Work;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements ContractsTranslatable
{
    use HasFactory, HasUuids, SoftDeletes, Translatable;

    protected $table = 'work_categories';
    protected $fillable = [];
    public $translatedAttributes = ['name'];
    protected $translationForeignKey = 'wc_id';
}
