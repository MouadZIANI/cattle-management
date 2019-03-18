<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bovin_id
 * @property string $type
 * @property float $montant
 * @property string $date
 * @property string $observation
 * @property int $model_id
 * @property string $created_at
 * @property string $updated_at
 * @property Bovin $bovin
 */
class Frais extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bovin_id', 'type', 'montant', 'date', 'observation', 'model_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bovin()
    {
        return $this->belongsTo(Bovin::class, 'bovin_id');
    }
}
