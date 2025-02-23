<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteMasuk extends Model
{
    use HasFactory;
    protected $table = "waste_masuk";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'nomor_bukti',
        'tanggal_bukti',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function wasteMasukItems()
    {
        return $this->hasMany(WasteMasukItem::class);
    }
}
