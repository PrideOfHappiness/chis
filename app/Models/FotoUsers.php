<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoUsers extends Model
{
    use HasFactory;
    protected $table = 'photo_user';
    protected $fillable = ['userID','namaFile'];
    public function getUserIDFromUsers(){
        return $this->belongsTo(User::class, 'userID', 'userIDNo');
    }
}
