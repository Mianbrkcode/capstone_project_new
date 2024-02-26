<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;

class SpotReport extends Model
{
    use HasFactory;
    protected $table = 'spot_report';
    protected $primaryKey = 'spotID';
    protected $fillable =[
        'reportId',
        'imageEvidence',
        'description'
    ];


    public function report()
    {
        return $this->belongsTo(Report::class, 'reportId' , 'report_id');
    }
}
