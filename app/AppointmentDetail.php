<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppointmentDetail extends Model
{
  // use UsesUuid;

  protected $table = 'appointment_details';

  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = true;
  public $timestamps = false;


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'appointment_id', 'service_id', 'extras'
  ];

  public function setExtrasAttribute($value)
  {
    $this->attributes['extras'] = json_encode($value);
  }

  public function getExtrasAttribute($value)
  {
    return json_decode($value);
  }

  public function appointment(): BelongsTo
  {
    return $this->belongsTo(Appointment::class);
  }
  public function service(): BelongsTo
  {
    return $this->belongsTo(Service::class);
  }
}
