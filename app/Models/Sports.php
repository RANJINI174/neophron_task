<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    protected $table = 'spots';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price','quantity'];
    use HasFactory;
}
