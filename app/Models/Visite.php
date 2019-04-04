<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bovin_id
 * @property int $veterinaire_id
 * @property string $type
 * @property string $date
 * @property float $prix
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 * @property Bovin $bovin
 * @property Veterinaire $veterinaire
 * @property Ordonnane[] $ordonnanes
 */
class Visite extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bovin_id', 'veterinaire_id', 'type', 'date', 'prix', 'observation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bovin()
    {
        return $this->belongsTo(Bovin::class, 'bovin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function veterinaire()
    {
        return $this->belongsTo(Veterinaire::class, 'veterinaire_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class, 'visite_id');
    }
}
