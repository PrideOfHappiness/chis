<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;
    protected $table = 'salesman';
    protected $fillable = [
        'userID',
        'alias',
        'status',
    ];

    public function getUserIDFromUsers2(){
        return $this->belongsTo(User::class, 'userID', 'userIDNo');
    }
}
