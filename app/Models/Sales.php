<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = ['invoice_no', 'customer_id', 'total_price'];

    use HasFactory;
     public function saleItems()
    {
         return $this->hasMany(SaleItems::class,'sale_id');

     }
     public function taxDetails()
     {
         return $this->belongsTo(TaxDetails::class, 'tax_id');
     }

     protected static function boot()
     {
         parent::boot();

         static::creating(function ($sale) {
             // Format and set the invoice_id attribute before insertion
             $lastSale = self::orderBy('id', 'desc')->first();
             $lastNumber = $lastSale ? (int) substr($lastSale->invoice_no, 4) : 0;
             $sale->invoice_no = 'INV-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
         });
         // static::saving(function ($sale) {
         //     $sale->total_price = $sale->calculateTotalPriceSum();
         // });
     }
}
