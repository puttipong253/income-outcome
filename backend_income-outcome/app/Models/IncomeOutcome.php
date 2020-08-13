<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeOutcome extends Model
{
    protected $table = 'income_outcomes';
    protected $fillable = ['date','status','count','description','balance'];
}
