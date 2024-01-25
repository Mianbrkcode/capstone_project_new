<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Guidelines extends Model
{
    
    protected $table = 'guidelines';
    protected $primaryKey = 'guidelines_id';
    protected $fillable = [
        'guidelines_name',
        'thumbnail',
        'disaster_type',
    ];

    public function before()
    {
        return $this->hasOne(GuidelinesBefore::class, 'guidelines_id', 'guidelines_id');
    }

    public function during()
    {
        return $this->hasOne(GuidelinesDuring::class, 'guidelines_id', 'guidelines_id');
    }

    public function after()
    {
        return $this->hasOne(GuidelinesAfter::class, 'guidelines_id', 'guidelines_id');
    }
}
