<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = ['first_name', 'last_name', 'patronymic', 'phone', 'company', 'post', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
