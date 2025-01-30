<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelunasan extends Model
{
    use HasFactory;
    protected $table = "pelunasan";
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'piutang_uid',
        'nomor_pelunasan',
        'tanggal_bayar',
        'nominal_bayar',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function piutang()
    {
        return $this->belongsTo(Piutang::class, 'piutang_uid', 'uid');
    }
}
