<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    use HasFactory;
    protected $table = 'user_access';
    protected $fillable = [
        'user_access',
    ];

    public function setUserAccess(){
        return $this->hasMany(User::class, 'user_access', 'userIDNo');
    }
}
