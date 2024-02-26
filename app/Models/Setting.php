<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $primaryKey = 'settings_id';
    protected $table = "settings";
    protected $fillable = [
        'settings_name',
        'settings_description'
    ];


}
