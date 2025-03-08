<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected  $fillable = ["name", "status"];

    public function approvedAds()
    {
        return $this->hasMany(Ads::class)->where('status', 1);
    }
}
