<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\groups;

class Sports extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['Name', 'Group', 'Mobile_no','Email id','GST No','Billing address','Shipping address','Status'];

    use HasFactory;
    public function groups()
    {
        return $this->belongsTo(groups::class,'groups_id');
    }

}

