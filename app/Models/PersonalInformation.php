<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;

class PersonalInformation extends Model implements ContractsTranslatable
{
    use HasFactory, HasUuids, SoftDeletes, Translatable;

    protected $table = 'personal_information';
    protected $fillable = ['name', 'photo', 'email', 'phone', 'whatsapp', 'dob', 'origin'];
    public $translatedAttributes = ['story', 'address'];
    protected $translationForeignKey = 'pi_id';
}
