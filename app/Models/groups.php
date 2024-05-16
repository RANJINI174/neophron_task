<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class groups extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['groupName','groupCode'];
    use HasFactory;

    public function Customer()
    {
        return $this->hasMany(Customer::class,'groups_id');
    }
}
