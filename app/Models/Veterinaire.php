<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nom
 * @property string $tel
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property Visite[] $visites
 */
class Veterinaire extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nom', 'tel', 'email', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visites()
    {
        return $this->hasMany(Visite::class, 'visite_id');
    }
}
