<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SytelineItem extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'item';
}
