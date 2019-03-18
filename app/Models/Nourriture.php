<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bovin_id
 * @property int $element_id
 * @property int $qte
 * @property string $created_at
 * @property string $updated_at
 * @property Bovin $bovin
 * @property StockElement $stockElement
 */
class Nourriture extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bovin_id', 'element_id', 'qte', 'created_at', 'updated_at'];

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
    public function stockElement()
    {
        return $this->belongsTo(StockElement::class, 'element_id');
    }
}
