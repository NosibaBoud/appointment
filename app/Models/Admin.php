<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table = 'admin';


    protected $fillable = ['name', 'email', 'password', 'role'];  // Add 'role' for admin check
}
