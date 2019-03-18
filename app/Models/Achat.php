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

    protected $with = ['fournisseur'];

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
        return $this->hasMany(Bovin::class, 'achat_id');
    }

    /**
     * Get montant total achat
     *
     * @return float
     */
    public function getMontantTotalTransportAchatAttribute() 
    {
        return $this->bovins->sum(function($bovin) {
            return $bovin->frais->sum(function ($frais) {
                return ($frais->type == 'Transport Achat') ? $frais->montant : 0; 
            });
        });
    }

    /**
     * Get montant total achat
     *
     * @return float
     */
    public function getMontantTotalAchatAttribute() 
    {
        return $this->bovins->sum(function($bovin) {
            return $bovin->prix; 
        });
    }

    public function getTransportAttribute()
    {
        return (isset($this->bovins[0]) && !is_null($this->bovins[0])) 
            ? $this->bovins()->with('bovinTransports')->first()->bovinTransports->first()->transport 
            : null;
    }
}
