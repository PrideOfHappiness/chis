<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApproval extends Model
{
    use HasFactory;
    protected $table = 'approval';
    protected $primaryKey = 'approvalID';
    public $incrementing = true;
    protected $fillable = [
        'approval',
        'userID',
        'sequence', 
        'jabatan',
        'status',
    ];

    public function getUserIDFromUsers(){
        return $this->belongsTo(User::class, 'userID', 'userIDNo');
    }
}
