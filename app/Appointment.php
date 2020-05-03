<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Model
{
  use UsesUuid;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'customer_id', 'salon_id', 'employee_id', 'scheduled_at', 'checkedin_at', 'started_at', 'finished_at'
  ];

  public function customer(): BelongsTo
  {
    return $this->belongsTo(Customer::class);
  }
  public function salon(): BelongsTo
  {
    return $this->belongsTo(Salon::class);
  }
  public function employee(): BelongsTo
  {
    return $this->belongsTo(Employee::class);
  }

  public function details(): HasMany
  {
    return $this->hasMany(AppointmentDetail::class);
  }
}
