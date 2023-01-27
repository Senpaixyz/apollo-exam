<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakdownModel extends Model
{
    use HasFactory;

    protected $table = 'breakdown';


    protected $fillable = [
        'value',
        'random_id'
    ];

    public function random()
    {
        return $this->hasOne(RandomModel::class);
    }
}
