<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bovin_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $type
 * @property string $date
 * @property string $observation
 * @property Bovin $bovin
 */
class Pert extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bovin_id', 'created_at', 'updated_at', 'type', 'date', 'observation'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bovin()
    {
        return $this->belongsTo(Bovin::class, 'bovin_id');
    }
}
