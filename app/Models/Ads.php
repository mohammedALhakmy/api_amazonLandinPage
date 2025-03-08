<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [ "title", "slug", "text", "phone", "status", "user_id", "domain_id"];

}
