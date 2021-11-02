<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item', 'description', 'insert_at', 'updated_at'];
}
