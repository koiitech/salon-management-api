<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
  use UsesUuid, SoftDeletes;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ["id", "name", "price", "index", "image", "minutes", "description", "category_id"];


  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function extras(): HasMany
  {
    return $this->hasMany(Extra::class)->orderBy('index');
  }

  public function children(): HasMany
  {
    return $this->hasMany(Extra::class)->orderBy('index');
  }

  public function appointments(): BelongsToMany
  {
    return $this->belongsToMany(Appointment::class, AppointmentDetail::class, 'service_id', 'appointment_id');
  }
}
