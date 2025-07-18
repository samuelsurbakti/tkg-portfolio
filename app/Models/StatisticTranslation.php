<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatisticTranslation extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;
    protected $table = 'statistic_translations';
    protected $fillable = ['label'];
}
