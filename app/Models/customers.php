<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\groups;
//use App\Models\customers;


class customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'mobile_no','email','gst_no','billing_address','shipping_address','status'];

    use HasFactory;
    public function groups()
    {
        return $this->belongsTo(groups::class,'groups_id');
    }

}

