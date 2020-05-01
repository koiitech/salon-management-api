<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use UsesUuid, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id', 'name', 'description', 'image', 'index', 'salon_id'
  ];

  public function salon(): BelongsTo
  {
    return $this->belongsTo(Salon::class);
  }

  public function services(): HasMany
  {
    return $this->hasMany(Service::class)->orderBy('index');
  }
}
