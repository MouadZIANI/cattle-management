<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bovin_id
 * @property string $type
 * @property string $date
 * @property string $nom_chaffeur
 * @property string $matricule
 * @property string $tel
 * @property string $created_at
 * @property string $updated_at
 * @property Bovin $bovin
 */
class Transport extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bovin_id', 'type', 'date', 'nom_chaffeur', 'matricule', 'tel', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bovin()
    {
        return $this->belongsTo(Bovin::class, 'bovin_id');
    }
}
