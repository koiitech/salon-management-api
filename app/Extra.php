<?php

namespace App;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extra extends Model
{
    use UsesUuid;
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
