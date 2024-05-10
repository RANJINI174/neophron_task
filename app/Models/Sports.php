<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;

class Sports extends Model
{
    protected $table = 'spots';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price','quantity','categories_id'];

    use HasFactory;
    public function categories()
    {
        return $this->belongsTo(categories::class,'categories_id');
    }

}

