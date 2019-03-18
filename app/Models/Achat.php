<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $fournisseur_id
 * @property string $date_achat
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 * @property Fournisseur $fournisseur
 * @property Bovin[] $bovins
 */
class Achat extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['fournisseur_id', 'date_achat', 'observation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bovins()
    {
        return $this->hasMany(Bovin::class, 'bovin_id');
    }
}
