<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorites extends Model{
    protected $table = "favorites";
    protected $primaryKey = 'id_user';
    public $timestamps = false;
}