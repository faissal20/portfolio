<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_name',
        'action_by',
        'action_data'
    ];


    protected $casts = [
        'action_data' => 'array'
    ];


    public function getActionDataAttribute($value)
    {
        return json_decode($value);
    }


}
