<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomModel extends Model
{
    use HasFactory;

    protected $table = 'random';

    protected $fillable = [
        'value',
        'flag'
    ];

    public function breakdown()
    {
        return $this->hasMany(BreakdownModel::class,'random_id');
    }
}
