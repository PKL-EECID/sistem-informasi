<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'radar_name',
        'station_id',
        'report_date_start',
        'report_date_end',
        'expertise1',
        'expertise2',
        'expertise3',
        'expertise4',
        'expertise5',
        'expertise6',
        'expertise7',
        'expertise8',
        'expertise9',
        'expertise10',
        'expertise_company1',
        'expertise_company2',
        'expertise_company3',
        'expertise_company4',
        'expertise_company5',
        'expertise_company6',
        'expertise_company7',
        'expertise_company8',
        'expertise_company9',
        'expertise_company10',
    ];
}
