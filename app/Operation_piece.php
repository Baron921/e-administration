<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation_piece extends Model
{
    protected $fillable = [
        'id',
        'operation_id',
        'piece_id'
    ];
}
