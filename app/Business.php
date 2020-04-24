<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
  use UsesUuid, SoftDeletes;

  public function salons(): BelongsToMany
  {
    return $this->belongsToMany(Salon::class, 'salons_businesses');
  }
}
