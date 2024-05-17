<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groups;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['customer_name','groups_id','mobile_no','email','gst_no','billing_address','shipping_address','status'];

    use HasFactory;
    public function Groups()
    {
        return $this->belongsTo(Groups::class,'groups_id');
    }
}
