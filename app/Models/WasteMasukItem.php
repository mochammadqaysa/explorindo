<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteMasukItem extends Model
{
    use HasFactory;
    protected $table = "waste_masuk_item";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'waste_masuk_uid',
        'waste_uid',
        'jumlah',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function wasteMasuk()
    {
        return $this->belongsTo(WasteMasuk::class);
    }

    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }
}
