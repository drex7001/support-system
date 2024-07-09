<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    use HasFactory;

    public $incrementing = false;
    
    protected $keyType = 'string';

    protected $fillable = [
        'customer_name',
        'problem_description',
        'email',
        'phone',
        'reference_number',
        'status',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
