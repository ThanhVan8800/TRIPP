<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\VungMien;
use App\Models\NhuCau;


class DiaDanh extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function VungMien()
    {
        return $this->belongsTo(VungMien::class);
    }
    public function NhuCau()
    {
        return $this->hasMany(NhuCau::class);
    }
    
    
    public function User()
    {
        return $this->hasMany(User::class);
    }
    protected $fillable = [
            'ten_dia_danh',
            'hinhanh',
            'ngay_dang',  
            'kinh_do',   
            'vi_do',        
            'mo_ta'
    ];
}
