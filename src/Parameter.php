<?php

namespace Studio\Totem;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parameter extends TotemModel
{
    protected $table = 'frequency_parameters';

    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * @return BelongsTo
     */
    public function task() : BelongsTo
    {
        return $this->belongsTo(Frequency::class);
    }
}
