<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nom
 * @property string $tel
 * @property string $email
 * @property string $adresse
 * @property string $created_at
 * @property string $updated_at
 * @property Achat[] $achats
 */
class Fournisseur extends Model
{
    /**
     * @var array
     */ 
    protected $fillable = ['nom', 'tel', 'email', 'adresse', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function achats()
    {
        return $this->hasMany(Achat::class, 'fournisseur_id');
    }
}
