<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxDetails extends Model
{
    use HasFactory;
    protected $table = 'tax_details';
    protected $primaryKey = 'id';
    protected $fillable = ['tax_name', 'tax_percentage'];

}
