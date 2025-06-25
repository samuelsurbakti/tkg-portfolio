<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryTranslation extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;
    protected $table = 'work_category_translations';
    protected $fillable = ['name'];
}
