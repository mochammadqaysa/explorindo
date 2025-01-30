<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    use HasFactory;
    protected $table = "piutang";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'nomor_sj',
        'tanggal_sj',
        'based_on_received',
        'tanggal_received',
        'barang_keluar_uid',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function barangKeluar()
    {
        return $this->belongsTo(BarangKeluar::class, 'barang_keluar_uid', 'uid');
    }

    public function pelunasan()
    {
        return $this->hasMany(Pelunasan::class, 'piutang_uid', 'uid');
    }
}
