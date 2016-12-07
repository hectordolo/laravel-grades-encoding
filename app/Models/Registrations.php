<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    protected $table = 'registrations';

    protected $connection = 'mysql_two';

    protected $fillable = ['prelimgrade','midtermgrade','finalgrade'];

    public function student(){
        return $this->belongsTo('App\Models\Students', 'studentcode', 'studentcode');
    }

}
