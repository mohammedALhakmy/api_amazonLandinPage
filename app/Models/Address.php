<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{


    protected  $table = 'addresses';
    protected $fillable = ['country', 'addr1', 'addr2', 'city', 'postcode', 'user_id'];
}
