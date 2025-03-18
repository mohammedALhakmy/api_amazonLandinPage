<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{


    protected  $table = 'authors';
    protected $fillable = ["author_name", "author_contact_no", "author_country"];
}
