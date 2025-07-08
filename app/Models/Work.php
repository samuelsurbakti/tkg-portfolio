<?php

namespace App\Models;

use App\Models\Work\Category;
use App\Models\Work\Photo;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;

class Work extends Model implements ContractsTranslatable
{
    use HasFactory, HasUuids, SoftDeletes, Translatable;

    protected $table = 'works';
    protected $fillable = ['category_id', 'date'];
    public $translatedAttributes = ['title', 'info'];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'work_id');
    }

    public function firstPhoto()
    {
        return $this->hasOne(Photo::class, 'work_id')->oldest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
