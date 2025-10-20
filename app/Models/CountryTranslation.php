<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CountryTranslation extends Model
{
    protected $fillable = ['country_id', 'lang', 'name'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}

