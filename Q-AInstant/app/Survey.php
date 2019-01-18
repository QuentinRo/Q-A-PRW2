<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //     protected $table ='surveys';

    // define the name on the DTB
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['name', 'description'];
}
