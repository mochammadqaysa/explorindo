<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteKeluarItem extends Model
{
    use HasFactory;
    protected $table = "waste_keluar_item";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'waste_keluar_uid',
        'waste_uid',
        'jenis',
        'nomor_pib',
        'qty',
        'nomor_packing',
        'jumlah',
        'index',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function getKodeAttribute()
    {
        $jenis = JenisWaste::where('kode', $this->jenis)->first();
        $kode_waste = $this->waste->kode;
        return $jenis->kode . '.' . $kode_waste;
    }

    public function getJumlahKgAttribute()
    {
        return $this->calculateJumlah();
    }

    public function calculateJumlah()
    {
        $arrJumlah = $this->jumlah;
        $jumlah_kg = '0.000';
        foreach (explode(',', $arrJumlah) as $value) {
            $jumlah_kg += $value;
        }
        return $jumlah_kg;
    }

    public function wasteKeluar()
    {
        return $this->belongsTo(WasteKeluar::class);
    }

    public function waste()
    {
        return $this->belongsTo(Waste::class);
    }
}
