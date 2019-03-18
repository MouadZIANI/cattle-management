<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $medicament_id
 * @property int $visite_id
 * @property float $qte
 * @property string $posologie
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 * @property StockElement $stockElement
 * @property Visite $visite
 */
class Ordonnance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ordonnanes';

    /**
     * @var array
     */
    protected $fillable = ['medicament_id', 'visite_id', 'qte', 'posologie', 'date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicament()
    {
        return $this->belongsTo(StockElement::class, 'medicament_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visite()
    {
        return $this->belongsTo(Visite::class, 'visite_id');
    }
}
