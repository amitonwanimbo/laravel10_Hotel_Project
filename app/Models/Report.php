<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
        'fasilitas',
        'deskripsi',
        'status',
        'image',  // Tambahkan kolom image
   ];
   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
