<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{


    protected $fillable = ["book_title", "book_isbn", "book_price", "book_publish_year", "author_id"];
}
