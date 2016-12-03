<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalVar extends Model
{
    protected $table = 'globalvariables';

    protected $connection = 'mysql_two';

    protected $fillable = [
        'globalvarcode','value', 'semester', 'schoolyear'
    ];

}
