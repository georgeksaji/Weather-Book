<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class WbUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Explicitly define the table name
    protected $table = 'wb_user';

    // Fields that are mass assignable (optional, for future flexibility)
    protected $fillable = [
        'username',
        'dob',
        'phone',
        'location',
        'password',
    ];

    // Fields that should be hidden (e.g., for JSON responses)
    protected $hidden = [
        'password',
        'otp', // Add this if you have an OTP field
    ];

    // Fields that should be cast to native types (optional)
    protected $casts = [
        'dob' => 'date', // Cast 'dob' to a Carbon instance
    ];

    // Disable timestamps if your table doesn't have `created_at` and `updated_at` columns
    // public $timestamps = false;

    // Custom method to check if the user is an admin (optional)
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}