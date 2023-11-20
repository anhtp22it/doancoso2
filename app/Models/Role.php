<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';

    protected $primaryKey = 'id';

    protected $fillable = [
        'role',
    ];

    public static function getRoles()
    {
        return static::pluck('role', 'id')->all();
    }

    public function users() {
        return $this->hasMany(User::class, 'role_id');
    }
}
