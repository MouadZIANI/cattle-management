<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bovin_id
 * @property int $transport_id
 * @property string $created_at
 * @property string $updated_at
 * @property Bovin $bovin
 * @property Transport $transport
 */
class BovinTransport extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bovin_id', 'transport_id', 'created_at', 'updated_at'];
    
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
    public function transport()
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }
}
