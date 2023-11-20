<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'icon'
    ];

    public $timestamps = true;

    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'category_id');
    }

    public static function getCategories()
    {
        return static::pluck('name', 'id')->all();
    }
}
