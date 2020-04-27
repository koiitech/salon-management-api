<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salon extends Model
{
  use UsesUuid, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id', 'name', 'description', 'cover', 'logo', 'address', 'latitude', 'longitude', 'opening_hours', 'brand_id', 'user_id'
  ];

  public function brand(): BelongsTo
  {
    return $this->belongsTo(Brand::class);
  }

  public function categories(): HasMany
  {
    return $this->hasMany(Category::class);
  }

  public function businesses(): BelongsToMany
  {
    return $this->belongsToMany(Business::class, 'salons_businesses');
  }

  public function facilities(): BelongsToMany
  {
    return $this->belongsToMany(Facility::class, 'salons_facilities');
  }
}
