<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sports;

class categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['categories'];
    use HasFactory;

    public function Sports()
    {
        return $this->hasMany(Sports::class,'categories_id');
    }
}
