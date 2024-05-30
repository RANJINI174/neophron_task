<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItems extends Model
{

    protected $table = 'sale_items';
    protected $primaryKey = 'id';
    protected $fillable = ['sale_id', 'item_id', 'quantity','unit_price','total_price'];
    use HasFactory;

    public function sports()
    {
        return $this->belongsTo(Sports::class, 'item_id');
    }
    public function taxDetail()
    {
        return $this->belongsTo(TaxDetails::class, 'tax_id');
    }
}
