<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Facility extends Model
{
    use UsesUuid;

    public function salons(): BelongsToMany
    {
        return $this->belongsToMany(Salon::class, 'salons_businesses');
    }
}
