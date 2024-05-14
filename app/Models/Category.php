<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['id','catname'];

    public function customers()
    {
        return $this->hasMany(customers::class,'categoryId');

    }
}

