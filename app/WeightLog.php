<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
	protected $table = "weightlog";

    protected $fillable = [
        'log_date', 'max', 'min', 'variance'
    ];
}
