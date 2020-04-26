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

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id', 'name', 'description', 'cover', 'logo', 'address'
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function salons(): HasMany
  {
    return $this->hasMany(Salon::class);
  }
}
