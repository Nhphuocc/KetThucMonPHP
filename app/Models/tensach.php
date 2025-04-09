<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class tensach extends Model
{
    use HasFactory;
    protected $table = 'tensach';
    protected $fillable = ['TenSach', 'tacgia_id'];
    public function tacgia()
    {
        return $this->belongsTo(TacGia::class, 'tacgia_id');
    }
}
