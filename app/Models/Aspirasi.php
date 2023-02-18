<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with =['input_aspirasi','kategori'];
    public function scopeFillter($query, array $fillters)
    {
        $query->when($fillters['search'] ?? false, function($query, $search)
        {
            return $query->where('id_aspirasi', 'like', '%'. $search.'%');
        });
        $query->when($fillters['kategori'] ?? false, function($query, $kategori)
        {
            return $query->where('kategori_id', 'like', '%'. $kategori.'%');
        });
        $query->when($fillters['waktu'] ?? false, function($query, $waktu)
        {
            return $query->where('created_at', 'like', '%'. $waktu.'%');
        });
        $query->when($fillters['status'] ?? false, function($query, $status)
        {
            return $query->where('status', 'like', '%'. $status.'%');
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function input_aspirasi()
    {
        return $this->belongsTo(Input_aspirasi::class, 'id_aspirasi');
    }
}