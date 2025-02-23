<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanKeluar extends Model
{
    use HasFactory;
    protected $table = "bahan_keluar";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'transaksi',
        'nomor_bukti',
        'tanggal_bukti',
        'nomor_spk',
        'bagian_uid',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }

    public function bahanKeluarItems()
    {
        return $this->hasMany(BahanKeluarItem::class);
    }
}
