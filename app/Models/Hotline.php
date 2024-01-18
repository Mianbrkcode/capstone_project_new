<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotline extends Model
{
    use HasFactory;
    protected $table = 'emergency_hotlines';
    protected $primaryKey = 'hotlines_id';

    protected $fillable = [
        'hotlines_number',
        'userfrom',
        'responder_name',
        'responder_id'
    ];
}
