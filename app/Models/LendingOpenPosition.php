<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LendingOpenPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'RptDt',
        'TckrSymb',
        'ISIN',
        'Asst',
    ];
}
