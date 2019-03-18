<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $parent_id
 * @property int $achat_id
 * @property string $num
 * @property string $sexe
 * @property float $prix
 * @property float $poids_initial
 * @property float $age_initial
 * @property string $origine
 * @property string $statut
 * @property string $created_at
 * @property string $updated_at
 * @property Achat $achat
 * @property Bovin $bovin
 * @property Frai[] $frais
 * @property Nourriture[] $nourritures
 * @property Poid[] $poids
 * @property Transport[] $transports
 * @property Visite[] $visites
 */
class Bovin extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'achat_id', 'num', 'sexe', 'prix', 'poids_initial', 'age_initial', 'origine', 'statut', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function achat()
    {
        return $this->belongsTo(Achat::class, 'achat_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Bovin::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function frais()
    {
        return $this->hasMany(Frais::class, 'bovin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nourritures()
    {
        return $this->hasMany(Nourriture::class, 'bovin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poids()
    {
        return $this->hasMany(Poid::class, 'bovin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bovinTransports()
    {
        return $this->hasMany(BovinTransport::class, 'bovin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visites()
    {
        return $this->hasMany(Visite::class, 'bovin_id');
    }
}
