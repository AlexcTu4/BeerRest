<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    protected $fillable = ['name', 'quantity', 'isActive'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
