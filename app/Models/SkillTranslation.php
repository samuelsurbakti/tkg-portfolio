<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillTranslation extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;
    protected $table = 'skill_translations';
    protected $fillable = ['name'];
}
