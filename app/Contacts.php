<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Contacts extends Model
{
    use Searchable;
    protected $fillable = ['first_name', 'last_name', 'email', 'patronymic', 'phone', 'company', 'post', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

}
