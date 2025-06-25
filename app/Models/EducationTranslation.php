<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationTranslation extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;
    protected $table = 'education_translations';
    protected $fillable = ['institution', 'department', 'description'];
}
