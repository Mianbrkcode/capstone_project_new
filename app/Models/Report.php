<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'report_id';
    protected $table = "reports";
    protected $fillabe =[
        'dateandTime',
        'uid',
        'emergency_type',
        'resident_name',
        'locationName',
        'LocationLink',
        'phoneNumber',
        'message',
        'imageEvidence',
        'status',
        'responder_name',
        'residentProfile',
        'userfrom'
    ];
}
