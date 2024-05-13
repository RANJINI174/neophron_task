<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customers;

class groups extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['groupName','groupCode'];
    use HasFactory;

    public function customers()
    {
        return $this->hasMany(customers::class,'groups_id');
    }
}
