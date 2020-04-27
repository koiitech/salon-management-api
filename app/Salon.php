<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Builder;
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

  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope('order', function (Builder $builder) {
      $builder->orderBy('created_at', 'desc');
    });
  }

  public function staffs(): HasMany
  {
    return $this->hasMany(Staff::class)->orderBy('name');
  }


  public function brand(): BelongsTo
  {
    return $this->belongsTo(Brand::class);
  }

  public function categories(): HasMany
  {
    return $this->hasMany(Category::class)->orderBy('index');
  }

  public function businesses(): BelongsToMany
  {
    return $this->belongsToMany(Business::class, 'salons_businesses')->orderBy('name');
  }

  public function facilities(): BelongsToMany
  {
    return $this->belongsToMany(Facility::class, 'salons_facilities')->orderBy('name');
  }
}
