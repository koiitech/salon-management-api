<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Builder;
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


  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope('order', function (Builder $builder) {
      $builder->orderBy('created_at', 'desc');
    });
  }

  public function employees(): HasMany
  {
    return $this->hasMany(Employee::class)->orderBy('name');
  }

  public function salons(): HasMany
  {
    return $this->hasMany(Salon::class)->orderBy('created_at');
  }
}
