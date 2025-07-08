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

    /**
     * Get the client's full stars.
     *
     * @return int
     */
    public function getFullStarsAttribute(): int
    {
        return floor($this->star);
    }

    /**
     * Determine if the client has a half star.
     *
     * @return bool
     */
    public function getHasHalfStarAttribute(): bool
    {
        return ($this->star - $this->full_stars) >= 0.5;
    }

    /**
     * Get the client's empty stars.
     *
     * @return int
     */
    public function getEmptyStarsAttribute(): int
    {
        return 5 - $this->full_stars - ($this->has_half_star ? 1 : 0);
    }
}
