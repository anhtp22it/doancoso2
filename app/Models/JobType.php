<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'job_type';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
    ];

    public $timestamps = true;

    public static function getJobTypes()
    {
        return static::pluck('type', 'id')->all();
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'type_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'type_id');
    }
}
