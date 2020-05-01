<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extra extends Model
{
  use UsesUuid, SoftDeletes;

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ["id", "name", "price", "index", "image", "minutes", "description", "service_id"];

  public function service(): BelongsTo
  {
    return $this->belongsTo(Service::class);
  }
}
