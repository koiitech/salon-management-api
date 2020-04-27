<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
  use UsesUuid, SoftDeletes;

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function extras(): HasMany
  {
    return $this->hasMany(Extra::class)->orderBy('index');
  }
}
