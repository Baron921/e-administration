<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation_user extends Model
{
    protected $fillable = [
      'id',
      'operation_id',
      'institution_id'
    ];
}
