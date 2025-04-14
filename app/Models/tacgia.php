<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class tacgia extends Model
{
    use HasFactory;
    protected $table = 'tacgia';
    public function tensach()
    {
        return $this->hasMany(tensach::class, 'tacgia_id');
    }
    protected $fillable = [
        'name',
        'ngay_sinh',
    ];
}
