<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bovin_id
 * @property string $date
 * @property float $poids
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 * @property Bovin $bovin
 */
class Poid extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bovin_id', 'date', 'poids', 'observation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bovin()
    {
        return $this->belongsTo(Bovin::class, 'bovin_id');
    }
}
