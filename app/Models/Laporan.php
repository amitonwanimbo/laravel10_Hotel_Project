<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
        'user_id','image',
    ];
    // public function getCreatedAtAttribute($value)
    // {
    //     return \Carbon\Carbon::parse($value)->format('d-m-Y H:i:s');
    // }
    // Arhakan ke berdsarakan id pegawai
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     // Relasi dengan User
    //  public function user()
    //  {
    //      return $this->belongsTo(User::class);
    //  }
}