<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'username', 'password', 'no_hp', 'role'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
