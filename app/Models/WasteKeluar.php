<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteKeluar extends Model
{
    use HasFactory;
    protected $table = "waste_keluar";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'customer_uid',
        'nomor_invoice',
        'tanggal_invoice',
        'nomor_sppb',
        'tanggal_sppb',
        'jumlah',
        'nilai',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function wasteKeluarItems()
    {
        return $this->hasMany(WasteKeluarItem::class);
    }
}
