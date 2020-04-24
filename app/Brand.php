<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
  use UsesUuid;

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function salons(): HasMany
  {
    return $this->hasMany(Salon::class);
  }
}
