<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'userIDNo';
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'userName',
        'nama',
        'perusahaan',
        'branch',
        'department',
        'user_access',
        'status',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getUserAccessFromUserAccess(){
        return $this->belongsTo(UserAccess::class, 'user_access', 'id');
    }

    public function setUserIDForUserApproval(){
        return $this->hasMany(UserApproval::class, 'userID', 'approvalID');
    }

    public function setUserIDForFotoUsers(){
        return $this->hasMany(FotoUsers::class, 'userID');
    }

    public function setUserIDForSales(){
        return $this->hasMany(Salesman::class, 'userID');
    }
}
