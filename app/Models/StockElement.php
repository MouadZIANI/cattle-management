<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $designation
 * @property string $type
 * @property int $qte
 * @property string $created_at
 * @property string $updated_at
 * @property Nourriture[] $nourritures
 * @property Ordonnane[] $ordonnanes
 */
class StockElement extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['designation', 'type', 'qte','prix','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nourritures()
    {
        return $this->hasMany(Nourriture::class, 'element_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class, 'medicament_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function frais()
    {
        return $this->hasOne(Frais::class, 'model_id');
    }
}
