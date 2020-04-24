<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
  use UsesUuid, SoftDeletes;

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function salons(): HasMany
  {
    return $this->hasMany(Salon::class);
  }
}
