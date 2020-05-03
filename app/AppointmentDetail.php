<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppointmentDetail extends Model
{
  use UsesUuid;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'appointment_id', 'service_id'
  ];

  public function appointment(): BelongsTo
  {
    return $this->belongsTo(Appointment::class);
  }
  public function service(): BelongsTo
  {
    return $this->belongsTo(Service::class);
  }
}
